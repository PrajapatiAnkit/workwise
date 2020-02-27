<?php

namespace App\Http\Controllers\users;
use App\Http\Controllers\Controller;


class ProfileController extends Controller
{
    public function index()
    {
        return view('users.profile.profile-feed');
    }
}
