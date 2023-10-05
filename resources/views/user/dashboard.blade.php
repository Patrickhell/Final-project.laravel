<x-app-layout>
    <div class="bd_dashboard-wrapper">
        <div class="bd_dashboard-stats-wrapper w-full">
            <x-dashboard.stats-cards :votes="$votes" :reviews="$reviews" :messages="$messages"/>
        </div>
            {{-- Message Container --}}
            <x-dashboard.message-container :messages="$messages"/>

            {{-- Reviews Container --}}
            <x-dashboard.reviews-container :reviews="$reviews"/>
    </div>
</x-app-layout>
