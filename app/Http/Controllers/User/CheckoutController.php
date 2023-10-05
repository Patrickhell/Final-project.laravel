<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Sponsorship;
use App\Models\User;
use Braintree\Gateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function makePayment(Request $request)
    {
        $user = Auth::user();

        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'nncd4p6c7qk3248q',
            'publicKey' =>  'bwhftq43kqy8ysy2',
            'privateKey' => '06ff7e924e40a90190b7315c009d3396'
        ]);

        $sponsorshipId = $request->input('amount');

        // Recupera il piano di sponsorizzazione in base al valore
        $sponsorship = Sponsorship::find($sponsorshipId);

        if(!$sponsorship) {
            return redirect()->back()->with('warning', 'Sponsorizzazione invalida, perfavore riprova!');
        }

        $result = $gateway->transaction()->sale([
            'amount' => $sponsorship->price,
            'paymentMethodNonce' => 'fake-valid-nonce',
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            $transaction = $result->transaction;
            $transaction->status;

            $startDate = now(); // Use Laravel's now() helper
            $endDate = $startDate->copy()->addHours($sponsorship->duration_time); // Assuming duration_time is in hours
            DB::table('sponsorship_user')->insert([
                'user_id' => $user->id,
                'sponsorship_id' => $sponsorship->id,
                'sponsorship_start_date' => $startDate,
                'sponsorship_end_date' => $endDate,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->route('user.dashboard')->with('success', 'Nuova sponsorizzazione creata correttamente');
        } else {
            // errore nel pagamento
            return redirect()->route('user.dashboard')->with('error', $result);
        }
    }
}
