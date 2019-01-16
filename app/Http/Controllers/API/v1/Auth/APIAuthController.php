<?php namespace App\Http\Controllers\API\v1\Auth;

/**
 * Class APIAuthController
 *
 * @Author Anuj Jaha <er.anujjaha@gmail.com> 
 */

use App\Http\Controllers\API\v1\BaseAPIController;
use Illuminate\Foundation\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Transformers\UserTransformer;
use Tymon\JWTAuth\Facades\JWTAuth;

class APIAuthController extends BaseAPIController
{
    /**
     * Post API Login
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postLogin(Request $request)
    {
        // Validate that credentials exist and are in proper format
        $validationErrors = $this->validateRequest($request->all(), [ 
            'email'    => 'required|email|max:255',
            'password' => 'required'
        ]);

        if(isset($validationErrors) && is_array($validationErrors))
        {
            return $this->validationFailResponse($validationErrors);
        }

        try
        {
            if(!$token =  JWTAuth::attempt($request->only('email', 'password')))
            {
                return $this->dataFailResponse([
                    'message' => 'The credentials provided did not match any users in our system.'
                ]);
            }

            $this->user = $user = Auth::user();
        }
        catch(JWTException $e)
        {
            return $this->dataFailResponse([
                'errorCode'     => 'AUTH_TOKEN_ABSENT',
                'message'       => 'Your authentication token is absent from this request.'
            ]);
        }
        catch(BadRequestHttpException $e)
        {
            if($e->getMessage() == 'Token not provided')
            {
                return $this->dataFailResponse([
                    'errorCode'     => 'AUTH_TOKEN_ABSENT',
                    'message'       => 'Your authentication token is absent from this request.'
                ]);
            }
        }

        $transform  = new UserTransformer;
        $output     = $transform->transform($this->user);
        $response   = array_merge($output, ['userToken' => $token]);

        return $this->successResponse($response);
    }

    /**
     * Logout
     * 
     * @param  Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        JWTAuth::invalidate($request->bearerToken());

        return $this->successResponse([
            'message' => 'User Logged out Successfully !'
        ]);
    }
}