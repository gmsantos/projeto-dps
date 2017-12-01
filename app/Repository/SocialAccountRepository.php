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

        // Determine current user or create a new one
        $user = $this->determineCurrentUser($providerUser);

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

    /**
     * Try to determine a existing user to associate a Social Account.
     * First, checks if there are a logged user.
     * After checks if we have a matching email on our database.
     * In last case, create a new User with Social Login information.
     */
    private function determineCurrentUser($providerUser)
    {
        if ($loggedUser = auth()->user()) {
            return $loggedUser;
        }

        if ($existingUser = User::where('email', $providerUser->getEmail())->first()) {
            return $existingUser;
        }

        // Return a new user
        return User::create([
            'email' => $providerUser->getEmail(),
            'name'  => $providerUser->getName(),
        ]);
    }

}
