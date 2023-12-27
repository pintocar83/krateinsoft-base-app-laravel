<?php
namespace App\Http\Controllers\Views\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AccountSettingsControllerView extends Controller
{

  /**
     * Display sign up resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('account.settings');
    }
}
