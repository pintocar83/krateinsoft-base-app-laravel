<?php
namespace App\Http\Controllers\Construvias\Views;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class WorkgroupMainBoxesControllerView extends Controller
{

    public function index(){
        return view('construvias.workgroup_main_boxes',[
        ]);
    }
}
