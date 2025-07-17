<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MypageController extends Controller
{
    public function index(): View
    {
        $userId = auth()->id();
        $user = User::findOrFail($userId)->name;
        return view('mypage.index', compact('user'));
    }
}