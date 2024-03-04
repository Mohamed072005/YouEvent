<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //
    public function toRegister(){
        return view('register');
    }

    public function toLogin(){
        return view('login');
    }

    public  function register(Request $request)
    {
//        session()->put('errorRegister', 'Invalid email or password');
//        dd(session('errorRegister'));
        $register = $request->validate([
            'name' => 'required',
            'email' => ['required', 'unique:users'],
            'password' => ['required', 'confirmed']
        ]);
//        Session::flush();
//        dd(session('errorRegister'));

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role_id' => 1,
            'password' => Hash::make($request->input('password'))
        ]);

        if ($register){
//            return response()->json('register success');
            return view('login');
            dd($register);
        }else{
//            return response()->json('Invalid email or password');
            return view('register')->with('errorRegister','Invalid email');
            dd($register);
        }


    }

    public function login(Request $request)
    {
        $user = $request->only('email', 'password');

        if (Auth::attempt($user)){
            $userInfo = Auth::user();
            session([
                'user_id' => $userInfo->id,
                'role_id' => $userInfo->role_id,
                'user_name' => $userInfo->name
            ]);
            return view('home');
        }else{
            return redirect()->route('login')->with('errorLogin', 'Invalid email or password');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }

    public function showForgotPasswordForm()
    {
        return view('forget-password.forgetPassword');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function showResetPasswordForm($token)
    {
        return view('forget-password.resetPassword', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password),
                ])->save();
            }
        );

        return $status == Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }


}
