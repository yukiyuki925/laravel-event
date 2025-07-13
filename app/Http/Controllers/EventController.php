<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class EventController extends Controller
{
    public function index(Request $request): View
    {
        return view('event.index');
    }

    public function create(Request $request): View
    {
        return view('event.create');
    }
}
