<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\User;
use App\Models\UserOrganization;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $text = isset($request['search']['value']) ? $request['search']['value'] : "";

        return datatables()->of(
            User::query()
            ->whereNull('delete_at')
            ->where(function($query) use($text) {
                $query->where('first_name', 'like', "%$text%")
                      ->orWhere('last_name', 'like', "%$text%")
                      ->orWhere('email', 'like', "%$text%");
            })
            ->with('organizations:organizations.id,organizations.name,user_organization.status')
        )->escapeColumns([])->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'first_name'=> 'required|string',
            'email'=> 'required|string|unique:users,email',
            'password'=> 'required|string|confirmed',
        ]);

        $image_name=$this->saveImage($request);
        $data=[
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'language' => $request['language'],
            'timezone' => $request['timezone'],
            'roles' => $request['roles'],
            'access_permissions' => $request['permissions'],
        ];

        if(isset($request['password']) and $request['password']){
            $data['password'] = Hash::make($request['password']);
        }

        if($image_name){
            $data["image"] = $image_name;
        }

        //Create User
        $user = User::create($data);

        if($request["organizations"] and $user->id){

            for($i=0; $i<count($request["organizations"]); $i++){
                UserOrganization::create([
                    "user_id"         => $user->id,
                    "organization_id" => $request["organizations"][$i],
                    "status"          => 1
                ]);
            }
        }

        $response = [
            'success'=> true,
            'message'=> __("User created successfully"),
            'data' => $user
        ];

        return $response;
    }

    /**
     * Store a newly created resource in storage from sign-up.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function signUp(Request $request){
        $request->validate([
            'first_name'=> 'required|string',
            'last_name'=> 'required|string',
            'email'=> 'required|string|unique:users,email',
            'password'=> 'required|string|confirmed'
        ]);

        //Create User
        $user = User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        $response = [
            'success' => true,
            'message' => __("User created successfully"),
            'data'    => $user
        ];

        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        return User::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        //dd($request);
        $validate=[
            'first_name'=> 'required|string',
            //'last_name'=> 'required|string',
            'email'=> "required|string|unique:users,email,$id,id",
            //'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ];

        if($request["password"]){
            $validate["password"]='required|string|confirmed';
        }

        if(!$request->validate($validate)){
            return ["success"=>false];
        }

        $user = User::find($id);
        $image_name=$this->saveImage($request);

        $data=[
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name']?$request['last_name']:"",
            'email' => $request['email'],
            'phone' => $request['phone'],
            'language' => $request['language'],
            'timezone' => $request['timezone'],
            'roles' => $request['roles'],
        ];

        if($image_name){
            $data["image"] = $image_name;

            if($user->image){
                $destinationPath = public_path('/storage/user');
                $image_old = "{$destinationPath}/{$user->image}";
                if(file_exists($image_old)){
                    unlink($image_old);
                }

                $image_old = "{$destinationPath}/thumbnail/{$user->image}";
                if(file_exists($image_old)){
                    unlink($image_old);
                }
            }
        }


        if($request["password"]){
            $data["password"] = Hash::make($request['password']);
        }

        $user->update($data);

        if($request["organizations"]){

            UserOrganization::where('user_id',$id)
                ->delete();

            for($i=0; $i<count($request["organizations"]); $i++){
                UserOrganization::create([
                    "user_id"         => $id,
                    "organization_id" => $request["organizations"][$i],
                    "status"          => 1
                ]);
            }
        }


        return [
            'success' => true,
            'message' => __("User modified successfully"),
            'data'    => $user
        ];
    }

    public function update_permissions(Request $request, $id){
        $permissions = $request['permissions'];

        $user = User::find($id);
        $user->update([
            "access_permissions" => $permissions
        ]);

        return [
            'success' => true,
            'message' => __("User permissions modified successfully"),
            'data'    => $user
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request){
        $id=$request["id"];
        if(!is_array($id)){
            return ["success"=>false];
        }
        User::whereIn('id', $id)->update(['delete_at'=>date('Y-m-d H:i:s')]);

        return [
            'success' => true,
            'message' => count($id) === 1 ? __("User deleted successfully") : __("Users deleted successfully"),
        ];
    }

    public function destroy_array(Request $request){
        $id=$request["id"];
        if(is_array($id)){
            $return=[];
            for($i=0; $i<count($id); $i++) {
                $return[]=User::destroy($id[$i]);
            }
            return $return;
        }
        return User::destroy($id);
    }

    /**
     * Search text content in name or description
     *
     * @param  string  $text
     * @return \Illuminate\Http\Response
     */
    public function search($text){
        return User::where('first_name','like',"%{$text}%")
            ->orWhere('last_name','like',"%{$text}%")
            ->orWhere('email','like',"%{$text}%")
            ->get();
    }

    public function saveImage($request){
        $image_name = "";
        $image = $request->file('image');
        if($image){
            $image_uid=(String)Str::uuid();
            $image_name=$image_uid.".".$image->extension();

            //Original Image max: 800x800
            $destinationPath = public_path('/storage/user');
            if(!file_exists($destinationPath)){
                mkdir($destinationPath,0777,TRUE);
            }

            $manager = new ImageManager(new Driver());
            $image = $manager->read($image->path());
            $image->scaleDown(width: 800, height: 800);
            $image->save($destinationPath.'/'.$image_name);

            //Thumbnail image max: 100x100
            $destinationPath = public_path('/storage/user/thumbnail');
            if(!file_exists($destinationPath)){
                mkdir($destinationPath,0777,TRUE);
            }

            $image->scaleDown(width: 100, height: 100);
            $image->save($destinationPath.'/'.$image_name);
        }
        return $image_name;
    }

    public function available($email){
        $data = User::where('email','like',"{$email}")->get();
        if(count($data)==0)
            return ["available"=>true];
        return ["available"=>false];
    }

    public function valid(Request $request){
        $email=$request['email'];
        if(!$email) return [];

        $id=$request['id'];

        $conditions = [
            ['email','like',"{$email}"]
        ];
        if($id){
            $conditions[]=['id','<>',"{$id}"];
        }

        $data = User::whereNull('delete_at')->where($conditions)->get();

        if(count($data)==0)
            return ["valid"=> true];
        return ["valid"=> false];
    }

    public function getByEmail($email){
        return User::where('email','like',"{$email}")->first();
    }

    /**
     * Authenticate a user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request){
        $email    = $request["email"];
        $password = $request["password"];

        $user = self::getByEmail($email);

        if($user && $user->email==$email && Hash::check($password, $user->password))
        {
            Auth::login($user);
            $user->update(['last_login'=>now()]);
            return ["success"=>true];
        }

        Auth::logout();
        return ["success"=>false, "message"=> __("Invalid credentials")];
    }

    /**
     * Password Forgot.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function passwordForgot(Request $request){
        $request->validate([
            'email' => 'required|email'
        ]);

        $email    = $request["email"];
        $user=self::getByEmail($email);

        if(!$user){
            return ['success'=>false, 'message'=> __('Email not found')];
        }

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                ? ['success'=>true,  'message'=> __($status)]
                : ['success'=>false, 'message'=> __($status)];
    }

    /**
     * Password Reset.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function passwordReset(Request $request){
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
                ? ['success'=>true,  'message'=> __($status)]
                : ['success'=>false, 'message'=> __($status)];

    }
}
