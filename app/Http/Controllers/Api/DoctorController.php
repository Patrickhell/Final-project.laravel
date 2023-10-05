<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Specialty;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(Request $request)
    {

        if ($request->has('search')) {
            $user_details = User::with('specialties', 'userDetail', 'reviews', 'votes', 'messages')->where('name', 'LIKE', '%' . $request->search . '%')->paginate(8);
        } else {
            $user_details = User::with('specialties', 'userDetail', 'reviews', 'votes', 'messages')->paginate(8);
        }
        
        $users = User::with('userDetail', 'specialties', 'reviews', 'votes', 'messages')->paginate(20);

        return response()->json(
            [
                'success' => true,
                'results' => $users,
            ]
        );
    }

    public function show(string $slug)
    {
        $user = User::with('userDetail', 'specialties', 'reviews', 'votes', 'messages')->findOrFail($slug);

        return response()->json(
            [
                'success' => true,
                'results' => $user
            ]
        );
    }
}
