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
        $specialtyName = $request->input('specialty_name');
        $query = User::with('userDetail', 'specialties', 'messages', 'reviews', 'votes')->has('userDetail');

        if (!empty($specialtyName)) {
            // Use whereHas to filter by specialty name if provided
            $query->whereHas('specialties', function ($query) use ($specialtyName) {
                $query->where('name', 'like', '%' . $specialtyName . '%');
            });
        } else {
            $query = User::with('userDetail', 'specialties', 'messages', 'reviews', 'votes')->has('userDetail');
        }

        // Paginate the results
        $users = $query->paginate(20);

        return response()->json([
            'success' => true,
            'results' => $users,
        ]);
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
