<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Models\User;
use Socialite;
use App\Models\SocialAccount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialController extends Controller
{
    private $user;
    private $social_account;

	public function __construct(User $user, SocialAccount $social_account)
	{
		$this->user = $user;
		$this->social_account = $social_account;
	}
    public function redirectToProvider($provider_type)
    {
        return Socialite::driver($provider_type)->redirect();
    }

    public function handleCallback(Request $request, $provider_type)
    {
        $socialite = Socialite::driver($provider_type)->user();
        $user = $this->findOrCreateUser($provider_type, $socialite);
        
        Auth::login($user);
        return redirect()->intended();
    }


    private function findOrCreateUser($provider_type, $socialite)
    {
        if($social_account = $this->social_account->findByProviderTypeAndID($provider_type, $socialite->getId())){
        	return $social_account->user;
        }

        if($user = $this->user->findByEmail($socialite->getEmail())){
            if($user->socialAccounts()->whereProviderType($provider_type)->first()){
                dd("Not Allow User To use the app");
            }

            $user->socialAccounts()->create([
                'provider_type' => $provider_type,
                'provider_id' => $socialite->getId()
            ]);

            return $user;
        }

        $user = $this->user->create([
			'name' => $socialite->getName(),
			'email' => $socialite->getEmail(),
		])->socialAccounts()->create([
			'provider_type' => $provider_type,
			'provider_id' => $socialite->getId(),
        ])->user;

        return $user;
    }

}
