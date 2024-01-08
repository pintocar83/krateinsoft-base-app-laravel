<?php

namespace App\Http\Controllers\Views\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Helpers\Timezones;


class SignInControllerView extends Controller
{

	/**
     * Display sign in resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('auth.sign-in',["success"=>NULL, "message"=>""]);
    }    

}
