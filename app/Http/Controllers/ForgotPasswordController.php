<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordOTP;
use Illuminate\Support\Facades\Cache;

class ForgotPasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('user.main.forgot_password.forgot_pass');
    }

//forgot-password

    public function showVerifyOTPForm()
    {
        $email = session('email');
        return view('verify-otp', compact('email'));
    }



    public function showResetPasswordForm()
    {
        $email = session('email');
        return view('user.main.forgot_password.reset-password', compact('email'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        // Reset password logic goes here

        return redirect()->route('login')->with('success', 'Password reset successfully.');
    }

    private function generateToken()
    {
        return mt_rand(100000, 999999);
    }


    // In your controller method where you return the reset-password view



public function sendOTP(Request $request)
{
    $request->validate([
        'email' => 'required|email',
    ]);

    $token = $this->generateToken();
    $email = $request->email;

    Cache::put('password_reset_' . $email, $token, now()->addMinutes(15));

    Mail::to($email)->send(new ResetPasswordOTP($token));

    return redirect()->route('verify.otp')->with('email', $email);
}







public function verifyOTP(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'otp' => 'required|numeric',
    ]);

    $email = $request->email;
    $otp = $request->otp;
    $cachedOtp = cache::get('password_reset_' . $email);

    if ($otp == $cachedOtp) {
        return redirect()->route('reset.password')->with('email', $email);
    } else {
        return back()->withInput()->withErrors(['otp' => 'Invalid OTP']);
    }
}

}

