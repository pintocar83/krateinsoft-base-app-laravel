<?php

namespace App\Http\Middleware;

use Closure;
use Config;
use Illuminate\Http\Request;

class Initialization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //Set Locales
        $locale = app()->getLocale();
        if(session()->has('locale')){
            $locale=session("locale");
        }
        app()->setLocale($locale);

        //Set organization database
        $current_organization = Auth()->user()?->organization();
        if($current_organization){
            $connection = [
                "driver" => $current_organization->db_driver
            ];

            if($current_organization->db_url)      $connection["url"] = $current_organization->db_url;
            if($current_organization->db_host)     $connection["host"] = $current_organization->db_host;
            if($current_organization->db_port)     $connection["port"] = $current_organization->db_port;
            if($current_organization->db_name)     $connection["database"] = $current_organization->db_name;
            if($current_organization->db_user)     $connection["username"] = $current_organization->db_user;
            if($current_organization->db_password) $connection["password"] = $current_organization->db_password;
            if($current_organization->db_socket)   $connection["unix_socket"] = $current_organization->db_socket;

            Config::set(["database.connections.organization" => $connection]);
        }

        return $next($request);
    }
}
