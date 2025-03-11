<?php

namespace App\Http\Controllers;

use App\Mail\EmailVerification;
use App\Models\AdminCommission;
use App\Models\Contact;
use App\Models\Parkspace;
use App\Models\User_order;
use Carbon\Traits\Difference;
use DateTimeZone;
use Exception;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
//use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\recent_order;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;

// use Illuminate\Support\Facades\DB;
// use Carbon\Carbon;

class user_controller extends Controller
{

    public function user_login(){
        return view('user.main.user_login');
    }
    public function user_registration(){
        return view('user.main.user_registration');
    }
      public function otp(){
        return view('user.main.otp');
       }



public function user_register_otp(Request $request)
{
    $data = $request->validate([
        'name' => 'required',
        'email' => 'required|email:users',
        'phone' => 'required|max:12|min:10',
        'password' => 'required|min:6'
    ]);
    $existingUser = DB::table('users')->where('email', $request->email)->first();
    if ($existingUser) {
        return redirect('user_login')->with('msg', 'Your Account already exists');
    } else {
        $otp = rand(1001, 9999);
        // Store only necessary data in the session
        Session::put([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
            'otp' => $otp
        ]);

        $mailData = new \stdClass();
        $mailData->email = $request->email;
        $mailData->otp = $otp;
        Mail::to($request->email)->send(new EmailVerification($mailData));
        return redirect('otp')->with('msg', 'OTP sent successfully. Check your email.');
    }
}


public function resend_otp(Request $request)
{

    $userData = Session::get('user');
    $otp = rand(1001, 9999);
    Session::put('otp', $otp);
    $mailData = new \stdClass();
   // $mailData->email = $userData['email'];
    $mailData->email = Session('email');
    $mailData->otp = $otp;
   // dd($userData['email']);
    Mail::to(Session('email'))->send(new EmailVerification($mailData));
    return redirect('otp')->with('msg', 'OTP resent successfully. Check your email.');
}

    public function otp_varification_page(Request $request)
{
    if ($request->isMethod('post')) {
        $value = session('otp');
        if ($request->otp == $value) {
            //$user = session('user');
           // dd($user);
            User::create([
                'name' => Session('name'),
                'email' => Session('email'),
                'phone' => Session('phone'),
                'password' => bcrypt(Session('password')),
                'type' => 'user',
            ]);

            // Clear session data after successful registration
            $request->session()->forget(['name', 'otp','email','phone','password']);
            return redirect('user_login')->with('msg', 'You are successfully registered. Thank you.');
        } else {
            return redirect()->back()->with('msg', 'Incorrect OTP. Please try again.');
        }
    } else {
        return view('user.otp');
    }
}

        public function user_login_post(Request $request){
            //dd($request);
            $data=$request->only(['email','password']);
            $dataa=DB::table('users')->where('email',$request->input('email'))->first();
            if(!$dataa){
                   //return redirect('user_registration')->with('msg' ,'Your accouont does not exits');
                   return redirect()->back()->with('msg','Your account does not exits signup first');
            }else{
                if(Auth::attempt($data)){
                    if(Auth::user()->type == "admin" ){
                        Auth::logout();
                        return redirect('user_login')->with('msg',"'You'r not a authenticated person" );
                    }
                    if(Auth::user()->isActive == 1 ){
                        Auth::logout();
                        return redirect('user_login')->with('msg',"Admin block your account please contact to admin" );
                    }
                    return redirect('listing')->with('msg','Successfully login');
                  }else{
                    return redirect('user_login')->with('msg','Enter your correct password and email');
                  }
            }

        }
        public function user_logout(Request $request){
            Auth::Logout();
            return redirect('index')->with('msg','Logout succsessfully');
        }
        public function user_profile(Request $request){
            if($request->isMethod('post')){
                //dd($request);

                    if($request->dob  != ''){
                       $date = date("Y-m-d", strtotime($request->dob) );
                       $data1=$request->name;
                       $data2=$request->phone;
                       $data3=$request->vehicle;
                      DB::table('users')->where('id',Auth::user()->id)->update(['dob'=>$date,'name'=>$data1,'phone'=>$data2,'vehicle'=>$data3 ]);
                     }else{
                        User::where('id',Auth::user()->id)->update([
                            'name'=>$request->input('name'),
                            'phone'=>$request->input('phone'),
                            'vehicle'=>$request->input('vehicle')]);
                     }

            }else{
                $data=DB::table('users')->where('id', Auth::user()->id)->first();
                return view('user.head.user_profile',['data'=>$data]);
            }
            return redirect()->back();
          }
          public function get_states(Request $request)
          {
              $country = $request['country'];
              $states = DB::table('states')->where('country_id','=',$country)->orderBy('name')->get();
              ?>
              <option value="">Select State</option>
              <?php
              foreach($states as $state){
                  ?>
                  <option value="<?php echo $state->name; ?>"><?php echo $state->name; ?></option>
                  <?php
              }
          }

