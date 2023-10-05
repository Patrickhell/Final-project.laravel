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

        <form id="payment-form" method="POST" action="{{ route('user.makePayment') }}" class="row">
            @csrf
            @method('POST')

            <div class="col-md-6 position-relative p-0">
                <div class="price-card" id="price-card">
                    <h2 class="text-capitalize">{{ $sponsorship->plan_name }}</h2>
                    <h6 style="font-weight:300;color:#8b8e93;">Il tuo profilo risulterà in evidenza per:<br> <strong style="color:#3782e8;font-size:20px;font-weight:600;">{{ $sponsorship->duration_time }}</strong>  </h6>
                    <p class="price">{{ $sponsorship->price }}</p>

                    <div id="dropin-container"></div>
                </div>
            </div>
            <div class="col-md-6">
                <script src="https://js.braintreegateway.com/web/dropin/1.34.0/js/dropin.min.js"
                    data-braintree-dropin-authorization="{{ $clientToken }}"
                ></script>
                <div id="checkout-message"></div>

                <button id="submit-button" class="bn632-hover bn26" type="submit">Paga adesso</button>
            </div>

            <input type="hidden" class="form-control" name="sponsorship" value="{{ $sponsorship }}">
            <input type="hidden" id="nonce" name="payment_method_nonce" value="fake-valid-nonce"/>
        </form>

</x-app-layout>
