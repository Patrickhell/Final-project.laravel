<x-app-layout>
    <x-popup-create-profile />

    <div class="bd_dashboard-wrapper h-full">
        {{-- Message Container --}}
        <x-dashboard.message-container />

        {{-- Reviews Container --}}
        <x-dashboard.reviews-container />

        <x-dashboard.stats-cards />
    </div>
</x-app-layout>
