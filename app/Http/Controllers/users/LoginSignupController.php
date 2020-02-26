<?php

namespace App\Http\Controllers\users;

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
        return view('users.login');
    }


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

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
