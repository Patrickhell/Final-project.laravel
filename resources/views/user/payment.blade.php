<x-app-layout>
    <div class="container payment">
        <h2 class="mt-5">Seleziona il tuo piano di sponsorizzazione</h2>

        @foreach ($sponsorships as $sponsorship)
        <input id="default-radio-{{$sponsorship->id}}" type="radio" value="{{$sponsorship->id}}" name="promotion-plan" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" checked> 
        <label for="default-radio-{{$sponsorship->id}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$sponsorship->plan_name}} ({{$sponsorship->price}}$)</label>
        @endforeach
    
        <form id="payment-form" method="post" action="{{ route('user.makePayment') }}" class="row">
            @csrf
            <div class="col-md-6 position-relative p-0">
                <div class="price-card">
                    <h2 class="text-capitalize">{{$sponsorships[0]->plan_name}}</h2>
                    <h6 style="font-weight:300;color:#8b8e93;">Il tuo profilo risulterà in evidenza per:<br> <strong style="color:#3782e8;font-size:20px;font-weight:600;">{{$sponsorships[0]->duration}} Ore</strong>  </h6>
                    <p class="price"><span>&euro; {{$sponsorships[0]->price}}</span></p>
    
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
            document.addEventListener('DOMContentLoaded', function () {
                var radioButtons = document.querySelectorAll('input[name="promotion-plan"]');
    
                radioButtons.forEach(function (radio) {
                    radio.addEventListener('change', function () {
                        // Ottieni il valore dell'input radio selezionato
                        var selectedValue = document.querySelector('input[name="promotion-plan"]:checked').value;
    
                        // Assegna il valore all'input nascosto 'amount'
                        document.getElementById('amount').value = selectedValue;
                    });
                });
            });
        </script>
</x-app-layout>