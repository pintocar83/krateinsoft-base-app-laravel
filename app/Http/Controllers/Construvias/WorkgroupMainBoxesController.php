<?php
namespace App\Http\Controllers\Construvias;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

use App\Http\Controllers\Controller;
use App\Models\Construvias\WorkgroupMainBox;

class WorkgroupMainBoxesController extends Controller
{

    public function view_admin(){
        //dd(config("database.connections.organization"));
        //session_start();
        //dd($_SESSION);
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

    public function saveImage($request){
        $image_name = "";
        $image = $request->file('image');
        if($image){
            $image_uid=(String)Str::uuid();
            $image_name=$image_uid.".".$image->extension();

            //Original Image max: 800x800
            $destinationPath = public_path('/storage/construvias/workgroups');
            if(!file_exists($destinationPath)){
                mkdir($destinationPath,0777,TRUE);
            }

            $manager = new ImageManager(new Driver());
            $image = $manager->read($image->path());
            $image->scaleDown(width: 800, height: 800);
            $image->save($destinationPath.'/'.$image_name);

            //Thumbnail image max: 100x100
            $destinationPath = public_path('/storage/construvias/workgroups/thumbnail');
            if(!file_exists($destinationPath)){
                mkdir($destinationPath,0777,TRUE);
            }

            $image->scaleDown(width: 100, height: 100);
            $image->save($destinationPath.'/'.$image_name);
        }
        return $image_name;
    }

    public function store(Request $request){
        $request->validate([
            'code'=> 'required|string',
            'name'=> 'required|string',
            'order'=> 'required|integer',
        ]);

        $image_name=$this->saveImage($request);
        $data=[
            'code'            => $request['code'],
            'name'            => $request['name'],
            'description'     => $request['description'],
            'connection_type' => $request['connection_type'],
            'ip_address'      => $request['ip_address'],
            'address_country' => $request['address_country'],
            'address_state'   => $request['address_state'],
            'address_city'    => $request['address_city'],
            'address_line1'   => $request['address_line1'],
            'address_line2'   => $request['address_line2'],
            'main'            => $request['main'],
            'status'          => $request['status'],
            'order'           => $request['order'],
        ];

        if($image_name){
            $data["image"] = $image_name;
        }

        //Create
        $workgroup = WorkgroupMainBox::create($data);

        $response = [
            'success'=> true,
            'message'=> __("Workgroup created successfully"),
            'data' => $workgroup
        ];

        return $response;
    }

    public function update(Request $request, $id){
        //dd($request);
        $validate=[
            'code'=> 'required|string',
            'name'=> 'required|string',
            'order'=> 'required|integer',
        ];

        if(!$request->validate($validate)){
            return ["success"=>false];
        }

        $workgroup = WorkgroupMainBox::find($id);
        $image_name=$this->saveImage($request);

        $data=[
            'code'            => $request['code'],
            'name'            => $request['name'],
            'description'     => $request['description'],
            'connection_type' => $request['connection_type'],
            'ip_address'      => $request['ip_address'],
            'address_country' => $request['address_country'],
            'address_state'   => $request['address_state'],
            'address_city'    => $request['address_city'],
            'address_line1'   => $request['address_line1'],
            'address_line2'   => $request['address_line2'],
            'main'            => $request['main'],
            'status'          => $request['status'],
            'order'           => $request['order'],
        ];

        if($image_name){
            $data["image"] = $image_name;

            if($workgroup->image){
                $destinationPath = public_path('/storage/construvias/workgroups');
                $image_old = "{$destinationPath}/{$workgroup->image}";
                if(file_exists($image_old)){
                    unlink($image_old);
                }

                $image_old = "{$destinationPath}/thumbnail/{$workgroup->image}";
                if(file_exists($image_old)){
                    unlink($image_old);
                }
            }
        }


        $workgroup->update($data);

        return [
            'success' => true,
            'message' => __("Workgroup modified successfully"),
            'data'    => $workgroup
        ];
    }

    public function delete(Request $request){
        $id=$request["id"];
        if(!is_array($id)){
            return ["success"=>false];
        }
        WorkgroupMainBox::whereIn('id', $id)->update(['delete_at'=>date('Y-m-d H:i:s')]);

        return [
            'success' => true,
            'message' => count($id) === 1 ? __("Workgroup deleted successfully") : __("Workgroups deleted successfully"),
        ];
    }

    public function new(){
        $last_code = WorkgroupMainBox::whereNull('delete_at')->latest()->limit(1)->pluck('code');
        if(isset($last_code[0])){
            $code = $last_code[0];
            if(is_numeric($code)){
                $len = strlen("$code");
                $n = $code*1+1;
                $code = str_pad("$n", $len, "0", STR_PAD_LEFT);
            }
        }
        else{
            $code = "001";
        }

        $last_order = WorkgroupMainBox::whereNull('delete_at')->orderBy('order', 'desc')->limit(1)->pluck('order');
        if(isset($last_order[0])){
            $order = $last_order[0]*1+1;
        }
        else{
            $order = 1;
        }

        return [
            "code" => $code,
            "order" => $order
        ];
    }
}
