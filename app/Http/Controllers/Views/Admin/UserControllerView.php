<?php

namespace App\Http\Controllers\Views\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Helpers\Timezones;
use App\Models\Organization;


class UserControllerView extends Controller
{

	/**
     * Display sign up resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $timezones=Timezones::all();
        $organizations=Organization::where('status','1')
            ->get();

        $timezone = config('app.timezone');
        $language = config('app.locale');
        if(Auth::check()){
            $organization=Auth()?->user()?->organization();
            if($organization){
                $timezone=$organization->timezone;
                $language=$organization->language;
            }
        }

        return view('admin.users',[
            'timezones'     => $timezones,
            'timezone'      => $timezone,
            'language'      => $language,
            'organizations' => $organizations,
        ]);
    }
}
