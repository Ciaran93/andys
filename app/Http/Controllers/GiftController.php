<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use App\GiftVoucher;
use Illuminate\Support\Facades\Auth;

class GiftController extends Controller
{

    public function admin(){

        if (Auth::check()) {
            $vouchers = GiftVoucher::orderByRaw('id')->get();

            $voucher_data = self::calculateVoucherData($vouchers);

            return view('admin.giftvouchers.viewAll')->with(compact('vouchers', 'voucher_data'));
        } else {
            return redirect('login');
        }

    }

    public function calculateVoucherData($vouchers=null){

        if($vouchers != null){

            $total_purchased = 0;
            $total_redeemed = 0;
            $total_outstanding = 0;

            foreach($vouchers as $voucher){
                $total_purchased += $voucher->amount;
                $total_outstanding += $voucher->remaining;
            }

            $total_redeemed = $total_purchased - $total_outstanding;

            $data = array(
                'total_purchased' => $total_purchased,
                'total_redeemed' => $total_redeemed,
                'total_outstanding' => $total_outstanding,
            );
            return json_encode($data);
        }

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

    public function showGiftVoucher($voucher=null){

        $voucher = new \stdClass();

        $voucher->id = "00000001";
        $voucher->name = 'Ciaran';
        $voucher->email = 'emailfrom@test.com';
        $voucher->recipient_name = 'Steve';
        $voucher->recipient_email = 'test';
        $voucher->amount = 50;


        return view('gift.giftvoucher')->with(compact('voucher'));
    }

    public function save($request=null){

        if($request != null){
            $name = $request->input('name');
            $email = $request->input('email');
            $recipient_name = $request->input('recipient_name');
            $recipient_email = $request->input('recipient_email');
            $amount = $request->input('amount');

            $voucher = new GiftVoucher();
            $voucher->name = $name;
            $voucher->email = $email;
            $voucher->recipient_name = $recipient_name;
            $voucher->recipient_email = $recipient_email;
            $voucher->amount = $amount;
            $voucher->remaining = $amount;

            $voucher->save();

            self::showGiftVoucher($voucher);
                        
        }

    }

    public function redeemVoucher($id){

        $voucher = GiftVoucher::find($id);
        
        echo '<pre>'; print_r($voucher); exit;
        
    }

    public function redeemAjax(Request $request){

        $voucher = GiftVoucher::find($request->id);

        $remaining = $voucher->remaining - $request->amount;
        $voucher->remaining = $remaining;

        // if nothing remains, voucher has been redeemed
        if($remaining == 0){
            $voucher->redeemed = 1;
            $voucher->redeemed_date = date('Y-m-d');
        }

        if($voucher->save()){
            $response = array('data' => $remaining, 'message' => 'success');
            echo json_encode($response); 

        } else {
            $response = array('data' => null, 'message' => 'error', 'error' => '');
            echo json_encode($response); 

        }
        
        exit;
        
    }


}
