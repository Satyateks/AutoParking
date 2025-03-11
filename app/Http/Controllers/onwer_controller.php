<?php

namespace App\Http\Controllers;

use App\Mail\EmailVerification;
use App\Models\kyc;
use App\Models\Owner;
use App\Models\Parkspace;
use App\Models\Payout;
use App\Models\recent_order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\Guard;
use App\Models\CMS;
use App\Models\Up_images;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Models\Product;
use App\Models\Product_image;
use App\Models\User;
use App\Models\About;
use App\Models\Service;
use App\Models\Brand;
use App\Models\Footer;
use App\Models\Category;
use App\Models\Gerenal_Setting;
use App\Models\Contacts;
use App\Models\Headings;
use App\Models\Master_price;
use App\Models\Product_Price;
use App\Models\Product_Order;
use DateTime;
use DataTables;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\File\Exception\ExtensionFileException;
use App\Models\UpImages;
use App\Mail\EmailVerification1;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;


use Illuminate\Support\Facades\Http;

class onwer_controller extends Controller
{

    public function space_onwer(){
        $data['about']=DB::table('cms')->where('type','about')->first();
           $data['banner1']=DB::table('cms')->where('type','banner1')->first();
           $data['banner']=DB::table('cms')->where('type','banner')->first();
           $data['Industries']=DB::table('cms')->where('type','Industries')->first();
           $data['all']=DB::table('listing')->first();
        //    $data['kyc']=DB::table('kyc')->where('owner_user_id',Auth::guard('owner')->user()->owner_user_id)->first();
        //    dd($data['kyc']->owner_user_id);
        return view('owner.main.space_onwer',$data);
    }
    public function owner_login(){
        return view('owner.main.owner_login');
    }

    public function onwer_registration(){
        return view('owner.main.owner_registration');
    }


      public function owner_otp(){
        return view('owner.main.owner_otp');
       }

       public function onwer_register_otp(Request $request)
{
    $data = $request->validate([
        'name' => 'required',
        'email' => 'required|email:users',
        'phone' => 'required|max:12|min:10',
        'password' => 'required|min:6'
    ]);
    $existingUser = DB::table('owner_user')->where('email', $request->email)->first();
    if ($existingUser) {
        return redirect('owner_login')->with('msg', 'Your Account already exists');
    } else {
        $otp = rand(1001, 9999);
        Session::put([
            'name' => $request->name,
            'email1' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
            'otp1' => $otp
        ]);
        // Prepare mail data
        $maildata11 = new \stdClass();
        $maildata11->email = $request->email;
        $maildata11->otp = $otp;
        // Send email with OTP
        Mail::to($request->email)->send(new EmailVerification1($maildata11));
        // Redirect user to OTP verification page
        return redirect('owner_otp')->with('msg', 'OTP sent successfully. Check your email.');
    }
}



public function owner_resend_otp(Request $request)
{
    $otp = rand(1001, 9999);
    Session::put('otp1', $otp);
    $mailData11 = new \stdClass();
    $mailData11->email = Session('email1');
    $mailData11->otp = $otp;
    Mail::to(Session('email1'))->send(new EmailVerification1($mailData11));
    return redirect('owner_otp')->with('msg', 'OTP resent successfully. Check your email.');
}




       public function onwer_otp_varification_page(Request $request)
    {
        if ($request->isMethod('post')) {
          //  dd(Session('otp1'));
            $value = Session('otp1');
            //dd($request->owner_otp);
           // dd($value);
            if ($request->owner_otp == $value) {
                Owner::create([
                    'name' => Session('name'),
                    'email' => Session('email1'),
                    'phone' =>Session('phone'),
                    'password' => bcrypt(Session('password')),
                    'type' => 'owner',
                ]);
                $request->session()->forget(['name','email','phone','password','otp']);
                return redirect('owner_login')->with('msg', 'You are successfully registered. Thank you.');
            } else {
                return redirect()->back()->with('msg', 'Incorrect OTP. Please try again.');
            }
        } else {
            return view('owner.owner_otp');
        }
    }


