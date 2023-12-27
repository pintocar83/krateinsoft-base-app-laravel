<?php

namespace App\Http\Controllers\Views\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class DashboardAdminControllerView extends Controller
{

	/**
     * Display sign up resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('dashboard');
    }
}
