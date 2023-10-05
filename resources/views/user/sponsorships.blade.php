<x-app-layout>
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-semibold mb-6">Prodotti in Sponsorizzazione</h1>
    
        <ul>
            @foreach($sponsors as $sponsor)
                <li>
                    {{ $sponsor->plan_name }} - euro {{ $sponsor->price }}
                    <a href="{{ route('user.generate', ['id' => $sponsor->id]) }}" class="btn btn-primary">Paga</a>
                </li>
                <li>ore {{ $sponsor->duration_time }}</li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
