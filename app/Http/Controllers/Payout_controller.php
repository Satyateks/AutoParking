<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Payout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Payout_controller extends Controller
{

  //  public function gen_payouts(){
//         $currentDate = now();
//     $currentDay = date("d");
//    if($currentDay > 15){
//    $startDate = $currentDate->copy()->day(16);
//    $endDate = $currentDate->copy()->endOfMonth();

// }
// else{
// $startDate = $currentDate->copy()->startOfMonth();
// $endDate = $currentDate->copy()->day(15);
// }

// $currentDate = date("Y-m-d");
// $currentDay = date("d");

// if ($currentDay > 15) {
//     $startDate = date("Y-m-16 00:00:00", strtotime($currentDate));
//     $endDate = date("Y-m-t 23:59:59", strtotime($currentDate));
// } else {
//     $startDate = date("Y-m-01 00:00:00", strtotime($currentDate));
//     $endDate = date("Y-m-15 23:59:59", strtotime($currentDate));
// }

//         $bookings = DB::table('recent_order')->where('status','=','booked')->whereBetween('order_date', [$startDate, $endDate])
//             ->get();
//         if(count($bookings)>0){
//             $groupedBookings = $bookings->groupBy('parking_id');
//             foreach ($groupedBookings as $userId => $userBookings) {
//                 $totalPaid = $userBookings->sum('order_price');
//                 $totalFee = $userBookings->sum('admin_commision');
//                 $totalAmount = $totalPaid - $totalFee;
                // $payout = DB::table('recent_order')->where('parking_id','=',$userId)->where('order_date','=',$startDate)->where('delivary_date','=',$endDate)->first();
    //             $payout = DB::table('payouts')->where('owner_id','=',$userId)->where('start_date','=',$startDate)->where('end_date','=',$endDate)->first();
    //             if(!$payout){
    //                 $payout = new Payout();
    //             }
    //             $payout->owner_id = $userId;
    //             $payout->bookings = count($userBookings);
    //             $payout->amount = $totalAmount;
    //             $payout->start_date = $startDate;
    //             $payout->end_date = $endDate;
    //             $payout->status = "Unpaid";
    //             $payout->save();
    //         }
    //     }
    // }

    // public function payouts(){
    //     $user = Auth::user();
    //     if($user->type=='admin'){
    //         $this->gen_payouts();
    //         $payouts = DB::table('payouts')->get();
    //         $page = 'payouts';
    //         return view('admin.payout.payouts',compact('user','payouts','page'));
    //     }
    //     else{
    //         return redirect('admin_login');
    //     }
    // }


    // public function payouts(){
    //     $user = Auth::user();
    //     if($user->type == 'admin'){
    //         $this->gen_payouts();
    //         $payouts = DB::table('payouts')->get();

    //         // Fetching email and name from owner_user table
    //         $payouts->each(function ($payout) {
    //             $owner = Owner::find($payout->owner_id);
    //             if ($owner) {
    //                 $payout->owner_email = $owner->email;
    //                 $payout->owner_name = $owner->name;
    //             } else {
    //                 $payout->owner_email = null;
    //                 $payout->owner_name = null;
    //             }
    //         });

    //         $page = 'payouts';
    //         return view('admin.payout.payouts', compact('user', 'payouts', 'page'));
    //     } else {
    //         return redirect('admin_login');
    //     }
    // }


public function payouts(){
   $payouts= Payout::all();
   $page = 'payouts';
   
   return view('admin.payout.payouts',compact('payouts','page'));

}


    public function payout_status($id = null){
        $user = Auth::user();
        if($user->type=='admin'){
            if($id){
                $payout = Payout::find($id);
                if($payout->status == "Unpaid"){
                    $payout->status = "Paid";
                }
                else{
                    $payout->status = "Unpaid";
                }
                $payout->save();
                return back()->with('update','Updated');
            }
            else{
                return back();
            }
        }
        else{
            return redirect('admin_login');
        }
    }


}