        public function forgot_pass(){
            return view('user.main.forgot_pass');
        }


      public function password_update_posts(Request $request){

           $data= $request->validate([
                'email'=>'required|email|exists:users'
            ]);

            if($data){
            $token=Str::random(64);
              DB::table('password_reset_tokens')->insert([
                'email'=>$request->email,
                'token'=>$token,
                'created_at'=>Carbon::now()
             ]);
               Mail::send("Email.user_send",['token' => $token], function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('Reset Password');
            });

           return redirect('owner_login')->with('msg','Reset link send successfully on your email');

        }else{
            return redirect('owner_login')->with('msg','Your email does not exits');
        }

        }





        public function password_update($token){
            return view('user.main.password_update',compact('token'));
        }
       public function forgot_pass_post(Request $request){
       // dd($request->token,$request->email);
       $updatePassword = DB::table('password_reset_tokens')->where("email",$request->email)->where('token',$request->token)->exists();
          if( $updatePassword ){
                DB::table('users')->where('email',$request->email)->update([
                    'password'=>Hash::make($request->password)
                ]);
                //dd('hello');
                DB::table('password_reset_tokens')->where(["email"=>$request->email])->delete();
                return redirect()->back()->with('msg','Success');
            }
            return redirect('owner_login');
         }









         public function contact(){
            return view('user.head.contact');
         }

         public function contact_post(Request $request)
         {
             try {
                 // Validate the incoming request data
                 $data = $request->validate([
                     'name'  => 'required',
                     'email' => 'required',
                     'phone' => 'required',
                 ]);

                 // Validation passed, insert into the database
                 DB::table('contacts')->insert([
                     'name'    => $data['name'],
                     'email'   => $data['email'],
                     'phone'   => $data['phone'],
                     'space'   => $request->space,
                     'message' => $request->message,
                 ]);

                 return redirect()->back()->with('msg', 'Message Send Successfully!');
             } catch (ValidationException $exception) {
                 return redirect()->back()->withErrors($exception->errors())->withInput()->with('msg','Fill all requird field');
             }
          }


 public function user_about(){
    $data['about']=DB::table('user_cms_head')->where('type','about')->first();
    return view('user.head.about',$data);
     }


public function how_to_works(){
    $data['how_it_work']=DB::table('user_cms_head')->where('type','how_it_work')->first();
    return view('user.head.how_to_works',$data);
      }


public function tems_condition(){
    $data['terms']=DB::table('user_cms_head')->where('type','v1')->first();
   return view('user.foot.tems_condition',$data);
     }

public function privacy_policy(){
    $data['privacy']=DB::table('user_cms_head')->where('type','v3')->first();

    return view('user.foot.privacy_policy',$data);
       }

public function refund_policy(){
    $data['refund']=DB::table('user_cms_head')->where('type','v2')->first();
    return view('user.foot.refund_policy',$data);
     }

public function blog(){
    $data['blog']=DB::table('user_cms_head')->where('type','v4')->first();
 return view('user.foot.blog',$data);
      }

public function career(){
    $data['career']=DB::table('user_cms_head')->where('type','v5')->first();

    return view('user.foot.career',$data);
     }

public function media(){
    $data['media']=DB::table('user_cms_head')->where('type','v6')->first();
return view('user.foot.media',$data);
   }



// public function listing(Request $requset){
//      //dd($requset);
//     $location = session('location');
//     $ev_able= session('ev_able');
//     $data = DB::table('parking_space')
//             ->where('address', 'like', '%' . $location . '%')
//             ->where('ev_able',"=",$ev_able)->where('is_verify',1)
//             ->get();
//             //dd($data);
//     $locations = [];
//     foreach ($data as $index => $location) {
//         $locations[] = [$index, $location->lat, $location->lng];
//     }

//     $parkingIds = $data->pluck('id')->toArray();

//    return view('user.main.listing', ['data' => $data,'locations' => $locations]);
//     }


