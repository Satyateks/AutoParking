<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Stripe;
use Illuminate\View\View;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Session;
//use Illuminate\Support\Facades\Log;



class StripePaymentController extends Controller
{
    public function stripe(): View
    {
        return view('user.main.stripe');
    }

    public function stripePost(Request $request): RedirectResponse
    {
       // dd($request);
        try {
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $charge = Stripe\Charge::create ([
                    "amount" => $request->price * 100,
                    "currency" => "usd",
                    "source" => $request->stripeToken,
                    "description" => "Parking Payment"
            ]);
           // dd($charge->amount/100);

            if ($charge->status === 'succeeded') {
                // $orderName = session('location');
                $orderName = $request->location;
                $orderDate = session('start');
                $timestamp = strtotime($orderDate);
                $checkintime = date("Y-m-d H:i", $timestamp);

               // $orderPrice = $charge->amount/100;
               $orderPrice=$request->price;
                $deliveryDate = session('end');
                $timestamp2 = strtotime($deliveryDate);
                $checkout_time = date("Y-m-d H:i", $timestamp2);
                $recipt_payment = $charge->receipt_url;
                // $randomId = uniqid();
                // $randomId = uniqid('ABC', true); // Adding a prefix to the ID
                $prefix = 'ABC';
              $randomNumber = mt_rand(100000, 999999); // Generate a random 6-digit number
             $randomId = $prefix . $randomNumber;

                $dataToInsert = [
                    'order_name' => $orderName,
                    'order_id' => $randomId,
                    'order_date' => $checkintime,
                    'order_price' => $orderPrice,
                    'delivary_date'=>$checkout_time,
                    'invoice'=>$recipt_payment,
                    'user_id'=>Auth::user()->id,
                    'owner_id'=>$request->owner_id,
                    'parking_id'=>$request->parking_id,
                    'admin_commision'=>$request->commission,
                ];
                DB::table('recent_order')->insert($dataToInsert);
                Session::put([
                    'reting_order_id'=>$dataToInsert['order_id'],
                 ]);
                $request->session()->forget('location');
                $request->session()->forget('start');
                $request->session()->forget('end');
                return redirect('payment')->with('msg','Your Payment SuccessFully');
            } else {

                dd('failed');
                return back()->with('error', 'Payment failed. Please try again.');
            }
        } catch (Stripe\Exception\CardException $e) {
            return back()->with('error', $e->getMessage());
        }
  }




}
