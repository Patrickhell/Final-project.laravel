<x-app-layout>
    
        <div class="flex flex-row flex-wrap justify-center  justify-items-center w-4/5 mx-auto pt-20 rounded-xl p-0">
            
            <a class="bd_dashboard-stat-2  rounded-none rounded-ss-xl shadow-xl overflow-hidden w-2/4 h-60 hover:scale-105 hover:duration-300 hover:rounded-xl hover:grayscale hover:z-30 active:scale-95 active:duration-150" href="{{ route('user.messages')}}" >
                <div class="flex justify-center gap-3 2xl:gap-10 items-center py-10 px-6 h-full">
                    <div class="text-white">
                        <p class="text-3xl md:text-4xl xl:text-2xl">Conta Messaggi</p>
                        <h2 class="text-5xl md:text-7xl lg:text-8xl xl:text-3xl 2k:text-7xl font-bold">{{ $totalMessagesCount }}</h2>
                    </div>
                    <div class="h-auto w-28 md:w-40 lg:w-48 xl:w-28 2k:w-40">
                        <img src="{{ asset('storage/images/message-icon-dashboard.png') }}" alt="messages icon"
                            class="w-full h-full invert">
                    </div>
                </div>
            </a>

            <a class="bd_dashboard-stat-3 rounded-none shadow-xl rounded-se-xl overflow-hidden w-2/4 h-60 hover:scale-105 hover:duration-300 hover:rounded-xl hover:grayscale hover:z-30 active:scale-95 active:duration-150" href="{{ route('user.reviews')}}">
                <div class="flex justify-center gap-3 2xl:gap-10 items-center py-10 px-6 h-full">
                    <div class="text-white">
                        <p class="text-3xl md:text-4xl xl:text-2xl">Conta Recensioni</p>
                        <h2 class="text-5xl md:text-7xl lg:text-8xl xl:text-3xl 2k:text-7xl font-bold">{{ $totalReviewsCount }}</h2>
                    </div>
                    <div class="h-auto w-28 md:w-40 lg:w-48 xl:w-28 2k:w-40">
                        <img src="{{ asset('storage/images/reviews-icon-dashboard.png') }}" alt="reviews icon"
                            class="w-full h-full invert">
                    </div>
                </div>
            </a>

            <a class="bd_dashboard-stat-1 border rounded-none rounded-bl-xl shadow-xl overflow-hidden w-2/4 h-60 hover:scale-105 hover:duration-300 hover:rounded-xl hover:grayscale hover:z-30 active:scale-95 active:duration-150" href="{{ route('user.reviews')}}">
                <div class="flex justify-center gap-3 2xl:gap-10 items-center py-10 px-6 h-full">
                    <div class="text-white">
                        <p class="text-3xl md:text-4xl xl:text-2xl">Media Voti</p>
                        <h2 class="text-5xl md:text-7xl lg:text-8xl xl:text-3xl 2k:text-7xl font-bold">{{ number_format($averageVote, 2) }}</h2>
                    </div>
                    <div class="h-auto w-28 md:w-40 lg:w-48 xl:w-28 2k:w-40">
                        <img src="{{ asset('storage/images/votes-icon-dashboard.png') }}" alt="messages icon"
                            class="w-full h-full invert">
                    </div>
                </div>
            </a>
            
            <a class="bd_dashboard-stat-4 shadow-xl overflow-hidden rounded-br-xl w-2/4 h-60 bg-black hover:z-50  hover:rounded-xl hover:duration-300 hover:scale-105 active:duration-150">
                <div style="width:450px">
                <canvas id="myChart"></canvas>
                </div>
            </a>
        </div>
    
</x-app-layout>
@php
    //<div class="lg:basis-11/12 md:basis-auto hover:scale-105 hover:duration-300 ole mycard-stats"> */
@endphp