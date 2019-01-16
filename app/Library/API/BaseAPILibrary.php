<?php namespace App\Library\API;

/**
 * Class BaseAPILibrary
 *
 * @author Anuj Jaha <er.anujjaha@gmail.com>
 */

use Carbon\Carbon, ErrorException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Validation\ValidationException;

class BaseAPILibrary
{
    /**
     * Validation Fail Response
     *
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public static function validationFailResponse($data = array())
    {
        return response()->json((object)[
            'data'      => $data,
            'status'    => false,
            'errorCode' => isset($data['errorCode']) ? $data['errorCode'] : 'VALIDATION_EXCEPTION' 
        ], 401);
    }

    /**
     * Data Fail Response
     *
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public static function dataFailResponse($data = array(), $message = '')
    {
        return response()->json((object)[
            'data'      => $data,
            'message'   => $message,
            'status'    => false,
            'errorCode' => isset($data['errorCode']) ? $data['errorCode'] : 'DATA_NOT_FOUND' 
        ], 401);
    }

    /**
     * Success Response
     *
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public static function successResponse($data = array(), $message = '')
    {
        return response()->json((object)[
            'data'      => $data,
            'message'   => isset($message) && !empty($message) ? $message : "Success",
            'status'    => true,
        ], 200);
    }

    /**
     * Failure Response
     *
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public static function failureResponse($data = array(), $message = '')
    {
        return response()->json((object)[
            'data'      => $data,
            'message'   => isset($message) ? $message : 'Something Went Wrong!',
            'status'    => false,
            'errorCode' => isset($data['errorCode']) ? $data['errorCode'] : 'FAILURE' 
        ], 200);
    }

    /**
     * Failure Response
     *
     * @param array $data
     * @return mixed
     */
    public static function validateRequest($input = array(), $rules = array())
    {
        // Validate input Request
        $validation     = Validator::make($input, $rules);
        $errorMessages  = $validation->messages();
        $messages       = [];

        if(isset($errorMessages) && count($errorMessages))
        {
            foreach($errorMessages->messages() as $errorMessage)
            {
                array_push($messages, $errorMessage[0]);
            }
        }

        if($validation->fails())
        {
            return [
                'message'   => 'Validation Failure',
                'errors'    => $messages
            ];
        }

        return true;
    }
}