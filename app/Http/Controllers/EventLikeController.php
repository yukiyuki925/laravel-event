<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EventLikeController extends Controller
{
    public function like(Request $request, Event $event)
    {
        $user = $request->user();

        if ($user->likedEvents->contains($event->id)) {
            $user->likedEvents()->detach($event->id);
        } else {
            $user->likedEvents()->attach($event->id);
        }

        return back();
    }
}
