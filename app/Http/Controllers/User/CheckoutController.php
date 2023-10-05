<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Sponsorship;
use App\Models\User;
use Braintree\Gateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function generate(Sponsorship $sponsorship)
    {
        $gateway = new Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY')
        ]);
            $clientToken = $gateway->clientToken()->generate();
            
            return view ('user.payment', compact('clientToken', 'sponsorship'));
        
    }

    public function makePayment(Request $request, Sponsorship $sponsorship)
    {
        $doctor=User::where('user_id', Auth::user()->id)->first();

        $gateway = new Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY')
        ]);
        date_default_timezone_set('Europe/Rome');
        $nowDate=date("Y-m-d H:i:s");
        $start_str = strtotime($nowDate);
        $end_str = $start_str + (($sponsorship->duration_time) * 3600);
        date_default_timezone_set('Europe/Rome');
        $end_at = date("Y-m-d H:i:s", $end_str);

        $sponsorship->doctors()->attach($doctor->id,
        ['start_at' => $nowDate,
        'end_at'=> $end_at]);


        //$nonce = $request->payment_method_nonce;

        $result = $gateway->transaction()->sale([
            'amount' => $sponsorship->price,
            'paymentMethodNonce' => 'fake-valid-nonce',
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            // pagamento completato
            $transaction = $result->transaction;
            $transaction->status;
            return redirect()->route('user.dashboard')->with('message', 'Nuova sponsorizzazione creata correttamente');;

            //dd('completato');
        } else {
            // errore nel pagamento
            dd('errore');
        }
    }
}
