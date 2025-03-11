<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Models\User;


use App\Models\PhoneVerification;

use DB;

class SMSController  extends Controller
{


		function  sms_send($mobile,$msg,$lang='EN'){


		 	// Account details
			$apiKey = urlencode('PUT_API_KEY_HERE');

			// Message details
			$numbers = array($mobile);
			$sender = urlencode('PUT_SENDER_ID_HERE');
			$message = rawurlencode($msg);

			$numbers = implode(',', $numbers);

			// Prepare data for POST request
			$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

			// Send the POST request with cURL
			$ch = curl_init('https://api.textlocal.in/send/');
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($ch);
			curl_close($ch);

			// Process your response here
			echo $response;


	}




	 function ajax_otp_send_for_login(request $request){
	 	$show_otp_on_login=0;

		$send_otp=0;
		$phone=$request->phone;
		$otp=rand(1000,9999);


		$count=PhoneVerification::where('phone',$phone)->count();
		if($count>0){

				DB::table('phone_verification')
				->where('phone',$phone)
				->update();

		}else{

			DB::table('phone_verification')->insert(

			);


		}




  		 $sms_msg="Your OTP to register/access ONLINEGGS is ".$otp;
 		 $this->sms_send($phone,$sms_msg);

		 $status=1;

		 //used for non SMS gateway implemented
		 if($show_otp_on_login==1){

			 $message="OTP ".$otp." sent to your mobile no. ";

		 }else{
		    $message="OTP sent to your mobile no. ";

		 }


		 return response()->json(array('status'=>$status,'message'=>$message));




	}




	function check_otp_for_login_with_phone(request $request){
		$phone=$request->phone;
		$otp=$request->otp;

		$status=0;

 		$user=User::where('phone',$phone)->where('status',1)->first();

		if(!$user){
			  return response()->json(array('status'=>$status,'message'=>'This phone no. is not registered with us!'));

		}


 	   $count=PhoneVerification::where('phone',$phone)->where('otp',$otp)->count();
		if($count>0){
 				$status=1;
				$message="This phone no. successfully verified";

					DB::table('phone_verification')
					->where('phone',$phone)
					 ->where('otp',$otp)
					->update();





				//login the user
				Auth::login($user);

				///////////

		 }else{
				 	$status=0;
				 	$message="Incorrect OTP";
		 }

		 return response()->json(array('status'=>$status,'message'=>$message));


	}





} 
