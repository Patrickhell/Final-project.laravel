<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Specialty;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        $specialtyNames = $request->input('specialties');
        $minRating = $request->input('minRating');
        $minReviewCount = $request->input('minReviewCount');

        $query = User::with([
            'userDetail',
            'specialties',
            'messages',
            'reviews' => function($query) {
                $query->with('vote');
            }
        ])
            ->has('userDetail')
            ->select('users.*', DB::raw('AVG(votes.vote) as avg_rating'))
            ->leftJoin('reviews', 'users.id', '=', 'reviews.user_id')
            ->leftJoin('votes', 'reviews.id', '=', 'votes.review_id')
            ->groupBy('users.id');

        // Filter by specialties (case-insensitive)
        if (!empty($specialtyNames)) {
            $specialtiesArray = explode(',', $specialtyNames);
        
            // Get all specialty IDs that match our criteria
            $specialtyIds = Specialty::whereIn(DB::raw('LOWER(name)'), array_map('strtolower', $specialtiesArray))
                ->pluck('id')
                ->toArray();
        
            // Then filter doctors based on those specialty IDs
            $query->whereHas('specialties', function ($query) use ($specialtyIds) {
                $query->whereIn('id', $specialtyIds);
            });
        }



        // Filter by minimum rating
        if (!empty($minRating)) {
            $query->having(DB::raw('ROUND(avg_rating, 2)'), '>=', round($minRating, 2));
        }

        if (!empty($minReviewCount) && is_numeric($minReviewCount)) {
            $query->having(DB::raw('COUNT(reviews.id)'), '>=', $minReviewCount);
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
        $user = User::with('userDetail', 'specialties', 'messages', 'reviews.vote')->findOrFail($slug);

        return response()->json(
            [
                'success' => true,
                'results' => $user
            ]
        );
    }
}
