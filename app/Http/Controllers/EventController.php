<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Event;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\View\View;

class EventController extends Controller
{
    public function index(Request $request): View
    {
        $events = Event::all();
        return view('event.index', compact('events'));
    }

    public function create(): View
    {
        $areas = Area::all();
        $tags = Tag::all();
        return view('event.create', compact('areas', 'tags'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            "event_title" => 'required|max:255',
            "start_event_date" => 'required|date',
            "end_event_date" => 'required|date|after_or_equal:start_event_date',
            "start_time" => 'required',
            "end_time" => 'required',
            "img" => 'required',
            "description" => 'required',
            "place" => 'required',
            "price" => 'required_if:price_type_id,2',
            "area_id" => 'required',
        ]);

        $event = new Event();
        $event->fill($validated);

        // 画像処理
        if ($request->hasFile('img')) {
            $event->img = $request->file('img')->store('images', 'public');
        }

        $event->user_id = auth()->id();
        $event->post_date = Carbon::now();
        $event->price_type_id = $request->input('price_type');
        $event->save();

        $tagIds = $request->input('tag_id', []);
        $event->tags()->attach($tagIds);

        return redirect()->route('index')->with('success', 'イベントを登録しました');
    }

    public function show($id): View
    {
        $event = Event::findOrFail($id);
        return view('event.show', compact('event'));
    }
}
