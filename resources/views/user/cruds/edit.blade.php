<x-app-layout>
    <form action="{{ route('user.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                Birth Date
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="grid-last-name" type="date" name="birth_date" value="{{ old( 'birth_date' , $user->userDetail->birth_date )}}">

            @error('birth_date')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                Phone Number
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="grid-last-name" type="text" name="phone_number" value="{{ old( 'phone_number' , $user->userDetail->phone_number )}}">

            @error('phone_number')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                Work Address
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="grid-last-name" type="text" name="work_address" value="{{ old( 'work_address' , $user->userDetail->work_address )}}">

            @error('work_address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                Personal Address
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="grid-last-name" type="text" name="personal_address" value="{{ old( 'work_address' , $user->userDetail->personal_address )}}">

            @error('personal_address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                Performance
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="grid-last-name" type="text" name="performance" value="{{ old( 'work_address' , $user->userDetail->performance )}}">

            @error('performance')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                Profile Picture
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="grid-last-name" type="file" name="profile_picture" value="{{ $user->userDetail->profile_picture }}">

            @error('profile_picture')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                CV File
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="grid-last-name" type="file" name="cv_file" value="{{ $user->userDetail->cv_file }}">

            @error('cv_file')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Dropdown search <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
          </svg>
        </button>

        @if($errors->has('specialties'))
            <span class="text-danger">{{ $errors->first('specialties') }}</span>
        @endif

        <!-- Dropdown menu -->
        <div id="dropdown" class="z-10 hidden bg-white rounded-lg shadow w-60 dark:bg-gray-700">
            <ul class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownButton">
                @foreach ($specialties as $specialty)
                    <li>
                        <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                            <input id="specialty_{{ $specialty->id }}" type="checkbox" value="{{ $specialty->id }}" {{ $user->specialties->contains($specialty->id) ? 'checked' : '' }} name="specialties[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="specialty_{{ $specialty->id }}" class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">
                                {{ $specialty->name }}
                            </label>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>


        <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
            Submit
        </button>
    </form>
</x-app-layout>
