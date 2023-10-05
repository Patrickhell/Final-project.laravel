<x-app-layout>
    <div class="w-full p-8">
        <section class="relative bd_edit-profile-stack shadow-md h-44 bg-cover bg-[url(https://media.istockphoto.com/id/638377134/photo/doctor-man-with-stethoscope-in-hospital.jpg?s=612x612&w=0&k=20&c=xldnHCxhAhi4VYWsrucaABm_jyUcn9vN1Azh2XcLQ_0=)]">
            <div class="flex justify-between">
                <div class="bd_overlay-img rounded-full absolute top-2/3 left-10 w-[9.2rem] h-[9.25rem]">
                    <img class="rounded-full w-36 h-36"
                        src="{{ Auth::user()->userDetail ? asset('storage/' . Auth::user()->userDetail->profile_picture) : asset('storage/' . 'images/default-profile-picture.jpg') }}"
                        alt="{{ Auth::user()->name }}'s picture">
                </div>
                <div class="ml-5 flex justify-between absolute top-full left-48 right-10">
                    <div class="self-center">
                        <h1 class="text-4xl font-semibold">{{ $user->name }}</h1>
                        <span class="text-lg bd_display-email">{{ $user->email }}</span>
                    </div>
                    <div class="self-end">
                        <a href="" class="px-4 py-3 focus:ring-4 focus:outline-none focus:ring-bd_btn-shadow rounded-lg shadow-md bd_btn">
                            <i class="fa-regular fa-eye"></i>
                            Visualizza profilo
                        </a>
                    </div>
                </div>
            </div>
        </section>

            <form action="{{ route('user.update') }}" method="post" enctype="multipart/form-data" class="mt-32">
                @csrf
                @method('PUT')

                {{-- Personal Informations --}}
                <section class="bd_edit-profile-stack shadow-md p-8 flex">
                    <div class="w-2/4">
                        <h3 class="text-2xl font-semibold">
                            Informazioni Personali
                        </h3>
                        <p class="text-md">*Queste informazioni non verranno mostrate sul tuo profilo</p>
                    </div>
                    <div class="w-2/4">
                        <div class="w-full min-w-[200px]">
                            <label for="birth_date" class="block mb-2 text-sm font-medium text-gray-900 ">
                                Data di nascita*
                            </label>
                            <input type="date" id="birth_date" class="bg-bd_secondary-color border-2 border-bd_primary-color text-gray-900 placeholder-gray-900 text-sm rounded-lg focus:ring-bd_primary-color dark:bg-gray-700 focus:border-bd_primary-color block w-full p-2.5"
                                placeholder="" name="birth_date" value="{{ old( 'birth_date' , $user->userDetail->birth_date )}}">

                            @error('birth_date')
                                <div id="alert-error" class="flex items-center p-4 my-4 text-red-800 border border-red-500 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <div class="ml-3 text-sm font-medium">
                                        {{ $message }}
                                    </div>
                                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-error" aria-label="Close">
                                        <span class="sr-only">Close</span>
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                    </button>
                                </div>
                            @enderror
                        </div>

                        <div class="w-full min-w-[200px] mt-4">
                            <label for="personal_address" class="block mb-2 text-sm font-medium text-gray-900 ">
                                Indirizzo di casa + CAP*
                            </label>
                            <input type="text" id="personal_address" class="bg-bd_secondary-color border-2 border-bd_primary-color text-gray-900 placeholder-gray-900 text-sm rounded-lg focus:ring-bd_primary-color dark:bg-gray-700 focus:border-bd_primary-color block w-full p-2.5"
                                placeholder="" name="personal_address" value="{{ old( 'personal_address' , $user->userDetail->personal_address )}}">

                            @error('personal_address')
                                <div id="alert-error" class="flex items-center p-4 my-4 text-red-800 border border-red-500 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <div class="ml-3 text-sm font-medium">
                                        {{ $message }}
                                    </div>
                                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-error" aria-label="Close">
                                        <span class="sr-only">Close</span>
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                    </button>
                                </div>
                            @enderror
                        </div>
                    </div>
                </section>

                {{-- Work Informations --}}
                <section class="bd_edit-profile-stack shadow-md mt-8 p-8 flex">
                    <div class="w-2/4">
                        <h3 class="text-2xl font-semibold">
                            Informazioni Profilo BDoctors
                        </h3>
                        <p class="text-md">*Queste informazioni saranno pubbliche a chinque visiti il tuo profilo. Fai attenzione!</p>
                    </div>
                    <div class="w-2/4">
                        <div class="w-full min-w-[200px]">
                            <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 ">
                                Numero di telefono*
                            </label>
                            <input type="text" id="phone_number" class="bg-bd_secondary-color border-2 border-bd_primary-color text-gray-900 placeholder-gray-900 text-sm rounded-lg focus:ring-bd_primary-color dark:bg-gray-700 focus:border-bd_primary-color block w-full p-2.5"
                                placeholder="" name="phone_number" value="{{ old( 'phone_number' , $user->userDetail->phone_number )}}">

                            @error('phone_number')
                                <div id="alert-error" class="flex items-center p-4 my-4 text-red-800 border border-red-500 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <div class="ml-3 text-sm font-medium">
                                        {{ $message }}
                                    </div>
                                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-error" aria-label="Close">
                                        <span class="sr-only">Close</span>
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                    </button>
                                </div>
                            @enderror
                        </div>

                        <div class="w-full min-w-[200px] mt-4">
                            <label for="work_address" class="block mb-2 text-sm font-medium text-gray-900 ">
                                Indirizzo di lavoro*
                            </label>
                            <input type="text" id="work_address" class="bg-bd_secondary-color border-2 border-bd_primary-color text-gray-900 placeholder-gray-900 text-sm rounded-lg focus:ring-bd_primary-color dark:bg-gray-700 focus:border-bd_primary-color block w-full p-2.5"
                                placeholder="" name="work_address" value="{{ old( 'work_address' , $user->userDetail->work_address )}}">

                            @error('work_address')
                                <div id="alert-error" class="flex items-center p-4 my-4 text-red-800 border border-red-500 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <div class="ml-3 text-sm font-medium">
                                        {{ $message }}
                                    </div>
                                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-error" aria-label="Close">
                                        <span class="sr-only">Close</span>
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                    </button>
                                </div>
                            @enderror
                        </div>

                        <div class="w-full min-w-[200px] mt-4">
                            <label for="performance" class="block mb-2 text-sm font-medium text-gray-900 ">
                                Tipo di visita*
                            </label>
                            <input type="text" id="performance" class="bg-bd_secondary-color border-2 border-bd_primary-color text-gray-900 placeholder-gray-900 text-sm rounded-lg focus:ring-bd_primary-color dark:bg-gray-700 focus:border-bd_primary-color block w-full p-2.5"
                                placeholder="" name="performance" value="{{ old( 'performance' , $user->userDetail->performance )}}">

                            @error('performance')
                                <div id="alert-error" class="flex items-center p-4 my-4 text-red-800 border border-red-500 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <div class="ml-3 text-sm font-medium">
                                        {{ $message }}
                                    </div>
                                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-error" aria-label="Close">
                                        <span class="sr-only">Close</span>
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                    </button>
                                </div>
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

                    </div>
                </section>

                {{-- File Upload --}}
                <section class="bd_edit-profile-stack shadow-md">

                </section>

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


                <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                    Submit
                </button>
            </form>
    </div>
</x-app-layout>
