<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
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

    /**
     * Show the form for creating the specified resource.
     */
    public function create()
    {
        return view('user.cruds.create');
    }

    /**
     * Store the specified resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            // Your validation rules here...
        ]);

        return redirect()->route('user.dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = Auth::user();

        // Logic for editing user

        return view('user.cruds.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = auth()->user();

        // Validate request data
        $data = $request->validate([
            'birth_date' => ['required'],
            'phone_number' => ['required'],
            'work_address' => ['required'],
            'personal_address' => ['required'],
            'performance' => ['required'],
            'profile_picture' => ['required'],
            'cv_file' => ['required'],
        ]);

        dd($data);

        // Salvare i dati
        //
        // Update user's data based on request data

        return redirect()->route('user.dashboard');
    }
}
