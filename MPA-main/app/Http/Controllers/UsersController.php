<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Classes\UserToken;

class UsersController extends Controller
{
    
    /**
     * Log out account user.
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function logout()
    {
        $userTokenClass = new UserToken;
        $userTokenClass->wipeSessionToken();
        Auth::logout();
        return redirect('/');
    }











    
}

