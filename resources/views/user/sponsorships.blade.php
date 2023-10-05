<x-app-layout>
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-semibold mb-6">Prodotti in Sponsorizzazione</h1>
        @if($hasActiveSponsorship)
            <span>ATTENZIONE! non puopi acquistare un altra sponsorizzazione finche non finisce la precendente</span>
        @endif
        <ul>
            @foreach($sponsors as $sponsor)
            <li>
                {{ $sponsor->plan_name }} - euro {{ $sponsor->price }}
            </li>
            <li>ore {{ $sponsor->duration_time }}</li>
            <li>
                @if($hasActiveSponsorship)
                    <span>Bottone paga non funzionante</span>
                @else
                <form action="{{ route('user.generate') }}" method="post">
                    @csrf
                    <input type="hidden" name="sponsorship_id" value="{{ $sponsor->id }}">
                    <button type="submit" class="btn btn-primary">Paga</button>
                </form>
                @endif
            </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
