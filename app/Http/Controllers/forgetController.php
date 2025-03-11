<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\User;
use App\Models\StaticTable;
use App\Models\NotAllowUser;
use App\Models\Activity_details;
use App\Mail\EmailVerification;
use App\Mail\AdminSendEmailNotAllow;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;
use Hash;
use Auth;

class forgetController extends Controller
{
    //

    public function forgot_password11(){
        return view('user.main.forgot_password');
    }


    public function password_otp(Request $request)
    {
        $email = $request->email;
        $otp = rand(10000,99999);
        $user = User::where('email','=',$email)->first();
        $maildata = new \stdClass();
        $maildata->email = $email;
        $maildata->name = $user->name;
        $maildata->password = "password";
        $maildata->otp = $otp;
        // return view('web.emailtemplate',compact('maildata'));
        Mail::to($email)->send(new EmailVerification($maildata));
            // if (Mail::failures()) {
            //     echo 'Sorry! Please try again latter';
            // }else{
            //     echo 'Great! Successfully send in your mail';
            // }
        $user->email_otp = $otp;
        $user->save();
        echo "success";
    }



    public function verify_password_otp(Request $request)
    {
        $user = User::where('email','=',$request->email)->first();
       // $this->set_timezone();
        if($user){
            // if($request->phone != $request->phone_otp){
            //     return back()->with('phoneerror','wrong otp');
            // }
            if($request->email_otp != $user->email_otp){
                return redirect()->back()->withInput()->with('emailerror','wrong otp');
            }
            else{
                $email = $request->email;
                return redirect()->route('new_password', ['email' => $email]);

            }
        }
        else{
            return back()->with('nouser','no user found');
        }
    }



    public function new_password($email)
    {
        $email = $email;
      //  $this->set_timezone();
        return view('user.main.new_password',compact('email'));
    }


    public function save_password(Request $request)
    {
        $user = User::where('email','=',$request->email)->first();
       // $this->set_timezone();
        if($user){
            $this->validate($request, [
                'password' => 'required|string|min:8|confirmed',
            ]);
            if($user->user_type == "Subscriber"){
                $subscriber = $user;
            }
            else{
                $subscriber = User::find($user->added_by);
            }
            $user->password = Hash::make($request['password']);
            $user->save();
            $activity = new Activities();
            $activity->subscriber_id = $subscriber->id;
            $activity->user_id = $user->id;
            $activity->user_name = $user->name;
            $activity->activity_name = "Password Recovered";
            if($user->user_type == "Subscriber"){
                $activity->activity_detail = "Password Recovered by ".$user->name." at ".$request->local_time;
            }
            else{
                $activity->activity_detail = "Password Recovered by ".$user->name."(".$subscriber->name.") at ".$request->local_time;
            }
            $activity->activity_icon = "user.png";
            $activity->local_time = $request->local_time;
            $activity->save();
            return redirect()->route('user_login')->with('password_changed', 'password changed successfully');
        }
        else{
            return back()->with('nouser','no user found');
        }
    }





    public function send_otp_email(Request $request){
        try{
            if($request->ajax()){

                if(User::where('email', $request->email)->exists()) {
                    $response = [
                        'status'=> 'error',
                        'message' => 'Your Email Already Registered',
                    ];
                    return response()->json($response);
                }else{
                    $data = $request->all();
                    $email_otp = rand(100001,999999);
                    Session::put([
                        'email' => $request->email,
                        'user_data' => $data,
                        'email_otp'=>$email_otp,
                    ]);
                    $maildata = new \stdClass();
                    $maildata->email = $request->email;
                    $maildata->otp = $email_otp;
                    if(filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
                    Mail::to($request->email)->send(new EmailVerification($maildata));
                    }
                    $response = [
                        'status'=> 'success',
                        'message' => 'Your OTP Send To Your Email',
                    ];
                    return response()->json($response);
                }
            }
        }catch(\Exception $e){
            Exception_Db::create([
                'user_id'=> Auth::user()->id ?? '0',
                'exception_details'=> $e->getMessage(),
                'comment'=> "OTP Send In Email",
            ]);
        }
    }
    // Phone OTP Send
    public function send_otp_phone(Request $request){
        if($request->ajax()){
            $this->validate($request, [
                'phone' => 'required|digits:10',
            ]);
            if(User::where('phone_number', $request->phone)->exists()){
                $response = [
                    'status'=> 'error',
                    'message' => 'This Phone Number already exists',
                ];
                return response()->json($response);
            }else{
                    $phoneNumber = $request->phone;
                        $client = new \GuzzleHttp\Client();
                            $response = $client->request('POST', 'https://control.msg91.com/api/v5/otp?template_id=64590975d6fc053bd051aa02&mobile=91'.$phoneNumber, [
                                'body' => '{"Param1":"value1","Param2":"value2","Param3":"value3"}',
                                'headers' => [
                                'accept' => 'application/json',
                                'authkey' => '392544AOIYK2Ojjt658d5b43P1',
                                'content-type' => 'application/json',
                            ],
                        ]);
                    $response = [
                        'status'=> 'success',
                        'message' => 'Your OTP Send To Your Phone Number',
                    ];

                    return response()->json($response);
            }
        }
    }

