<?php

namespace App\Http\Controllers\Api\Auth;

use App\Exceptions\GeneralException;
use App\Models\Auth\SocialAccount;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Laravel\Passport\Client;
use Laravel\Socialite\Facades\Socialite;
use App\Repositories\Frontend\Auth\UserRepository;
use App\Helpers\Frontend\Auth\Socialite as SocialiteHelper;

class SocialLoginController extends Controller
{
    use IssueTokenTrait;
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @var SocialiteHelper
     */
    protected $socialiteHelper;

    private $client;

    /**
     * SocialLoginController constructor.
     *
     * @param UserRepository $userRepository
     * @param SocialiteHelper $socialiteHelper
     */
    public function __construct(UserRepository $userRepository, SocialiteHelper $socialiteHelper)
    {
        $this->userRepository = $userRepository;
        $this->socialiteHelper = $socialiteHelper;
        $this->client = Client::find(env('PASSWORD_CLIENT_ID'));
    }

    public function login(Request $request, $provider)
    {
//        Request Format
//        http://localhost/boilerplate/public/api/login/facebook/callback?provider_access_token=EAAJA4yIT2hYBAKcJl7bnaRqpXZAVgZA6iGeW5orgTP6ZADhooHtWtN1OZCaDtYHsQQKUvLW6mk0ZBPISUpWnI8JgflaZBUpdh5ZCNtZBVnRvhYBGZBQryOuFeuO4FDLnryxyA3iZAPCy6BMfBTv3q0cadkmFp9HAgmX7QIcRBcf0QCBd0JGihi7EihZA5Dv7fo9CJI9vUm6acZBZBlwZDZD&
//        provider=facebook

        // There's a high probability something will go wrong
        $user = null;
//        dd($request);

        // If the provider is not an acceptable third party than kick back
        if (!in_array($provider, $this->socialiteHelper->getAcceptedProviders())) {
            // TODO Error Response
            return '{"error"}';
        }

        try {
            $providerUser = Socialite::driver($request->provider)->userFromToken($request->provider_access_token);
//          checks user if exist then return it and if does not exist create and returns it
            $user = $this->userRepository->findOrCreateProvider($providerUser, $provider);
        } catch (GeneralException $e) {
            // TODO Error Response
            return '{"error"}';
        }

        if (is_null($user)) {
            // TODO Error Response
            return '{"error"}';
//            return redirect()->route(home_route())->withFlashDanger(__('exceptions.frontend.auth.unknown'));
        }

        // Check to see if they are active.
        if (!$user->isActive()) {
            // TODO Error Response
            return '{"not Active"}';
//            throw new GeneralException(__('exceptions.frontend.auth.deactivated'));
        }

        // Account approval is on
        if ($user->isPending()) {
            // TODO Error Response
            return '{"error"}';
//            throw new GeneralException(__('exceptions.frontend.auth.confirmation.pending'));
        }
//          request parameters for social grant
        $request->request->add([
            'provider' => $request->provider,
            'provider_user_id' => $providerUser->id
        ]);
        // User has been successfully created or already exists
        return $this->issueToken($request, 'social');
    }

    private function addSocialAccountToUser(Request $request)
    {

    }
}
