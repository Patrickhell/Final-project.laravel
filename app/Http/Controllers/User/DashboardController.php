<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display of dashboard panel.
     */
    public function index()
    {
        $user = Auth::user();

        $detail = $user->detail;
        $votes = $user->votes;

        return view('user.dashboard', compact('user', 'detail', 'votes'));
    }

    /**
     * Display of all messages.
     */
    public function messagesIndex()
    {
        $user = Auth::user();
        $messages = $user->messages;

        return view('user.messages', compact('user', 'messages'));
    }

    /**
     * Display of all reviews.
     */
    public function reviewsIndex()
    {
        $user = Auth::user();
        $reviews = $user->reviews;

        return view('user.reviews', compact('user', 'reviews'));
    }

    /**
     * Display of various stats.
     */
    public function statsIndex()
    {
        $user = Auth::user();

        $reviews = $user->reviews;
        $messages = $user->messages;
        $vote = $user->votes;

        return view('user.stats', compact('user', 'reviews', 'messages', 'vote'));
    }

}
