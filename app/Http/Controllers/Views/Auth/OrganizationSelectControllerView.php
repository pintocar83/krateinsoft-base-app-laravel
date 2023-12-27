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

        return redirect()->to("/");
    }
}
