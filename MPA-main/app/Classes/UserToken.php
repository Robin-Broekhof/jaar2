<?php

namespace App\Classes;
use Illuminate\Http\Request;
use Session;


class UserToken
{
    private $token;


public function __construct()
    {
        $this->token = Session::get('token');
    }

    public function wipeSessionToken()
    {
        Session::forget('token');
    }
}
?>