<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest;
use App\Models\Sponsorship;
use Braintree\Gateway;
use Braintree\PaymentMethod;
use Braintree\PaymentMethodNonce;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function generate(Request $request, Gateway $gateway)
    {
        $token = $gateway->clientToken()->generate();

        $data = [
            'success' => true,
            'token' => $token
        ];

        return response()->json($data, 200);
    }

    public function makePayment(OrderRequest $request, Gateway $gateway)
    {
        $sponsor = Sponsorship::find($request->product);

        $result= $gateway->transaction()->sale([           
            'amount'=>$sponsor->price,
            'paymentMethodNonce'=> $request->token,
        ]);

        if($result->success)
        {return response()->json(['success' => true, 'message' => 'Transazione eseguita con successo.'], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Transazione fallita.'], 401);
        }
    }
}