public function listing(Request $request)
{
    $location = session('location');
    $ev_able = session('ev_able');

    $state = $request->input('state');
    $city = $request->input('city');
    $country = $request->input('country');

    $query = DB::table('parking_space')
        ->where('is_verify', 1);

    if ($location) {
        $query->where('address', 'like', '%' . $location . '%');
        $query->orWhere('state', 'like', '%' . $location . '%');
        $query->orWhere('city', 'like', '%' . $location . '%');
        $query->orWhere('country', 'like', '%' . $location . '%');
    }

    if ($ev_able != 0) {
        $query->where('vahicle_charge', $ev_able);
    }

    $data = $query->get();

    $locations = [];
    foreach ($data as $index => $location) {
        $locations[] = [$location->address, $location->lat, $location->lng, $location->id];
    }

    return view('user.main.listing', ['data' => $data, 'locations' => $locations]);
}



    // public function listing(Request $request)
    // {
    //     $location = session('location');
    //     $ev_able = session('ev_able');
    //     if(session('ev_able') == 1){
    //         $data = DB::table('parking_space')
    //         ->where('address','state','city', 'like', '%' . $location . '%')
    //         ->where('vahicle_charge', $ev_able)
    //        ->where('is_verify', 1)
    //         ->get();
    //     $locations = [];
    //     foreach ($data as $index => $location) {
    //         $locations[] = [$location->address, $location->lat, $location->lng,$location->id];
    //     }
    //     }elseif(session('ev_able')==0){
    //         $data = DB::table('parking_space')
    //         ->where('address', 'like', '%' . $location . '%')
    //        ->where('vahicle_charge', $ev_able)
    //        ->where('is_verify', 1)
    //         ->get();
    //     $locations = [];
    //     foreach ($data as $index => $location) {
    //         $locations[] = [$location->address, $location->lat, $location->lng,$location->id];
    //     }
    //     }
    //    return view('user.main.listing', [ 'data' => $data,'locations' => $locations]);
    // }




// public function listing(Request $request) {
//     $location = session('location');
//     $ev_able = session('ev_able');
//     $data = DB::table('parking_space')
//             ->where('address', 'like', '%' . $location . '%')
//             ->where('ev_able', '=', $ev_able)
//             ->where('is_verify', 1)
//             ->get();

//     $locations = [];
//     foreach ($data as $location) {
//         $locations[] = [$location->info, $location->lat, $location->lng, $location->id]; // Assuming 'info', 'lat', 'lng', and 'id' are fields in your table
//     }

//     return view('user.main.listing', ['data' => $data, 'locations' => $locations]);
// }


// public function listing(Request $request) {
//     $location = session('location');
//     $ev_able = session('ev_able');
//     $data = DB::table('parking_space')
//             ->select('id', 'lat', 'lng') // Include 'info' along with other necessary fields
//             ->where('address', 'like', '%' . $location . '%')
//             ->where('ev_able', '=', $ev_able)
//             ->where('is_verify', 1)
//             ->get();

//     $locations = [];
//     foreach ($data as $location) {
//         $locations[] = [ $location->lat, $location->lng, $location->id]; // Assuming 'info', 'lat', 'lng', and 'id' are fields in your table
//     }

//     return view('user.main.listing', ['data' => $data, 'locations' => $locations]);
// }



public function space_details($id){
    //$data['media']=DB::table('user_cms_head')->where('type','v6')->first();
    $data=DB::table('parking_space')->where('id',$id)->first();
    // dd($data);
    // $locations = [];
    // foreach ($data as $index => $location) {
    //     $locations[] = [$index, $location->lat, $location->lng];
    // }
    return view('user.main.space_details',['data'=>$data]);
}

public function date_time_post(Request $request){
    try {
        $checkin = Carbon::parse($request->input('start_date') );
        $checkout = Carbon::parse($request->input('end_date') );
      // $diff = $checkin->diffInMinutes($checkout); // Difference in minutes
       $diff = $checkin->diffInHours($checkout);
    //   $diff = $checkin->diffInWeekdays($checkout);
    //   $diff = $checkin->diffInMonths($checkout);
    //   $diff = $checkin->diffInYears($checkout);
        if ($diff > 1/2) { // Checking if difference is less than 30 minutes
            // Store data in session
            $start_date = new \DateTime($request->start_date);
            $end_date = new \DateTime($request->end_date);
            $interval = $end_date->diff($start_date);
            $hours = $interval->h + $interval->days * 24;
            $months = 0;
            $weeks = 0;
            $days = 0;
            if($hours >= 24*30){    
                $months = ceil($hours/(24*30));
            }
            if($hours >= 24*7 && $hours < 24*30){
                $weeks = ceil($hours/(24*7));
            }
            if($hours >= 24 && $hours < 24*7){
                $days = ceil($hours/24);
            }

            Session::put([
                'location'=>$request->input('city'),
                'start' => $request->input('start_date'),
                'end' => $request->input('end_date'),
                'ev_able'=>$request->ev_able,
                'hour'=>$hours,
                'days'=>$days,
                'weeks'=>$weeks,
                'months'=>$months
            ]);
            return redirect('listing');
        } else {
            return redirect()->back()->with('error', 'You want to select time more than 30 minutes');
        }

        
    } catch (Exception $e) {
        return redirect('index')->with('msg', 'Please enter date, time, and location');
    }
}


