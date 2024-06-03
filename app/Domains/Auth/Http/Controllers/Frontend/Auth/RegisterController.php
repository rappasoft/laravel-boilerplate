<?php

namespace App\Domains\Auth\Http\Controllers\Frontend\Auth;

use App\Rules\Captcha;
use Intervention\Image\Image;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Domains\Auth\Services\UserService;
use Illuminate\Foundation\Auth\RegistersUsers;
use Intervention\Image\facade\Images as ResizeImage;
use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;

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
            'profile_picture' => ['nullable','image','max:2048'],
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

        if (array_key_exists('profile_picture', $data) && $data['profile_picture'] != null) {
            $profilePictureName = uniqid('profile_') . '.' . $data['profile_picture']->getClientOriginalExtension();
            $imagePath = storage_path('app/public/profile_pictures/' . $profilePictureName);
    
            // Resize the image using GD library
            $this->resizeImage($data['profile_picture']->getPathname(), $imagePath, 200, 200);
    
            $data['profile_picture'] = 'profile_pictures/' . $profilePictureName;
        }
    

//

        // if (array_key_exists('profile_picture', $data) && $data['profile_picture'] != null) {
        //     $profilePictureName = uniqid('profile_') . '.' . $data['profile_picture']->getClientOriginalExtension();
        //     $data['profile_picture']->storeAs('profile_pictures', $profilePictureName, 'public');
        //     $data['profile_picture'] = 'profile_pictures/' . $profilePictureName;
        // }
    
       
        return $this->userService->registerUser($data);
        
    }





    protected function resizeImage($sourcePath, $destPath, $width, $height)
    {
        list($originalWidth, $originalHeight) = getimagesize($sourcePath);
        $srcImage = imagecreatefromstring(file_get_contents($sourcePath));
        
        $aspectRatio = $originalWidth / $originalHeight;
        if ($width / $height > $aspectRatio) {
            $width = $height * $aspectRatio;
        } else {
            $height = $width / $aspectRatio;
        }
    
        $destImage = imagecreatetruecolor($width, $height);
        imagecopyresampled($destImage, $srcImage, 0, 0, 0, 0, $width, $height, $originalWidth, $originalHeight);
    
        // Save the resized image
        imagejpeg($destImage, $destPath, 90); // Change the image type and quality as needed
    
        // Free up memory
        imagedestroy($srcImage);
        imagedestroy($destImage);
    }







}
