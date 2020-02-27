<?php

namespace App\Http\Controllers\users;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserSignupRequest;
use App\Http\Controllers\Controller;
use App\Models\Userr;
use App\Models\UserrDetail;
use Illuminate\Support\Facades\Auth;

class LoginSignupController extends Controller
{
    //
    public function index()
    {
        if (Auth::check()){
           return redirect()->route('home');
        }
        return view('users.login');
    }


    /**
     * @param UserSignupRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function signup(UserSignupRequest $request)
    {
        $validated = $request->validated();
        $userId = Userr::saveUser($validated);
        $saveDetail = UserrDetail::saveUserDetail($validated,$userId);
        if ($saveDetail){
            return response()->json(['status'=>1,'redirectUrl'=>route('home')]);
        }else{
            return response()->json(['status'=>0]);
        }
    }

    public function validateLogin(UserLoginRequest $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $loginData = array('username'=>$username,'password'=>$password,'user_type'=>2);

        if (Auth::attempt($loginData)){
            return response()->json(['loginStatus'=>1,'redirectUrl'=>route('home')]);
        }else{
            return response()->json(['loginStatus'=>0]);
        }
    }


    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