    public function forgot_password(Request $req,$value = null){
        if($req->method() == 'POST'){
            $user = User::where('email',$req->email)->first();
            $check = User::where('email',$req->email)->exists();
            if($check == false){
                return redirect()->back()->with('error','Please Enter Vaild Email');
            }
            if($user != ''){
                $name = $user->name;
                $email = $user->email;
                $otp =  rand(100001,999999);
                $message = 'Password Reset';
                Session::put([
                    'email'=>$email,
                    'pass_otp'=>$otp,
                    ]);
                    User::where('email',$req->email)->update([
                        'password'=>Hash::make($password)
                    ]);
                    $maildata = new \stdClass();
                    $maildata->email = $email;
                    $maildata->otp = $otp;
                // $data = array('name'=>$name, 'email'=>$email, 'password'=>$password ,'type'=>'forget_Password');
                Mail::to($email)->send(new EmailVerification($maildata));
                return redirect('otp_verification_page')->with('msg','Send OTP To Your Email');
            }else{
                return view('user.main.forgot_password');
            }
        }
        else if($value != null){
            $user = User::where('email',session()->get('email'))->first();
            $check = User::where('email',session()->get('email'))->exists();
            if($user != ''){
                $name = $user->name;
                $email = $user->email;
                $password =  rand(1001,9999);
                $message = 'Password Reset';
                Session::put([
                    'email'=>$email,
                    'pass_otp'=>$password,
                    'otp_check'=>'0',
                    ]);
                User::where('email',$req->email)->update([
                        'password'=>Hash::make($password)
                    ]);
                $data = array('name'=>$name, 'email'=>$email, 'password'=>$password ,'type'=>'forget_Password');
                Mail::to($email)->send(new EmailVerification($data));
                return redirect('otp_verification_page')->with('msg','Resend OTP To Your Email');
            }else{
                return redirect()->back();
            }
        }
        else{
            return view('user.main.forgot_password');
        }
    }

    public function forget_pass(request $request){
        $user = User::where('email',$request->email)->first();
        if($user){
            $email_otp = rand(100001,999999);
            Session::put([
                'email' => $request->email,
                'forget_otp'=>$email_otp,
            ]);
            $maildata = new \stdClass();
            $maildata->email = $request->email;
            $maildata->otp = $email_otp;
            if(filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
              Mail::to($request->email)->send(new EmailVerification($maildata));
            }
            $response = [
                'status'=> 'success',
                'message' => 'OTP send To Your Email',
            ];
            return response()->json($response);
        }else{
            $response = [
                'status'=> 'error',
                'message' => 'Email Not Found',
            ];
            return response()->json($response);
        }
    }
    public function forget_otp_check(request $request){
        // dd($request);
        if(session('forget_otp')== $request->otp){
            $response = [
                'status'=> 'success',
                'message' => 'OTP Verified',
            ];
            return response()->json($response);
        }else{
            $response = [
                'status'=> 'error',
                'message' => 'Invaild OTP Please Check',
            ];
            return response()->json($response);
        }
    }
    public function forget_password_change(request $request){
        User::where('email',session('email'))->update([
            'password'=>Hash::make($request->password)
        ]);
        session()->flash('email');
        session()->flash('forget_otp');
        return redirect('login')->with('msg',"Your Password Change Sucessfully");
    }







}