        public function onwer_login_post(Request $request){
         //dd($request);
            $data=$request->only(['email','password']);
            $dataa=DB::table('owner_user')->where('email',$request->email)->first();
            //dd($dataa);

            if(!$dataa){
                return redirect()->back()->with('msg','Your account does not exits , Signup first');
            }else{


                    if(Auth::guard('owner')->attempt($data)){
                        // dd(Auth::guard('owner')->user()->is_verify);
                        if(Auth::guard('owner')->user()->is_verify == 1){
                        //dd(Auth::guard('owner')->user());
                        return redirect()->back()->with('msg','Your account is block, Please contact admin');
                    }else{
                        return redirect('events')->with('msg','successfully login');
                      }
                      }else{
                        return redirect('owner_login')->with('msg','enter your correct password and email');
                      }



            }
              }




        public function owner_logout(Request $request){
            Auth::guard('owner')->logout();
            return redirect('space_owner')->with('msg','Logout succsessfully');
        }




        public function onwer_profile(Request $request){

            if($request->isMethod('post')){
               // dd($request);
                if($request->dob!= ''){
                    $date = date("Y-m-d", strtotime($request->dob) );
                    $data1=$request->name;
                    $data2=$request->phone;
                   DB::table('owner_user')->where('id',Auth()->guard('owner')->user()->id)->update(['dob'=>$date ,'name'=>$data1, 'phone'=>$data2]);
                  }else{
                     DB::table('owner_user')->where('id',Auth()->guard('owner')->user()->id)->update([
                         'name'=>$request->name,
                         'phone'=>$request->phone,
                     ]);

                    }

            }else{
                $data=DB::table('owner_user')->where('id', Auth()->guard('owner')->user()->id)->first();
                return view('owner.head.owner_profile',['data'=>$data]);
            }
            return redirect()->back();

        }



        public function onwer_forgot_pass(){
            return view('owner.main.owner_forgot_pass');
        }


      public function onwer_password_update_posts(Request $request){
            $request->validate([
                'email'=>'required|email|exists:users'
            ]);
            $token=Str::random(64);
              DB::table('password_reset_tokens')->insert([
                'email'=>$request->email,
                'token'=>$token,
                'created_at'=>Carbon::now()
             ]);
               Mail::send("Email.owner_send",['token' => $token], function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('Reset Password');
            });

           return redirect('owner_login')->with('msg','Reset link send successfully on your email');

        }

        public function onwer_password_update($token){
            return view('owner.main.owner_password_update',compact('token'));
        }
       public function owner_forgot_pass_post(Request $request){
       // dd($request->token,$request->email);
       $updatePassword = DB::table('password_reset_tokens')->where("email",$request->email)->where('token',$request->token)->exists();
          if( $updatePassword ){
           // dd('hello');
                DB::table('owner_user')->where('email',$request->email)->update([
                    'password'=>Hash::make($request->password)
                ]);
                DB::table('password_reset_tokens')->where(["email"=>$request->email])->delete();
                return redirect()->back()->with('msg','Password update successfully');
            }
         }

//contact us form


public function owner_contact(){
    return view('owner.head.owner_contact');
 }

 public function owner_contact_post(Request $request)
 {
     try {
         // Validate the incoming request data
         $data = $request->validate([
             'name'  => 'required',
             'email' => 'required',
             'phone' => 'required',
         ]);

         // Validation passed, insert into the database
         DB::table('owner_contact')->insert([
             'name'    => $data['name'],
             'email'   => $data['email'],
             'phone'   => $data['phone'],
             'space'   => $request->space,
             'message' => $request->message,
         ]);

         return redirect()->back()->with('msg', 'Contact form submitted successfully');
     } catch (ValidationException $exception) {
         // Validation failed, redirect back with errors
         return redirect()->back()->withErrors($exception->errors())->withInput()->with('msg','Fill all requird field');
     }
}


public function owner_about(){
    return view('owner.head.about');
}

public function owner_how_to_works(){
    return view('owner.head.owner_how_to_works');
}


public function owner_tems_condition(){
    return view('user.foot.tems_condition');
}

public function owner_privacy_policy(){
    return view('user.foot.privacy_policy');
}

public function ownewr_refund_policy(){
    return view('user.foot.refund_policy');
}

public function owner_blog(){
    return view('user.foot.blog');
}

public function owner_career(){
    return view('user.foot.career');
}

public function owner_media(){
    return view('user.foot.media');
}

//kyc


// public function kyc_data(){
//     $data=DB::table('kyc')->where('owner_user_id',Auth::guard('owner')->user()->id)->first();
//     $country=DB::table('countries')->where('id',$data->country)->first();
//     return view('owner.main.kyc_data',['data'=>$data,'country'=>$country]);
// }

