<?php

namespace App\Http\Controllers\Views\Auth;

use App\Http\Controllers\Controller;


class PasswordResetControllerView extends Controller
{

    /**
     * Display view resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($token){
        return view('auth.password-reset', ['token'=>$token]);
    }
}