// public function date_time_post(Request $request){
//     try {
//         $checkin = Carbon::parse( $request->input('start_date'));
//         $checkout = Carbon::parse($request->input('end_date'));
//         $diff = $checkin->diffInHours($checkout);
//         if(
//         0 > $diff
//            ){
//             session::put([
//                 'location' => $request->location
//             ]);
//     $start_date = new \DateTime($request->start_date);
//     $end_date = new \DateTime($request->end_date);
//     $interval = $end_date->diff($start_date);
//     $hours = $interval->h + $interval->days * 24;
//             Session::put([
//                 'location'=>$request->input('location'),
//                 'start' => $request->input('start_date'),
//                 'end' => $request->input('end_date'),
//                 'ev_able'=>$request->ev_able,
//                 'hour'=>$hours
//               ]);
//             return redirect('listing');
//            }else{
//             return redirect()->back()->with('error','You want to select time more than 30 min');
//            }

//     } catch (Exception $e) {
//         return redirect('index')->with('msg', 'Please enter date, time, and location');
//     }
// }



public function payment(){
    // $data=DB::table('parking_space')->where('id',$id)->first();
    return view('user.main.payment');

}


public function recent_order(){
    if(Auth::user()){
    $data=DB::table('recent_order')->where('user_id',Auth::user()->id)->latest()->get();
    return view('user.head.user_recente_order',['data'=>$data]);
   }
}


public function master_post(Request $request){
   // dd(session::all());
   $orderName = session('location');
    $orderDate = session('start_date');
    $orderPrice = session('price');
    $deliveryDate = session('end_date');
    if (!$orderName || !$orderDate || !$orderPrice || !$deliveryDate) {
        // Redirect back with an error message or handle it as appropriate for your application
        return redirect()->back()->with('error', 'Missing required session data');
    }
    $randomId = uniqid();
    $dataToInsert = [
        'order_name' => $orderName,
        'order_id' => $randomId,
        'order_date' => $orderDate,
        'order_price' => $orderPrice,
        'delivary_date'=>$deliveryDate,
    ];
    DB::table('recent_order')->insert($dataToInsert);
    $request->session()->forget('location');
    $request->session()->forget('start');
    $request->session()->forget('end');
   return redirect('payment')->with('success', 'payment successfully!');
}