public function kyc_data(){
    $data = DB::table('kyc')->where('owner_user_id', Auth::guard('owner')->user()->id)->first();

    // Check if $data is null
    if ($data) {
        $country = DB::table('countries')->where('id', $data->country)->first();
        return view('owner.main.kyc_data', ['data' => $data, 'country' => $country]);
    } else {

        return redirect('owner_kyc')->with('error', 'KYC data not found for this user.');
    }
}


public function owner_kyc(){

  //$country=DB::table('country')->where('type','country')->get();
  $state=DB::table('states')->where('type','state')->get();
  $countries = DB::table('tbl_countries')->get();
  $data=DB::table('kyc')->where('owner_user_id', Auth::guard('owner')->user()->id)->first();
    return view('owner.main.owner_kyc', compact('state','data','countries'));

}



public function kyc_post(Request $request)
{
    try {
        // dd(Auth::guard('owner')->user()->id);
        $value1 = add_icon3($request);
        $value2 = add_icon91($request);

        DB::table('kyc')->insert([
            'fname' => $request->value1,
            'address' => $request->value2,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'adhar_front' => $value1,
            'adhar_back' => $value2,
            'owner_user_id' => Auth::guard('owner')->user()->id,
            'unique_id' => $request->sharedFieldConfirm
        ]);

        return redirect('space_owner')->with('msg', 'Your KYC is pending. Please wait for approval.');
    } catch (QueryException $e) {
        if ($e->errorInfo[1] == 1062) {
            // This is a duplicate key violation error
            return redirect()->back()->with('error', 'Duplicate entry found. Please check your Goverment id and try again.');
        }
        // Handle other database errors as needed
        return redirect('rent_space')->with('msg', 'An error occurred while processing your request. Please try again later.');
    } catch (\Exception $e) {
        // Handle other exceptions
        return redirect('rent_space')->with('msg', 'An unexpected error occurred. Please try again later.');
    }
}




public function approve(Request $request, $id)
{


//    $id = intval($id); // Ensure $id is an integer
    kyc::where("id", $id)->update([
        'is_verify'=>1,
    ]);
    return redirect()->back()->with('msg','Updated successfully');

}

public function reject(Request $request, $id)
{


   // $id = intval($id); // Ensure $id is an integer
    kyc::where("id",$id)->update([
        'is_verify'=> 2,
    ]);

    return redirect()->back()->with('msg','Updated successfully');
}


//owner rent space
public function rent_space(){
   // $data=DB::table('country')->get();
    $hello=DB::table('countries')->get();
    $all=DB::table('space_type')->get();
    $countries = DB::table('tbl_countries')->get();
    return view('owner.main.rent_space',compact('all','hello','countries'));
}

public function bank_details(){
     $data=DB::table('bank_details')->where('owner_id',Auth()->guard('owner')->user()->id)->first();
    return view('owner.foot.bank_details',['data'=>$data]);
  // return Auth()->guard('owner')->user()->id;
}

public function bank_details_post(Request $request){
    //dd($request);
    if(DB::table('bank_details')->where('owner_id',Auth()->guard('owner')->user()->id)->exists()){
      DB::table('bank_details')
          ->where('owner_id', Auth()->guard('owner')->user()->id)
          ->update([
        'name'=>$request->name,
        'bank_name'=>$request->bank_name,
        'account'=>$request->account,
        'branch'=>$request->branch,
        'ifsc'=>$request->ifsc,
        'mobile'=>$request->mobile,
        'owner_id'=>Auth()->guard('owner')->user()->id
    ]);
    return redirect()->back()->with('msg','Updated Successfully');
}else{
    DB::table('bank_details')
          ->where('owner_id', Auth()->guard('owner')->user()->id)
          ->insert([
        'name'=>$request->name,
        'bank_name'=>$request->bank_name,
        'account'=>$request->account,
        'branch'=>$request->branch,
        'ifsc'=>$request->ifsc,
        'mobile'=>$request->mobile,
        'owner_id'=>Auth()->guard('owner')->user()->id
    ]);
   return redirect()->back()->with('msg','Added successfully');
}
}


