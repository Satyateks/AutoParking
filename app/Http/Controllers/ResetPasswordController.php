<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    /**
     * Verify OTP and reset the user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|numeric',
            'password' => 'required|confirmed|min:8',
        ]);

        $email = $request->email;
        $otp = $request->otp;
        $password = $request->password;

        // Retrieve the OTP from the cache
        $cachedOtp = Cache::get('password_reset_' . $email);

        // Verify the OTP
        if ($otp != $cachedOtp) {
            return response()->json(['status' => 'error', 'message' => 'Invalid OTP.']);
        }

        // Validate the user's password if needed
        if (!$this->validatePassword($email, $password)) {
            return response()->json(['status' => 'error', 'message' => 'Password does not meet the requirements.']);
        }

        // Reset the user's password
        $response = Password::reset($request->only('email', 'password', 'password_confirmation'), function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password),
            ])->save();
        });

        if ($response == Password::PASSWORD_RESET) {
            // Clear the OTP from the cache
            Cache::forget('password_reset_' . $email);

            return response()->json(['status' => 'success', 'message' => 'Password has been reset successfully.']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Unable to reset password.']);
        }
    }

    /**
     * Validate the user's password.
     *
     * @param  string  $email
     * @param  string  $password
     * @return bool
     */
    private function validatePassword($email, $password)
    {
        // You can implement your own password validation logic here
        // For example, checking if the password contains a mix of letters, numbers, and special characters
        return true;
    }
}
