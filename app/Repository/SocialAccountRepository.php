<?php

namespace App\Repository;

use App\SocialLoginAccount;
use App\User;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAccountRepository
{
    public function findOrCreate(ProviderUser $providerUser, $provider)
    {
        if ($account = $this->isExistingAccount($providerUser, $provider)) {
            return $account->user;
        }

        // Is there a existing User with a social email?
        if (!$user = User::where('email', $providerUser->getEmail())->first()) {
            // Create a new user with social email
            $user = User::create([
                'email' => $providerUser->getEmail(),
                'name'  => $providerUser->getName(),
            ]);
        }

        // Associate social account with user
        $user->accounts()->create([
            'provider_id'   => $providerUser->getId(),
            'provider_name' => $provider,
        ]);

        return $user;
    }

    /**
     * Checks if a social account already existis on our system.
     */
    private function isExistingAccount($providerUser, $provider) 
    {
        return SocialLoginAccount::where('provider_name', $provider)
            ->where('provider_id', $providerUser->getId())
            ->first();
    }
}