public function search(Request $request)
    {
        if($request->input('flexRadioDefault')==0){
            $keyword = $request->input('keyword');
            $results = DB::table('parking_space')->where('address', 'like', "%$keyword%")->take(2)->get();
            return response()->json($results);
        }else{

            $keyword = $request->input('keyword');
            $results = DB::table('parking_space')->where('ev_able',$request->input('flexRadioDefault'))->where('address', 'like', "%$keyword%")->take(2)->get();
            return response()->json($results);

        }
    }

    public function vahicle_number_add111(Request $request){

        DB::table('users')->where('id',Auth::user()->id)->update([
                'vehicle'=>$request->vehicle
        ]);
return redirect()->back();
    }

    public function user_payment(Request $request, $id){
        if($request->isMethod('post')){
          return redirect('ratting_dynamic/'.$id);
        }else{
            $vahicle=DB::table('vehiclenumber')->where('user_id',Auth::user()->id)->first();
            $data=DB::table('parking_space')->where('id',$id)->first();
            $commission = AdminCommission::where('id',1)->first();
           return view('user.main.user_payment',['data'=>$data,'commission'=>$commission,'vahicle'=>$vahicle]);
        }
    }






    public function reserveParking(Request $request, $id) {
        //dd($request);
        // Check if the parking spot exists
        $parkingSpot = DB::table('parking_space')->where('id', $id)->first();

        if (!$parkingSpot) {
            return redirect()->back()->with('error', 'Selected parking spot does not exist.');
        }

        // Check if the session start and end times are set
        if (!$request->session()->has('start') || !$request->session()->has('end')) {
            return redirect()->back()->with('error', 'Please select start and end times for the parking reservation.');
        }

        $startTime = $request->session()->get('start');
        $endTime = $request->session()->get('end');

        // Check if the time slot is available for the current parking spot
        if ($this->isTimeSlotAvailable($startTime, $endTime, $id)) {
            // Parking slot is available, proceed with the booking
            // You may want to call the bookParkingSlot method here
            // Assuming you have a method to handle the booking
            // $this->bookParkingSlot($startTime, $endTime, $id);
            return redirect()->route('space_details', ['id' => $id])->with('success', 'Parking spot booked successfully.');
        } else {
            return redirect()->back()->with('error', 'Parking spot not available for the selected time.');
        }
    }

    private function isTimeSlotAvailable($startTime, $endTime, $parkingSpotId) {
        $startTime = Carbon::parse($startTime);
        $endTime = Carbon::parse($endTime);
        $bookings = DB::table('recent_order')
            ->where('owner_id', $parkingSpotId)
            ->get();
        foreach ($bookings as $booking) {
            $bookingStart = Carbon::parse($booking->delivary_date);
            $bookingEnd = Carbon::parse($booking->order_date);

            if (($startTime >= $bookingStart && $startTime < $bookingEnd) || ($endTime > $bookingStart && $endTime <= $bookingEnd) ||
                ($startTime <= $bookingStart && $endTime >= $bookingEnd)) {
                return false;
            }
        }
        return true;
    }




    public function rating_parking_direct(Request $request){
        if($request->isMethod('post')){
            //dd($request);
            DB::table('recent_order')->where('order_id',$request->order_id)->update([
                'rating'=> $request->rating,
                'feedback'=> $request->feedback,
            ]);

            //$data=DB::table('')
          // return redirect('user_recent_order')->with('msg','Booking Rating SuccessFully');
           // return redirect('booking')->with('msg','Booking Rating SuccessFully');
         return redirect('booking')->with('msg','Booking Rating SuccessFully');


        }

    }

    public function submitForm(Request $request)
    {
        // Retrieve input values from the request
        $phoneNumber = $request->input('phoneInput');
        $email = $request->input('emailInput');
        DB::table('summit')->insert([
            'phone' => $phoneNumber,
            'email' => $email

        ]);
        return redirect('index')->with('msg','Your query submit successfully');
    }

    public function query(){
        return view('user.main.query');
    }

    public function fetchContent(Request $request)
    {
        $category = $request->input('category');

        $query = DB::table('contents');

        if ($category !== 'all') {
            $query->where('category', $category);
        }

        $contents = $query->get();

        return response()->json($contents);
    }


//     public function booking()
//     {
//         $userId = Auth::user()->id;

//         // Fetch recent orders
//         $recentOrders = DB::table('recent_order')->where('user_id', $userId)->get();
// //dd($recentOrders);
//         // Separate bookings based on their status
//         $pastBookings = $recentOrders->filter(function ($order) {
//             return $order->status === 'past';
//         });

//         $upcomingBookings = $recentOrders->filter(function ($order) {
//             return $order->status === 'upcoming';
//         });

//         $inProgressBookings = $recentOrders->filter(function ($order) {
//             return $order->status === 'in_progress';
//         });

//         return view('user.main.booking', compact('pastBookings', 'upcomingBookings', 'inProgressBookings'));
//     }

public function bookin41g()
{
    $userId = Auth::user()->id;

    // Fetch all orders
    $allOrders = DB::table('recent_order')->where('user_id', $userId)->get();


    $lastOwnerId = DB::table('recent_order')
    ->where('user_id', $userId)
    ->orderBy('created_at', 'desc')
    ->value('owner_id');

    //dd($lastOwnerId);
    // Get the current date and time
    $currentDateTime = Carbon::now();

    // Separate orders into past and future based on delivery date
    $pastOrders = $allOrders->filter(function ($order) use ($currentDateTime) {
        return Carbon::parse($order->delivary_date)->lt($currentDateTime);
    });

    $futureOrders = $allOrders->filter(function ($order) use ($currentDateTime) {
        return Carbon::parse($order->delivary_date)->gte($currentDateTime);
    });
       $ddd=DB::table('parking_space')->where('id',$lastOwnerId)->first();
    return view('user.main.booking', compact('pastOrders', 'futureOrders','ddd'));
}




public function booking()
{
    $userId = Auth::user()->id;
    $allOrders = DB::table('recent_order')->where('user_id',$userId)->get();

    $currentDateTime = Carbon::now();
    $pastOrders = $allOrders->filter(function ($order) use ($currentDateTime) {
        return Carbon::parse($order->delivary_date)->lt($currentDateTime);
    });
    $futureOrders = $allOrders->filter(function ($order) use ($currentDateTime) {
        return Carbon::parse($order->delivary_date)->gte($currentDateTime);
    });
    //    $ddd=DB::table('parking_space')->where('owner_id',$userId)->first();
    return view('user.main.booking', compact('pastOrders', 'futureOrders','allOrders'));
}







}
