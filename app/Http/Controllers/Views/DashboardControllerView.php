<?php
namespace App\Http\Controllers\Views;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class DashboardControllerView extends Controller
{
    public function index(){
        if(!session('Auth::organization')){
            return redirect('/organization-select');
        }
        else{
            return view('dashboard.index',[]);
        }
    }
}
