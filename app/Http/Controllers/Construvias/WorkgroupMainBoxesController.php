<?php
namespace App\Http\Controllers\Construvias;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Construvias\WorkgroupMainBox;

class WorkgroupMainBoxesController extends Controller
{

    public function view_admin(){
        return view('construvias.workgroup_main_boxes_admin',[
        ]);
    }

    public function view(){
        return view('construvias.workgroup_main_boxes',[
        ]);
    }

    public function index(Request $request){
        $text = isset($request['search']['value']) ? $request['search']['value'] : "";

        return datatables()->of(
            WorkgroupMainBox::query()
            ->whereNull('delete_at')
            ->where(function($query) use($text) {
                $query->where('code', 'like', "%$text%")
                      ->orWhere('name', 'like', "%$text%")
                      ->orWhere('description', 'like', "%$text%");
            })
        )->escapeColumns([])->toJson();
    }
}
