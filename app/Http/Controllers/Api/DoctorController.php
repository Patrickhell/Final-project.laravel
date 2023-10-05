<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {

        $user_details = User::with('specialties', 'sponsorships', 'userDetail', 'reviews', 'votes', 'messages')->paginate(8);

        return response()->json(
            [
                'success' => true,
                'results' => $user_details,
            ]
        );
    }

    public function show($id)
    {
        $user_details = User::with('specialties', 'sponsorships', 'userDetail', 'reviews', 'votes', 'messages')->findOrFail($id);

        return response()->json(
            [
                'success' => true,
                'results' => $user_details
            ]
        );
    }
}
