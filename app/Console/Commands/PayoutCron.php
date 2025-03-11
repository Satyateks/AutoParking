<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Date;
use DB;
use Auth;
use Hash;
use App;
use Mail;
use Session;
use Cookie;
use Validator;
use DateTime;
use App\Models\Payout;
use Carbon\Carbon;
use Illuminate\Http\Request;
class PayoutCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payout:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'generat_payout';


    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        // \Log::info('Payout Cron Started');

       
        $currentDate = date("Y-m-d");
        $currentDay = date("d");
        
        if ($currentDay > 15) {
            $startDate = date("Y-m-16 00:00:00", strtotime($currentDate));
            $endDate = date("Y-m-t 23:59:59", strtotime($currentDate));
        } else {
            $startDate = date("Y-m-01 00:00:00", strtotime($currentDate));
            $endDate = date("Y-m-15 23:59:59", strtotime($currentDate));
        }
        
             $bookings = DB::table('recent_order')->where('status','=','booked')->whereBetween('order_date', [$startDate, $endDate])
                ->get();
            if(count($bookings)>0){
                $groupedBookings = $bookings->groupBy('parking_id');
                foreach ($groupedBookings as $userId => $userBookings) {
                    $totalPaid = $userBookings->sum('order_price');
                    $totalFee = $userBookings->sum('admin_commision');
                    $totalAmount = $totalPaid - $totalFee;
                    $payout = Payout::where('owner_id','=',$userId)->where('start_date','=',$startDate)->where('end_date','=',$endDate)->first();
                    if(!$payout){
                        $payout = new Payout();
                    }
                    $payout->owner_id = $userId;
                    $payout->bookings = count($userBookings);
                    $payout->amount = $totalAmount;
                    $payout->start_date = $startDate;
                    $payout->end_date = $endDate;
                    $payout->status = "Unpaid";
                    $payout->save();
                }
            }
        





    }
}
