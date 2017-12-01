<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repository\SocialAccountRepository;
use Exception;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialAccountController extends Controller
{

    /**
     * Redirect the user to the provider authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information
     *
     * @return Response
     */
    public function handleProviderCallback(SocialAccountRepository $accountRepository, $provider)
    {
        try {
            $socialUser = Socialite::with($provider)->user();
        } catch (Exception $e) {
            return redirect('/login')->withErrors('Ocorreu algum problema com a autenticação.');
        }

        $authUser = $accountRepository->findOrCreate($socialUser, $provider);

        // Set as logged user
        auth()->login($authUser, true);

        return redirect()->to('/home');
    }
}
