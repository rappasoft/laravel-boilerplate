<?php

namespace App\Domains\Auth\Http\Controllers\Frontend\Auth;

use App\Domains\Auth\Services\UserService;
use App\Rules\Captcha;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;
use Illuminate\Support\Str;

/**
 * Class RegisterController.
 */
class RegisterController
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * @var UserService
     */
    protected $userService;

    /**
     * RegisterController constructor.
     *
     * @param  UserService  $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Where to redirect users after registration.
     *
     * @return string
     */
    public function redirectPath()
    {
        return route(homeRoute());
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        abort_unless(config('boilerplate.access.user.registration'), 404);

        return view('frontend.auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')],
            'password' => array_merge(['max:100'], PasswordRules::register($data['email'] ?? null)),
            'image' => ['nullable', 'mimes:jpeg,png,jpg', 'image'], // Validate profile image field
            'terms' => ['required', 'in:1'],
            'g-recaptcha-response' => ['required_if:captcha_status,true', new Captcha],
        ], [
            'terms.required' => __('You must accept the Terms & Conditions.'),
            'g-recaptcha-response.required_if' => __('validation.required', ['attribute' => 'captcha']),
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Domains\Auth\Models\User|mixed
     *
     * @throws \App\Domains\Auth\Exceptions\RegisterException
     */
    protected function create(array $data)
    {
        abort_unless(config('boilerplate.access.user.registration'), 404);
        // Check if an image was uploaded in the form data
        if (isset($data['image'])) {

            // Get the uploaded image object 
            $profilePicture = $data['image'];
        
            $fileName = Str::uuid() . '.' . $profilePicture->getClientOriginalExtension(); //use uuid for file name to be unique

        
            // Move the uploaded image to the "profile_pictures" directory
            $profilePicture->move(public_path('profile_pictures'), $fileName);
        
            // Update the "image" key in the form data with the saved filename
            $data['image'] = $fileName;
  }

        return $this->userService->registerUser($data);
    }
}
