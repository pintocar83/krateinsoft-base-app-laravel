<?php

namespace App\Http\Controllers\Views\Auth;

use App\Http\Controllers\Controller;


class PasswordForgotControllerView extends Controller
{

    /**
     * Display view resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('auth.password-forgot');
    }
}
