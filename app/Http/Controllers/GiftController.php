<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;

class GiftController extends Controller
{

    public function index()
    {
        return view('gift.gift');
    }

    public function charge(Request $request){
        
        Stripe::setApiKey(env('STRIPE_API_KEY', ''));

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $request->input('stripeToken');
        $amount = $request->input('amount');

        // stripe take payments in cents, multiple by 100 here
        // we arent doing them out of money
        $amount = $amount * 100; 

        $charge = \Stripe\Charge::create([
            'amount' => $amount,
            'currency' => 'EUR',
            'description' => 'Gift Voucher',
            'source' => $token,
        ]);

        // save the gift voucher
        self::save($request);

        return view('gift.thanks');
    }

    public function save($request=null){

        if($request != null){
            $name = $request->input('name');
            $email = $request->input('email');
            $recipient_name = $request->input('recipient_name');
            $recipient_email = $request->input('recipient_email');
            $amount = $request->input('amount');
            
        }

    }
}
