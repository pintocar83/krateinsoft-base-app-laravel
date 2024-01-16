<?php

namespace App\Http\Controllers\Views\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SignInSocialiteControllerView extends Controller {
    /**
     * Redirect the user to the Provider authentication page.
     *
     * @param $provider
     * @return JsonResponse
     */
    public function redirectToProvider($provider) {
        $validated = $this->validateProvider($provider);
        if (!is_null($validated)) {
            return $validated;
        }
        return Socialite::driver($provider)->stateless()->redirect();
    }

    /**
     * Obtain the user information from Provider.
     *
     * @param $provider
     * @return JsonResponse
     */
    public function handleProviderCallback($provider) {
        $validated = $this->validateProvider($provider);
        if (!is_null($validated)) {
            return $validated;
        }
        try {
            $user = Socialite::driver($provider)->stateless()->user();
        } catch (ClientException $exception) {
            //return response()->json(['error' => 'Invalid credentials provided.'], 422);
            return view('auth.sign-in',["success"=>false, "message"=>"Invalid credentials provided."]);
        }


        $email="";
        if($user->getEmail())
            $email=$user->getEmail();
        if(!$email && $user->getNickname())
            $email=$user->getNickname();

        $first_name="";
        if($user->getName())
            $first_name=$user->getName();
        if(!$first_name && $user->getNickname())
            $first_name=$user->getNickname();
        //dd($user);exit;

        $userCreated = User::firstOrCreate(
            [
                'email' => $email
            ],
            [
                'email_verified_at' => now(),
                'first_name' => $first_name,
                'last_name' => "",
                'status' => true,
                'last_login'=>now(),
            ]
        );
        $userCreated->providers()->updateOrCreate(
            [
                'provider' => $provider,
                'provider_id' => $user->getId(),
            ],
            [
                'avatar' => $user->getAvatar()
            ]
        );

        Auth::login($userCreated);
        $userCreated->update(['last_login'=>now()]);

        return redirect()->to("/");

        //Case authentication to API
        //$token = $userCreated->createToken('token-name')->plainTextToken;
        //return response()->json($userCreated, 200, ['Access-Token' => $token]);
    }

    /**
     * @param $provider
     * @return JsonResponse
     */
    protected function validateProvider($provider) {
        $provider_configured = [];

        if(feature_flag('auth-google')?->config['client_id'])
            $provider_configured[]='google';
        if(feature_flag('auth-facebook')?->config['client_id'])
            $provider_configured[]='facebook';
        if(feature_flag('auth-twitter')?->config['client_id'])
            $provider_configured[]='twitter';
        if(feature_flag('auth-linkedin')?->config['client_id'])
            $provider_configured[]='linkedin';
        if(feature_flag('auth-github')?->config['client_id'])
            $provider_configured[]='github';
        if(feature_flag('auth-bitbucket')?->config['client_id'])
            $provider_configured[]='bitbucket';
        if(feature_flag('auth-gitlab')?->config['client_id'])
            $provider_configured[]='gitlab';

        if (!in_array($provider, $provider_configured)) {
            return response()->json(['error' => 'Please login using '.implode(", ",$provider_configured).'.'], 422);
        }
    }
}