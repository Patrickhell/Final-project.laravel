<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Sponsorship;
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
        $messages = Auth::user()->messages()->latest()->take(5)->get();
        $reviews = Auth::user()->reviews()->latest()->take(5)->get();
        $averageVote = $user->reviews()->with('vote')->get()->avg(function($review) {
            return $review->vote->vote ?? 0;
        });

        return view('user.dashboard', compact('user', 'messages', 'reviews', 'averageVote'));
    }

    /**
     * Display of all messages.
     */
    public function messagesIndex()
    {
        $user = Auth::user();
        $messages = $user->messages()->latest()->paginate(10);

        return view('user.messages', compact('user', 'messages'));
    }

    /**
     * Display of all reviews.
     */
    public function reviewsIndex()
    {
        $user = Auth::user();
        $reviews = Auth::user()->reviews()->latest()->paginate(10);

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

        return view('user.stats', compact('user', 'reviews', 'messages'));
    }

    /**
     * Display of various stats.
     */
    public function sponsorshipsIndex()
    {
        $user = Auth::user();

        $sponsors = Sponsorship::all();

        return view('user.sponsorships', compact('sponsors'));
    }

    public function paymentShow()
    {
        
        return view('user.payment');
    }
}
