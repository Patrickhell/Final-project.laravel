<x-app-layout>
    <div class="container payment">
        <h2 class="mt-5">Seleziona il tuo piano di sponsorizzazione</h2>

        @if(session('warning'))
        <div id="alert-4" class="flex items-center p-4 mb-4 text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-medium">
                {{ session('warning') }}
            </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-yellow-50 text-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 hover:bg-yellow-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-yellow-300 dark:hover:bg-gray-700" data-dismiss-target="#alert-4" aria-label="Close">
              <span class="sr-only">Close</span>
              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
              </svg>
            </button>
          </div>
        @endif

        @foreach ($sponsorships as $sponsorship)
            <input id="default-radio-{{$sponsorship->id}}" type="radio" name="promotion-plan" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" checked>
            <label for="default-radio-{{$sponsorship->id}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$sponsorship->plan_name}} ({{$sponsorship->price}}€)</label>
        @endforeach

        <form id="payment-form" method="post" action="{{ route('user.makePayment') }}" class="row">
            @csrf
            <div class="col-md-6 position-relative p-0">
                <div class="price-card" id="price-card">
                    <h2 class="text-capitalize"></h2>
                    <h6 style="font-weight:300;color:#8b8e93;">Il tuo profilo risulterà in evidenza per:<br> <strong style="color:#3782e8;font-size:20px;font-weight:600;"></strong>  </h6>
                    <p class="price"></p>

                    <div id="dropin-container"></div>
                </div>
            </div>
            <div class="col-md-6">
                <script src="https://js.braintreegateway.com/web/dropin/1.34.0/js/dropin.min.js"
                    data-braintree-dropin-authorization="{{ $clientToken }}"
                ></script>
                <div id="checkout-message"></div>

                <button id="submit-button" class="bn632-hover bn26">Paga adesso</button>
            </div>

            <input type="hidden" class="form-control" name="amount" id="amount" value="">
            <input type="hidden" id="nonce" name="payment_method_nonce" value="fake-valid-nonce"/>
        </form>

        <script>
            var sponsorshipsData = {!! json_encode($sponsorships) !!};
            var selectedSponsorship;
    
            document.addEventListener('DOMContentLoaded', function () {
                var radioButtons = document.querySelectorAll('input[name="promotion-plan"]');
                var priceCard = document.getElementById('price-card');
    
                radioButtons.forEach(function (radio) {
                    radio.addEventListener('change', function () {
                        // Ottieni il valore dell'input radio selezionato
                        var selectedValue = radio.id;
    
                        // Trova il corrispondente piano di sponsorizzazione in base all'ID selezionato
                        selectedSponsorship = sponsorshipsData.find(function (sponsorship) {
                            return sponsorship.id === parseInt(selectedValue.split('-')[2]); // Estrai il numero dall'ID
                        });
    
                        // Aggiorna il testo nel div "price-card" con le informazioni del piano di sponsorizzazione selezionato
                        priceCard.innerHTML = `
                            <h2 class="text-capitalize">${selectedSponsorship.plan_name}</h2>
                            <h6 style="font-weight:300;color:#8b8e93;">Il tuo profilo risulterà in evidenza per:<br> <strong style="color:#3782e8;font-size:20px;font-weight:600;">${selectedSponsorship.duration_time} Ore</strong></h6>
                            <p class="price"><span>&euro; ${selectedSponsorship.price}</span></p>
                        `;
                    });
                });
            });
    
            document.addEventListener('DOMContentLoaded', function () {
                var radioButtons = document.querySelectorAll('input[name="promotion-plan"]');
    
                radioButtons.forEach(function (radio) {
                    radio.addEventListener('change', function () {
                        // Ottieni il valore dell'input radio selezionato
                        var selectedValue = document.querySelector('input[name="promotion-plan"]:checked').value;
    
                        // Assegna il valore all'input nascosto 'amount'
                        document.getElementById('amount').value = selectedValue;

                        console.log("Selected Value:", selectedValue);
                        console.log("Selected Sponsorship:", selectedSponsorship);

                    });
                });
            });
        </script>
</x-app-layout>
