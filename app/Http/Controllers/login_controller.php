<?php

namespace App\Http\Controllers;

use App\Mail\OTPMail1;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\StaticTable;
use App\Models\NotAllowUser;
use App\Models\Activity_details;
use App\Mail\EmailVerification;
use App\Mail\AdminSendEmailNotAllow;
use Illuminate\Support\Facades\Mail;
use GuzzleHttp\Client;
use Hash;
use Auth;
use App\Mail\OTPMail;



class login_controller extends Controller
{

    public function password_update(){
        return view('forget_passwor.for_get');
    }

    public function otp_page(){
        return view('forget_passwor.user_otp_varify');
    }
    public function pass(){
        return view('forget_passwor.user_password_update');
    }


    public function send_otp(Request $request)
{
    $data = DB::table('users')->where('email', $request->email)->first();
    if (!$data) {
        return redirect()->back()->with('error', 'User not found with this email.');
    }
    $otp = rand(1001, 9999);
    Session::put([
        'user_data' => $data,
        'otp' => $otp,
        'email' => $request->email
    ]);

    $mailData = new \stdClass();
    $mailData->email = $data->email;
    $mailData->otp = $otp;
    Mail::to($request->email)->send(new OTPMail($mailData));
    return redirect('otp_page');
}

public function uresend(Request $request){
   // dd(session('user_data')->email);
    $otp = rand(1001, 9999);
    //$data=(session('user_data')->email);
    //dd($data);
    Session::put([
        'otp' => $otp,
        'email' => Session('email')
    ]);
    $mailData = new \stdClass();
    $mailData->otp = $otp;
    Mail::to(Session('email'))->send(new OTPMail($mailData));
    return redirect('otp_page');
}

    public function otp_varify(Request $request){
       if ($request->isMethod('post')) {
        $value = session('otp');
        if ($request->otp == $value) {
            $user = session('user_data');
            return redirect('pass')->with('msg', 'Your OTP is verified successfully! Please enter your password to continue.');
        }else{
            return redirect()->back()->with('msg', 'OTP is incorrect! Please try again.');
        }
    }else{
        return redirect()->back()->with('msg', 'OTP is incorrect! Please try again.');
 }
    }

    public function pass_post(Request $request){
        //dd($request);
        DB::table('users')->where('email',Session('email'))->update([
            'password' => bcrypt($request->password),
        ]);
        $request->session()->forget(['user_data', 'otp','eamil']);
        return redirect('user_login');
    }


    public function password_update1(){
        return view('forget_passwor.ofor_get');
    }


    public function otp_page1(){
        return view('forget_passwor.ouser_otp_varify');
    }

    public function pass1(){
        return view('forget_passwor.ouser_password_update');
    }


    public function send_otp1(Request $request)
    {
        $data = DB::table('owner_user')->where('email', $request->email)->first();

        if (!$data) {
            return redirect()->back()->with('error', 'User not found with this email.');
        }
        $otp1 = rand(1001, 9999);
        Session::put([
            'user_data1' => $data,
            'otp1' => $otp1,
            'email1' => $request->email
        ]);

        $mailData = new \stdClass();
        $mailData->email = $data->email;
        $mailData->otp1 = $otp1;
        Mail::to($data->email)->send(new OTPMail1($mailData));
        return redirect('otp_page1');
    }

    public function uresend1(Request $request){
       // dd(session('user_data')->email);
        $otp1 = rand(1001, 9999);
        $data=(session('email1'));
        //dd($data);
        Session::put([
            'otp1' => $otp1,
            'eamil1' => Session('email1')
        ]);
        $mailData = new \stdClass();
        $mailData->otp1 = $otp1;
        Mail::to($data)->send(new OTPMail1($mailData));
        return redirect('otp_page1');
    }

        public function otp_varify1(Request $request){
           if ($request->isMethod('post')) {
            $value = session('otp1');
            if ($request->otp == $value) {
                $user = session('user_data1');
                return redirect('pass1')->with('msg', 'Your OTP is verified successfully! Please enter your password to continue.');
            }else{
                return redirect()->back()->with('msg', 'OTP is incorrect! Please try again.');
            }
        }else{
            return redirect()->back()->with('msg', 'OTP is incorrect! Please try again.');
     }
        }

        public function pass_post1(Request $request){
            DB::table('owner_user')->where('email',session('email1'))->update([
                'password' => bcrypt($request->password),
            ]);
            $request->session()->forget(['user_data1', 'otp1','email1']);
            return redirect('owner_login');
        }

        public function get_states(Request $request)
        {
            // print_r($request->all());
            $country = $request['country'];
            // echo $country;
            // echo gettype($request['country']);
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

}
