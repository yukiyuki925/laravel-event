<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Area;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\View\View;

class EventController extends Controller
{
    public function index(Request $request): View
    {
        return view('event.index');
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
            "description" => 'required',
            "place" => 'required',
            "price" => 'required_if:price_type,paid',
            "area_id" => 'required',
            "tag_id" => 'required'
        ]);

        // 保存処理
        $event = new Event();

        // 無料 or 有料で金額セット
        $event->price = $request->price_type === 'paid'
            ? $validated['price']
            : 0;

        $event->fill($validated);

        // 画像処理
        if ($request->hasFile('img')) {
            $event->img = $request->file('img')->store('images', 'public');
        }

        $event->user_id = auth()->id();
        $event->post_date = Carbon::now();
        $event->save();

        return redirect()->route('index')->with('success', 'イベントを登録しました');
    }
}
