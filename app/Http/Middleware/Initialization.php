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
            Config::set(["database.connections.organization" => [
                "driver" => $current_organization->db_driver,
                "url" => $current_organization->db_url,
                "host" => $current_organization->db_host,
                "port" => $current_organization->db_port,
                "database" => $current_organization->db_name,
                "username" => $current_organization->db_user,
                "password" => $current_organization->db_password,
                'unix_socket' => $current_organization->db_socket,
            ]]);
        }

        return $next($request);
    }
}
