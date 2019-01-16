<?php namespace App\Http\Controllers\API\v1;

/**
 * Class BaseAPIController
 *
 * @Auther Anuj Jaha <er.anujjaha@gmail.com>
 */

use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Library\API\BaseAPILibrary;

class BaseAPIController extends Controller
{
    /**
     * \Tymon\JWTAuth\JWTAuth
     *
     * @var object
     */
    protected $jwt;

    /**
     * User
     *
     * @var object
     */
    protected $user;

    /**
     * Construct
     *
     */
    public function __construct()
    {
    }

    /**
     * Get JWT Authenticated User
     *
     * @return object
     */
    public function getAuthenticatedUser()
    {
        return JWTAuth::parseToken()->authenticate();
    }

    /**
     * Validate Request
     *
     * @param array $input
     * @param array $rules
     * @return bool
     */
    public function validateRequest($input = array(), $rules = array())
    {
        return BaseAPILibrary::validateRequest($input, $rules);
    }

    /**
     * Validation Fail Response
     *
     * @param array $data
     * @return json
     */
    public function validationFailResponse($data = array())
    {
        return BaseAPILibrary::validationFailResponse($data);
    }

    /**
     * Data Fail Response
     *
     * @param array $data
     * @return json
     */
    public function dataFailResponse($data = array(), $message = '')
    {
        return BaseAPILibrary::dataFailResponse($data, $message);
    }

    /**
     * Success Response
     *
     * @param array $data
     * @return json
     */
    public function successResponse($data = array(), $message = '')
    {
        return BaseAPILibrary::successResponse($data, $message);
    }

    /**
     * Failure Response
     *
     * @param array $data
     * @return json
     */
    public function failureResponse($data = array(), $message = '')
    {
        return BaseAPILibrary::failureResponse($data, $message);
    }
}