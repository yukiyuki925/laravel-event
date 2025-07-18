<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Event;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class MypageController extends Controller
{
    public function index(): View
    {
        $userId = auth()->id();
        $user = User::findOrFail($userId)->name;
        return view('mypage.index', compact('user'));
    }

    public function createIndex(): View
    {
        $userId = auth()->id();
        $events = Event::where('user_id', $userId)->get();
        return view('mypage.createIndex', compact('events'));
    }

    public function show($id): View
    {
        $event = Event::findOrFail($id);
        return view('mypage.show', compact('event'));
    }

    public function edit($id): View
    {
        $areas = Area::all();
        $tags = Tag::all();
        $event = Event::with('tags')->findOrFail($id);
        return view('mypage.edit', compact('event', 'areas', 'tags'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $validated = $request->validate([
            "event_title" => 'required|string|max:255',
            "start_event_date" => 'required|date',
            "end_event_date" => 'required|date|after_or_equal:start_event_date',
            "start_time" => 'required',
            "end_time" => 'required',
            "description" => 'required',
            "place" => 'required|string|max:255',
            "price" => 'required_if:price_type_id,2',
        ]);

        $event->fill($validated);
        $event->area_id = $request->area_id;
        $event->price_type_id = $request->price_type_id;

        // 画像がアップロードされた場合
        if ($request->hasFile('img')) {
            if ($event->img && Storage::disk('public')->exists($event->img)) {
                Storage::disk('public')->delete($event->img);
            }
            $event->img = $request->file('img')->store('images', 'public');
        }

        $event->save();

        // タグの同期
        $event->tags()->sync($request->input('tag_id', []));

        return redirect()->route('mypage.create-index')->with('success', 'イベントを更新しました');
    }

    public function likes(Request $request): View
    {
        $user = $request->user();
        $events = $user->likedEvents;
        return view('mypage.likes',compact('events'));
    }

    public function likesShow($id): View
    {
        $event = Event::findOrFail($id);
        return view('mypage.likesShow',compact('event'));
    }
}