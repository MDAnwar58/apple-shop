<?php

namespace App\Http\Controllers;

use App\Helper\JWTToken;
use App\Mail\OTPMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Helper\ResponseHelper;

class UserController extends Controller
{
    public function LoginPage()
    {
        return view('auth.login');
    }
    public function VerifyPage()
    {
        return view('auth.verify');
    }
    public function RegisterPage()
    {
        return view('auth.register');
    }
    public function UserLogin(Request $request)
    {
        try {
            // $UserEmail = $request->header('userEmail');
            $UserEmail = $request->UserEmail;
            $OTP = rand(10000, 99999);
            $details = ['code' => $OTP];
            Mail::to($UserEmail)->send(new OTPMail($details));
            User::updateOrCreate(
                ['email'=>$UserEmail], 
                ['email'=>$UserEmail, 'otp' => $OTP] 
            );
            return ResponseHelpeR::Out('success', "A 6 Digit OTP has been send to your email address", 200);
        } catch (\Exception $e) {
            return ResponseHelper::Out('fail', $e, 200);
        }
    }
    public function VerifyLogin(Request $request)
    {
        // $UserEmail = $request->header('userEmail');
        $UserEmail = $request->UserEmail;
        $OTP = $request->OTP;
        $verification = User::where('email', $UserEmail)->where('otp', $OTP)->count();
        if ($verification>0) {
            $user = User::updateOrCreate(
                ['email'=>$UserEmail], 
                ['email'=>$UserEmail, 'otp' => '0']
            );
            $token = JWTToken::CreateToken($UserEmail, $user->id);
            return ResponseHelper::Out('success', $token, 200)->cookie('token', $token, 60*20*30);
        }else{
            return ResponseHelper::Out('fail', null, 200);
        }
    }

    function UserLogout()
    {
        return redirect('/userLogin')->cookie('token', '', -1);
    }
}