public function rent_space_post(Request $request){
//dd($request);
    $owner = Auth::guard('owner')->user();
    $value1 = add_icon4($request);
    DB::table('parking_space')->insert([
        'zip_code' => $request->zip_code,
        'type_of_space' => $request->type_of_space,
        'country' => $request->country,
        'state' => $request->state,
        'city' => $request->city,
        'address' => $request->address,
        'image' => $value1,
        'description' => $request->description,
        'daily' => $request->daily,
        'weekly' => $request->weekly,
        'monthly' => $request->monthly,
        'hourly' => $request->hour,
        'vehicle_type' => $request->flexRadioDisabled,
        'vahicle_charge' => $request->flexRadioDisabled1,
        'vaicle_share' => $request->flexRadioDisabled2,
        'booking_want' => $request->name,
        'lat' => $request->latitude,
        'lng' => $request->longitude,
        'owner_id' => $owner->id,
    ]);
    return redirect('raushan_details')->with('msg', 'Parking slot uploaded successfully. Wait for approval');
}



public function raushan_details()
{
    if (Auth::guard('owner')->user()) {
        $owner = Owner::find(Auth::guard('owner')->user()->id);
        $data = $owner->parkingSpaces;
       //return $data;
       return view('owner.head.space_owner',['data'=>$data]);
    }
}


public function owner_recent_order()
{
    $userId = Auth::guard('owner')->user()->id;
    $allOrders = DB::table('recent_order')->where('parking_id',$userId)->get();
    //dd($allOrders);
    // $lastOwnerId = DB::table('recent_order')
    // ->where('parking_id', $userId)
    // ->orderBy('created_at', 'desc')
    // ->value('owner_id');

    // dd($lastOwnerId);
    $currentDateTime = Carbon::now();
    $pastOrders = $allOrders->filter(function ($order) use ($currentDateTime) {
        return Carbon::parse($order->delivary_date)->lt($currentDateTime);
    });
    $futureOrders = $allOrders->filter(function ($order) use ($currentDateTime) {
        return Carbon::parse($order->delivary_date)->gte($currentDateTime);
    });
    //    $ddd=DB::table('parking_space')->where('owner_id',$userId)->first();
    return view('owner.head.owner_recent_order', compact('pastOrders', 'futureOrders'));
}




public function events()
{
    if (Auth::guard('owner')->check()) {
        $owner_id = Auth::guard('owner')->user()->id;
        $kyc_record = DB::table('kyc')->where('owner_user_id', $owner_id)->first();
        if ($kyc_record && $kyc_record->owner_user_id == $owner_id ) {
           // dd($kyc_record->is_verify);
            if($kyc_record->is_verify == "1"){
                return redirect('rent_space');
            }else{
                return redirect('kyc_data')->with('msg','Your kyc data is summited successfully wait for approval , Approval send on your email');
            }
        } else {
            return redirect('owner_kyc');
        }
    } else {
        return redirect('owner_login');
    }
}

public function parking_edit(Request $request,$id){
    if($request->isMethod('post')){
//dd($request);
       $value1=add_icon99($request);
       if($value1!=''){
        $data=DB::table('parking_space')->where('id',$id)->update(
            [
            'image'=>$value1,
            'zip_code'=>$request->value1,
            'type_of_space'=>$request->type_of_space,
            'vehicle_type'=>$request->flexRadioDisabled,
            'vahicle_charge'=>$request->flexRadioDisabled1,
            'vaicle_share'=>$request->flexRadioDisabled2,
            'booking_want'=>$request->name,
            'country'=>$request->country,
            'address'=>$request->address,
            'hourly'=>$request->hour,
            'daily'=>$request->daily,
            'weekly'=>$request->weekly,
            'monthly'=>$request->monthly,
            'description'=>$request->description,
            'lat'=>$request->lat,
            'lng'=>$request->lng,
            'state'=>$request->state,
            'city'=>$request->city,
            ]
           );
           return redirect()->back();
       }else{

        $id=DB::table('parking_space')->where('id',$id)->update(
            [
            'zip_code'=>$request->value1,
            'type_of_space'=>$request->type_of_space,
            'vehicle_type'=>$request->flexRadioDisabled,
            'vahicle_charge'=>$request->flexRadioDisabled1,
            'vaicle_share'=>$request->flexRadioDisabled2,
            'booking_want'=>$request->name,
            'country'=>$request->country,
            'address'=>$request->address,
            'hourly'=>$request->hour,
            'daily'=>$request->daily,
            'weekly'=>$request->weekly,
            'monthly'=>$request->monthly,
            'description'=>$request->description,
            'lat'=>$request->lat,
            'lng'=>$request->lng,
            'state'=>$request->state,
            'city'=>$request->city,
            ]
           );
           return redirect()->back();
       }
    }else{
//         $id=DB::table('parking_space')->where('owner_id',Auth::guard('owner')->user()->id)->where('id',$id)->first();
//        $data=DB::table('parking_space')->where('id', $id)->first();
//         $state=DB::table('states')->where('country_id','=',$id->country)->get();
//        $all=DB::table('space_type')->get();
//     $hello=DB::table('countries')->get();
//     $all=DB::table('space_type')->get();
//   $state=DB::table('states')->where('country_id','=',$id->country)->get();
//   $countries = DB::table('tbl_countries')->get();
$all=DB::table('space_type')->get();
$data=DB::table('parking_space')->where('id', $id)->first();
$state=DB::table('states')->where('country_id','=',$data->country)->get();
$hello=DB::table('countries')->get();
$all=DB::table('space_type')->get();
$id=DB::table('parking_space')->where('id',$id)->first();
$countries = DB::table('tbl_countries')->get();
// $page='total_paking';
        // return view('owner.head.parking_edit',compact("countries",'all','hello','id','data','state'));

   return view('owner.head.parking_edit', compact('countries','all','hello','id','state','data'));
    }
}


