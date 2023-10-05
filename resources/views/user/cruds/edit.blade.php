@section('title', 'Modifica profilo')

<x-app-layout>
    <div class="w-full p-8">
        <form action="{{ route('user.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <section class="relative bd_edit-profile-stack shadow-md h-44 bg-cover bg-center bg-[url(https://img.freepik.com/free-photo/health-still-life-with-copy-space_23-2148854031.jpg?w=2000&t=st=1695380272~exp=1695380872~hmac=1e9ccf02b66ab81d84a301c926074e3f2d5e846626c3db9bb12d86549bb82c43)]">
                <div class="flex justify-between">

                    {{-- Display of profile picture with input select file --}}
                    <div class="bd_overlay-img rounded-full absolute top-2/3 left-10 w-[9.2rem] h-[9.25rem] cursor-pointer" id="profilePictureContainer">
                        <img class="rounded-full w-36 h-36 object-center object-cover"
                            src="{{ Auth::user()->userDetail ? asset('storage/' . Auth::user()->userDetail->profile_picture) : asset('storage/' . 'images/default-profile-picture.jpg') }}"
                            alt="{{ Auth::user()->name }}'s picture"
                            id="profilePictureDisplay">
                            <input id="profileInput" class="hidden overflow-hidden absolute cursor-pointer w-full h-full top-0 left-0" type="file" name="profile_picture">
                        <div class="w-36 h-36 group hover:bg-gray-200 opacity-60 rounded-full absolute top-0 flex justify-center items-center cursor-pointer transition duration-500">
                            <img class="hidden group-hover:block w-12" src="https://www.svgrepo.com/show/33565/upload.svg" alt="upload icon hover" />
                        </div>
                    </div>

                    {{-- Display User name and email --}}
                    <div class="ml-5 flex justify-between absolute top-full left-48 right-10">
                        <div class="self-center">
                            <h1 class="text-4xl font-semibold">{{ $user->name }}</h1>
                            <span class="text-lg bd_display-email">{{ $user->email }}</span>
                        </div>
                        <div class="self-end">
                            <a href="http://localhost:5173/doctors/{{ $user->slug }}" class="px-4 py-3 focus:ring-4 focus:outline-none focus:ring-bd_btn-shadow rounded-lg shadow-md bd_btn">
                                <i class="fa-regular fa-eye"></i>
                                Visualizza profilo
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <div class="mt-32 space-y-8">
                <div class="flex flex-row gap-4 justify-end">
                    <a href="{{ route('user.dashboard') }}" class="px-4 py-3 focus:ring-4 focus:outline-none focus:ring-bd_btn-shadow rounded-lg shadow-md bg-gray-100">
                        Cancella Operazione
                    </a>
                    <button class="px-4 py-3 focus:ring-4 focus:outline-none focus:ring-bd_btn-shadow rounded-lg shadow-md bd_btn" type="submit">
                        Salva dati
                    </button>
                </div>

                <hr class="border-black">

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
                <section class="bd_edit-profile-stack shadow-md p-8 flex">
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
                            <label for="performance" class="block mb-2 text-sm font-medium text-gray-900">
                                Tipo di visita*
                            </label>
                            <input type="text" id="performance" class="bg-bd_secondary-color border-2 border-bd_primary-color text-gray-900 placeholder-gray-900 text-sm rounded-lg focus:ring-bd_primary-color focus:border-bd_primary-color block w-full p-2.5"
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

                        {{-- Specialties Section --}}
                        <div class="grid mt-4">
                            <div class="p-2.5 bg-bd_secondary-color border-2 border-bd_primary-color text-sm rounded-lg">
                                <details class="group">
                                    <summary class="flex justify-between items-center font-medium cursor-pointer list-none">
                                        <span class="block text-sm font-medium text-gray-900 pointer-events-none select-none">
                                            Selezionare specialita*
                                        </span>
                                        <span class="transition group-open:rotate-180">
                                            <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                                <path d="M6 9l6 6 6-6"></path>
                                            </svg>
                                        </span>
                                    </summary>
                                    <ul class="text-neutral-600 mt-3 group-open:animate-fadeIn">
                                        @foreach ($specialties as $specialty)
                                            <li class="flex items-center p-2 rounded hover:bg-gray-100">
                                                <input id="specialty_{{ $specialty->id }}" type="checkbox" value="{{ $specialty->id }}" {{ $user->specialties->contains($specialty->id) ? 'checked' : '' }} name="specialties[]"
                                                    class="w-4 h-4 text-bd_primary-color bg-gray-100 border-gray-300 rounded focus:ring-bd_primary-color focus:ring-2 ">
                                                <label for="specialty_{{ $specialty->id }}"
                                                    class="w-full ml-2 text-sm font-medium text-gray-900 rounded pointer-events-none select-none">
                                                    {{ $specialty->name }}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </details>
                            </div>
                        </div>
                        @error('specialties')
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
                </section>

                {{-- CV Upload --}}
                <section class="bd_edit-profile-stack shadow-md p-8 flex">
                    <div class="w-2/4">
                        <h3 class="text-2xl font-semibold">
                            Caricamento Curriculum
                        </h3>
                        <p class="text-md">*Il tuo curriculum non sara visibile al pubblico!</p>
                    </div>
                    <div class="w-2/4">
                        <div class="flex items-center justify-center w-full">
                            <label for="cv_file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-bd_primary-color border-dashed rounded-lg cursor-pointer bg-bd_secondary-color hover:bg-gray-100 ">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400 text-center"><span class="font-semibold">Clicca per caricare</span>oppure trascina il file!</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 text-center">PDF</p>
                                </div>
                                <input id="cv_file" type="file" class="hidden" name="cv_file" value="{{ $user->userDetail->cv_file }}" />
                            </label>
                        </div>
                        @error('cv_file')
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
                </section>

                <hr class="border-black">

                <div class="flex flex-row gap-4 justify-end">
                    <a href="{{ route('user.dashboard') }}" class="px-4 py-3 focus:ring-4 focus:outline-none focus:ring-bd_btn-shadow rounded-lg shadow-md bg-gray-100">
                        Cancella Operazione
                    </a>
                    <button class="px-4 py-3 focus:ring-4 focus:outline-none focus:ring-bd_btn-shadow rounded-lg shadow-md bd_btn" type="submit">
                        Salva dati
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
