<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Specialty;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    /**
     * Show the form for creating the specified resource.
     */
    public function create()
    {
        $specialties = Specialty::all();

        return view('user.cruds.create', compact('specialties'));
    }

    /**
     * Store the specified resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        // Validate request data
        $data = $request->validate([
            'birth_date' => ['required'],
            'phone_number' => ['required'],
            'work_address' => ['required'],
            'personal_address' => ['required'],
            'performance' => ['required'],
            'profile_picture' => ['required', 'mimes:jpeg,png'],
            'cv_file' => ['required', 'mimes:jpeg,png,pdf'],
            'specialties' => ['required', 'array', 'min:1'],
            'specialties.*' => ['exists:specialties,id'],
        ]);
        // Append the logged user id to column 'user_id'
        $data['user_id'] = $user->id;

        $profileImgPath = Storage::put('uploads/profile_pictures', $request['profile_picture']);
        $data['profile_picture'] = $profileImgPath;

        $cvPath = Storage::put('uploads/cvs', $request['cv_file']);
        $data['cv_file'] = $cvPath;

        $userDetail = UserDetail::create($data);

        // Attach the selected specialties to the user
        if (isset($data['specialties'])) {
            $user->specialties()->attach($data['specialties']);
        }

        return redirect()->route('user.dashboard')->with('success', 'Profilo creato con successo!');
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
        $specialties = Specialty::all();

        // Logic for editing user

        return view('user.cruds.edit', compact('user', 'specialties'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $userDetail = $user->userDetail;

        // Validate request data
        $data = $request->validate([
            'birth_date' => ['required'],
            'phone_number' => ['required'],
            'work_address' => ['required'],
            'personal_address' => ['required'],
            'performance' => ['required'],
            'profile_picture' => ['mimes:jpeg,png'],
            'cv_file' => ['mimes:jpeg,png,pdf'],
            'specialties' => ['required', 'array', 'min:1'],
            'specialties.*' => ['exists:specialties,id'],
        ]);
        // Append the logged user id to column 'user_id'
        $data['user_id'] = $user->id;
        $data['profile_picture'] = $this->handleFileUpload(
            $request,
            'profile_picture',
            'uploads/profile_pictures',
            $user->userDetail->profile_picture
        );
        $data['cv_file'] = $this->handleFileUpload(
            $request,
            'cv_file',
            'uploads/cvs',
            $user->userDetail->cv_file
        );

        $userDetail->update($data);

        $user->specialties()->sync($data['specialties']);

        return redirect()->route('user.dashboard')->with('success', 'Profilo editato con successo!');
    }

    private function handleFileUpload($request, $fileKey, $path, $fallbackValue)
    {
        if ($request->hasFile($fileKey)) {
            return Storage::put($path, $request[$fileKey]);
        }

        return $fallbackValue;
    }
}