// public function owner_payout(){
//     $payouts = DB::table('payouts')->where('owner_id', Auth::guard('owner')->user()->id)->get();
//     return view('owner.head.owner_payouts',compact('payouts'));
// }


// public function gen_payouts(){
//     $currentDate = now();
// $currentDay = date("d");
// if($currentDay > 15){
// $startDate = $currentDate->copy()->day(16);
// $endDate = $currentDate->copy()->endOfMonth();
// }
// else{
// $startDate = $currentDate->copy()->startOfMonth();
// $endDate = $currentDate->copy()->day(15);
// }

//     // Fetch bookings within the current week
//     $bookings = DB::table('recent_order')->where('status','=','booked')->whereBetween('order_date', [$startDate, $endDate])
//         ->get();

//     // Group bookings by user_id
//     if(count($bookings)>0){
//         $groupedBookings = $bookings->groupBy('parking_id');

//         // Calculate total amount for each user
//         foreach ($groupedBookings as $userId => $userBookings) {
//             $totalPaid = $userBookings->sum('order_price');
//             $totalFee = $userBookings->sum('admin_commision');
//             $totalAmount = $totalPaid - $totalFee;
//             $payout = DB::table('recent_order')->where('parking_id','=',$userId)->where('order_date','=',$startDate)->where('delivary_date','=',$endDate)->first();
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


// public function owner_payout(){
//     $user = Auth::guard('owner')->user();
//     if($user->type == 'owner'){
//         $this->gen_payouts();
//         $payouts = DB::table('payouts')->where('owner_id',Auth::guard('owner')->user()->id)->get();
//       //  dd($payouts);
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
//         return view('owner.head.owner_payouts',compact('payouts'));
//     } else {
//         return redirect('owner_login');
//     }
// }


public function owner_payout()
{
    $ownerId = Auth::guard('owner')->user()->id;
    $payouts = Payout::where('owner_id','=',$ownerId)->get();
    return view('owner.head.owner_payouts',compact('payouts'));
}


    public function getLocation(Request $request)
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        $apiKey = env('GOOGLE_MAPS_API_KEY');

        // Send request to Google Maps Geocoding API
        $response = Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
            'latlng' => "$latitude,$longitude",
            'key' => $apiKey,
        ]);

        // Parse the response
        $data = json_decode($response, true);

        // Extract required information
        $locationInfo = [];
        if ($data['status'] === 'OK') {
            foreach ($data['results'][0]['address_components'] as $component) {
                if (in_array('locality', $component['types'])) {
                    $locationInfo['city'] = $component['long_name'];
                } elseif (in_array('administrative_area_level_1', $component['types'])) {
                    $locationInfo['state'] = $component['long_name'];
                } elseif (in_array('administrative_area_level_3', $component['types'])) {
                    $locationInfo['district'] = $component['long_name'];
                } elseif (in_array('country', $component['types'])) {
                    $locationInfo['country'] = $component['long_name'];
                }
            }
            $locationInfo['address'] = $data['results'][0]['formatted_address'];
        }

        return response()->json($locationInfo);
    }



 }




