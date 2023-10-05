<x-app-layout>
    <x-popup-create-profile />
    <div class="bd_dashboard-wrapper h-full">
        {{-- Message Container --}}
        <x-dashboard.message-container :messages="$messages"/>

        {{-- Reviews Container --}}
        <x-dashboard.reviews-container :reviews="$reviews"/>

        <x-dashboard.stats-cards :votes="$votes" :reviews="$reviews" :messages="$messages"/>
    </div>
</x-app-layout>
