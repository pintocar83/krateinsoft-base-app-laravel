<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Helpers\Timezones;

use App\Models\Organization;

class OrganizationsController extends Controller
{

    public function view_admin(){
        $timezones=Timezones::all();
        $timezone = config('app.timezone');
        $language = config('app.locale');

        return view('admin.organizations',[
            'timezones'     => $timezones,
            'timezone'      => $timezone,
            'language'      => $language,
        ]);
    }

    public function index(Request $request){
        $text = isset($request['search']['value']) ? $request['search']['value'] : "";

        return datatables()->of(
            Organization::query()
            ->whereNull('delete_at')
            ->where(function($query) use($text) {
                $query->where('code', 'like', "%$text%")
                      ->orWhere('name', 'like', "%$text%")
                      ->orWhere('description', 'like', "%$text%");
            })
        )->escapeColumns([])->toJson();
    }

    public function saveImage($request, $field="image"){
        $image_name = "";
        $image = $request->file($field);
        if($image){
            $image_uid=(String)Str::uuid();
            $image_name=$image_uid.".".$image->extension();

            //Original Image max: 800x800
            $destinationPath = public_path('/storage/organizations');
            if(!file_exists($destinationPath)){
                mkdir($destinationPath,0777,TRUE);
            }

            $manager = new ImageManager(new Driver());
            $image = $manager->read($image->path());
            $image->scaleDown(width: 800, height: 800);
            $image->save($destinationPath.'/'.$image_name);

            //Thumbnail image max: 100x100
            $destinationPath = public_path('/storage/organizations/thumbnail');
            if(!file_exists($destinationPath)){
                mkdir($destinationPath,0777,TRUE);
            }

            $image->scaleDown(width: 100, height: 100);
            $image->save($destinationPath.'/'.$image_name);
        }
        return $image_name;
    }

    public function deleteImage($image_name){
        if($image_name){
            if(substr($image_name, 0, 6) === "image/"){
                return;
            }

            $destinationPath = public_path('/storage/organizations');
            $image = "{$destinationPath}/{$image_name}";
            if(file_exists($image)){
                unlink($image);
            }

            $image = "{$destinationPath}/thumbnail/{$image_name}";
            if(file_exists($image)){
                unlink($image);
            }
        }
    }

    public function store(Request $request){
        $request->validate([
            'code'=> 'required|string',
            'name'=> 'required|string',
        ]);

        $image=$this->saveImage($request,"image");
        $image_secondary=$this->saveImage($request,"image_secondary");
        $image_inline=$this->saveImage($request,"image_inline");
        $image_report_vertical=$this->saveImage($request,"image_report_vertical");
        $image_report_horizontal=$this->saveImage($request,"image_report_horizontal");

        $data=[
            'code'                  => $request['code'],
            'identification_number' => $request['identification_number'],
            'name'                  => $request['name'],
            'address_country'       => $request['address_country'],
            'address_state'         => $request['address_state'],
            'address_city'          => $request['address_city'],
            'address_line1'         => $request['address_line1'],
            'address_line2'         => $request['address_line2'],
            'email'                 => $request['email'],
            'phone'                 => $request['phone'],
            'timezone'              => $request['timezone'],
            'language'              => $request['language'],
            'db_driver'             => $request['db_driver'],
            'db_url'                => $request['db_url'],
            'db_host'               => $request['db_host'],
            'db_port'               => $request['db_port'],
            'db_socket'             => $request['db_socket'],
            'db_name'               => $request['db_name'],
            'db_user'               => $request['db_user'],
            'db_password'           => $request['db_password'],
            'status'                => $request['status'],
        ];

        if($image){
            $data["image"] = $image;
        }

        if($image_secondary){
            $data["image_secondary"] = $image_secondary;
        }

        if($image_inline){
            $data["image_inline"] = $image_inline;
        }

        if($image_report_vertical){
            $data["image_report_vertical"] = $image_report_vertical;
        }

        if($image_report_horizontal){
            $data["image_report_horizontal"] = $image_report_horizontal;
        }

        //Create
        $organization = Organization::create($data);

        $response = [
            'success'=> true,
            'message'=> __("Organization created successfully"),
            'data' => $organization
        ];

        return $response;
    }

    public function update(Request $request, $id){
        //dd($request);
        $validate=[
            'code'=> 'required|string',
            'name'=> 'required|string',
        ];

        if(!$request->validate($validate)){
            return ["success"=>false];
        }

        $organization = Organization::find($id);

        $image=$this->saveImage($request,"image");
        $image_secondary=$this->saveImage($request,"image_secondary");
        $image_inline=$this->saveImage($request,"image_inline");
        $image_report_vertical=$this->saveImage($request,"image_report_vertical");
        $image_report_horizontal=$this->saveImage($request,"image_report_horizontal");

        $data=[
            'code'                  => $request['code'],
            'identification_number' => $request['identification_number'],
            'name'                  => $request['name'],
            'address_country'       => $request['address_country'],
            'address_state'         => $request['address_state'],
            'address_city'          => $request['address_city'],
            'address_line1'         => $request['address_line1'],
            'address_line2'         => $request['address_line2'],
            'phone'                 => $request['phone'],
            'email'                 => $request['email'],
            'timezone'              => $request['timezone'],
            'language'              => $request['language'],
            'db_driver'             => $request['db_driver'],
            'db_url'                => $request['db_url'],
            'db_host'               => $request['db_host'],
            'db_port'               => $request['db_port'],
            'db_socket'             => $request['db_socket'],
            'db_name'               => $request['db_name'],
            'db_user'               => $request['db_user'],
            'db_password'           => $request['db_password'],
            'status'                => $request['status'],
        ];

        if($image){
            $data["image"] = $image;
            $this->deleteImage($organization->image);
        }

        if($image_secondary){
            $data["image_secondary"] = $image_secondary;
            $this->deleteImage($organization->image_secondary);
        }

        if($image_inline){
            $data["image_inline"] = $image_inline;
            $this->deleteImage($organization->image_inline);
        }

        if($image_report_vertical){
            $data["image_report_vertical"] = $image_report_vertical;
            $this->deleteImage($organization->image_report_vertical);
        }

        if($image_report_horizontal){
            $data["image_report_horizontal"] = $image_report_horizontal;
            $this->deleteImage($organization->image_report_horizontal);
        }


        $organization->update($data);

        return [
            'success' => true,
            'message' => __("Organization modified successfully"),
            'data'    => $organization
        ];
    }

    public function delete(Request $request){
        $id=$request["id"];
        if(!is_array($id)){
            return ["success"=>false];
        }
        Organization::whereIn('id', $id)->update(['delete_at'=>date('Y-m-d H:i:s')]);

        return [
            'success' => true,
            'message' => count($id) === 1 ? __("Organization deleted successfully") : __("Organizations deleted successfully"),
        ];
    }

    public function new(){
        $last_code = Organization::whereNull('delete_at')->latest()->limit(1)->pluck('code');
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

        return [
            "code" => $code
        ];
    }

    public function migrate(Request $request, $id){
        $organization = Organization::find($id);

        $organization->migrate();

        return [
            'success' => true,
            'message' => __("Updated organization database"),
        ];
    }
}
