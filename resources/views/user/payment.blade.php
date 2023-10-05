<x-app-layout>
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-semibold mb-6">Effettua il Pagamento</h1>
    
        @if (session('error'))
            <div class="bg-red-500 text-white p-3 mb-4">
                {{ session('error') }}
            </div>
        @endif
    
        <form action="{{ route('api.make.payment') }}" method="POST" class="max-w-md mx-auto">
            @csrf
    
            <!-- Inserisci qui i campi per i dettagli di pagamento, come il numero di carta, la data di scadenza, ecc. -->
            <div class="mb-4">
                <label for="payment_method_nonce" class="block text-gray-700 text-sm font-bold mb-2">
                    Nonce del Metodo di Pagamento
                </label>
                <input type="text" name="payment_method_nonce" id="payment_method_nonce" class="form-input mt-1 block w-full" placeholder="Inserisci il nonce del pagamento" required>
            </div>
    
            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-full hover:bg-blue-700">
                Paga
            </button>
        </form>
    </div>
</x-app-layout>