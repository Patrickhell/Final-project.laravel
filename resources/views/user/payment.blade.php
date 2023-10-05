<x-app-layout>
    {{-- @section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-semibold mb-6">Pagamento per {{ $sponsor->name }}</h1>

    <div class="mb-4">
        <p>Prodotto: {{ $sponsor->name }}</p>
        <p>Prezzo: ${{ $sponsor->price }}</p>
    </div>

    <form action="{{ route('make.payment') }}" method="POST" class="max-w-md mx-auto">
        @csrf

        <!-- Altri campi per i dettagli di pagamento, come il nonce del metodo di pagamento -->

        <input type="hidden" name="sponsor_id" value="{{ $sponsor->id }}">

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full">
            Paga
        </button>
    </form>
</div>
@endsection --}}
</x-app-layout>