<?php

namespace App\Http\Controllers\Views\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\MenuSection;
use App\Models\MenuItem;

class OrganizationSelectControllerView extends Controller
{

	/**
     * Display sign in resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $organizations = Auth()
            ->user()
            ->organizations()
            ->where([
                'user_organization.status'=>'1',
                'organizations.status'=>'1'
            ])
            ->get();
        if(count($organizations)===1)
            return $this->select(new Request(["id"=>$organizations[0]["id"]]));
        return view('auth.organization-select',[
            "organizations"=>$organizations,
            "success"=>session('success'),
            "message"=>session('message')
        ]);
    }

    public function select(Request $request){
        $id = $request->id;
        $organization = Auth()
            ->user()
            ->organizations()
            ->where([
                'user_organization.status'=>'1',
                'organizations.status'=>'1',
                "organizations.id"=>"$id"
            ])
            ->first();
        if(!$organization){
            session(['Auth::organization' => NULL]);
            return redirect()->to("/organization-select")->with([
                "success"=>false,
                "message"=>"Invalid organization."]);
        }
        session(['Auth::organization' => $organization]);
        //session(['Auth::organization->db_driver' => $organization->db_driver]);
        @session_start();
        $_SESSION['ORGANIZATION_DB_DRIVER']   = $organization->db_driver;
        $_SESSION['ORGANIZATION_DB_URL']      = $organization->db_url;
        $_SESSION['ORGANIZATION_DB_HOST']     = $organization->db_host;
        $_SESSION['ORGANIZATION_DB_PORT']     = $organization->db_port;
        $_SESSION['ORGANIZATION_DB_NAME']     = $organization->db_name;
        $_SESSION['ORGANIZATION_DB_USER']     = $organization->db_user;
        $_SESSION['ORGANIZATION_DB_PASSWORD'] = $organization->db_password;
        $_SESSION['ORGANIZATION_DB_SOCKET']   = $organization->db_socket;
/*
        putenv("ORGANIZATION_DB_DRIVER=$organization->db_driver");
        putenv("ORGANIZATION_DB_URL=$organization->db_url");
        putenv("ORGANIZATION_DB_HOST=$organization->db_host");
        putenv("ORGANIZATION_DB_PORT=$organization->db_port");
        putenv("ORGANIZATION_DB_NAME=$organization->db_name");
        putenv("ORGANIZATION_DB_USER=$organization->db_user");
        putenv("ORGANIZATION_DB_PASSWORD=$organization->db_password");
        putenv("ORGANIZATION_DB_SOCKET=$organization->db_socket");

        config(["database.connections.organization" => [
            "driver" => $organization->db_driver,
            "url" => $organization->db_url,
            "host" => $organization->db_host,
            "port" => $organization->db_port,
            "database" => $organization->db_name,
            "username" => $organization->db_user,
            "password" => $organization->db_password,
            'unix_socket' => $organization->db_socket,
        ]]);
*/
        return redirect()->to("/");
    }
}
