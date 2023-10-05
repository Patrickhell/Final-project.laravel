<x-app-layout>
    <div class="container payment">
        <h2 class="mt-5">Riepilogo pagamento</h2>
    
        <form id="payment-form" method="post" action="{{ route('user.makePayment', ['sponsorship' => $sponsorship]) }}" class="row">
            @csrf
            <div class="col-md-6 position-relative p-0">
                <div class="price-card">
                    <h2 class="text-capitalize">{{$sponsorship->plan_name}}</h2>
                    <h6 style="font-weight:300;color:#8b8e93;">Il tuo profilo risulterà in evidenza per:<br> <strong style="color:#3782e8;font-size:20px;font-weight:600;">{{$sponsorship->duration}} Ore</strong>  </h6>
                    <p class="price" ><span>&euro; {{$sponsorship->price}}</span></p>
    
                    <div id="dropin-container"></div>
                </div>
            </div>
            <div class="col-md-6">
                <script src="https://js.braintreegateway.com/web/dropin/1.34.0/js/dropin.min.js"
                 data-braintree-dropin-authorization="{{ $clientToken }}"
                 {{-- data-paypal.flow="checkout"
                 data-paypal.currency="EUR"
                 data-paypal-credit.flow="vault" --}}
                ></script>
                <div id="checkout-message"></div>
    
                <button id="submit-button" class="bn632-hover bn26">Paga adesso</button>
            </div>
    
            <input type="hidden" class="form-control" name="amount" id="amount" value="{{$sponsorship->price}}">
            <input type="hidden" id="nonce" name="payment_method_nonce" value="fake-valid-nonce"/>
    
    
        </form>
</x-app-layout>