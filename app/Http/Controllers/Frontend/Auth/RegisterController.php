<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Events\Frontend\Auth\UserRegistered;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Repositories\Frontend\Auth\UserRepository;
use Illuminate\Foundation\Auth\RegistersUsers;

/**
 * Class RegisterController.
 */
class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * RegisterController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Where to redirect users after login.
     *
     * @return string
     */
    public function redirectPath()
    {
        return route(home_route());
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        abort_unless(config('access.registration'), 404);

        return view('frontend.auth.register');
    }

    /**
     * @param RegisterRequest $request
     *
     * @throws \Throwable
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function register(RegisterRequest $request)
    {
        abort_unless(config('access.registration'), 404);

        $user = $this->userRepository->create($request->only('first_name', 'last_name', 'email', 'password'));

        // If the user must confirm their email or their account requires approval,
        // create the account but don't log them in.
        if (config('access.users.confirm_email') || config('access.users.requires_approval')) {
            event(new UserRegistered($user));

            return redirect($this->redirectPath())->withFlashSuccess(
                config('access.users.requires_approval') ?
                    __('exceptions.frontend.auth.confirmation.created_pending') :
                    __('exceptions.frontend.auth.confirmation.created_confirm')
            );
        }

        auth()->login($user);

        event(new UserRegistered($user));

        return redirect($this->redirectPath());
    }
}
