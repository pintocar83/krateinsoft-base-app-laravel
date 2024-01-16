<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\FeatureFlag;

use Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        require_once base_path().'/app/Helpers/FeatureFlag.php';
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(app()->runningInConsole()){
            return;
        }

        $feature_flags = FeatureFlag::all();

        foreach($feature_flags as $feature_flag) {
            //Set Config -> FeatureFlag
            Config::set("feature_flag.{$feature_flag->id}", $feature_flag->enabled ? $feature_flag : NULL);

            //Setup authentication with Socialite
            if(in_array($feature_flag->id, [
                'auth-google',
                'auth-facebook',
                'auth-twitter',
                'auth-linkedin',
                'auth-github',
                'auth-bitbucket',
                'auth-gitlab',
            ])){
                $provider = substr($feature_flag->id, 5);
                Config::set("services.{$provider}", [
                    'client_id' => '',
                    'client_secret' => '',
                    'redirect' => '',
                ]);

                if($feature_flag->enabled && $feature_flag->config){
                    Config::set("services.{$provider}", $feature_flag->config);
                }
            }
        }
        //dd(config("feature_flag.auth-google"));
    }
}
