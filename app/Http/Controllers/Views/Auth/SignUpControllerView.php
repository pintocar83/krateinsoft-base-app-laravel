<?php

namespace App\Http\Controllers\Views\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class SignUpControllerView extends Controller
{

	/**
     * Display sign up resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('auth.sign-up');
    }
}
