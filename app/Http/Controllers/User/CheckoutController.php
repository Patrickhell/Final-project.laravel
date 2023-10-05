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
    public function generate(Request $request)
    {
        $sponsorships=Sponsorship::all();

        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'nncd4p6c7qk3248q',
            'publicKey' =>  'bwhftq43kqy8ysy2',
            'privateKey' => '06ff7e924e40a90190b7315c009d3396'
        ]);
            $clientToken = $gateway->clientToken()->generate();
            
            return view ('user.payment', compact('clientToken', 'sponsorships'));
        
    }

    public function makePayment(Request $request, Sponsorship $sponsorship)
    {
        $doctor=User::where('id', Auth::user()->id)->first();

        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'nncd4p6c7qk3248q',
            'publicKey' =>  'bwhftq43kqy8ysy2',
            'privateKey' => '06ff7e924e40a90190b7315c009d3396'
        ]);

    // Recupera il valore selezionato dall'input nascosto "amount"
    $selectedAmount = $request->input('amount');

    // Recupera il piano di sponsorizzazione in base al valore
    $promotion = Sponsorship::find($selectedAmount);


        // date_default_timezone_set('Europe/Rome');
        // $nowDate=date("Y-m-d H:i:s");
        // $start_str = strtotime($nowDate);
        // $end_str = $start_str + (($sponsorship->duration_time) * 3600);
        // date_default_timezone_set('Europe/Rome');
        // $end_at = date("Y-m-d H:i:s", $end_str);

        // $sponsorship->doctors()->attach($doctor->id,
        // ['start_at' => $nowDate,
        // 'end_at'=> $end_at]);


        // $nonce = $request->payment_method_nonce;

        $result = $gateway->transaction()->sale([
            'amount' => $promotion->price,
            'paymentMethodNonce' => 'fake-valid-nonce',
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
        if ($result->success) {
            $transaction = $result->transaction;
            $transaction->status;
            return redirect()->route('user.dashboard')->with('message', 'Nuova sponsorizzazione creata correttamente');

        } else {
            // errore nel pagamento
            dd($result);
        }
    }
}
