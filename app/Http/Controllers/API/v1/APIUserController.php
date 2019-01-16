<?php namespace App\Http\Controllers\API\v1;

/**
 * Class APIUserController
 *
 * @author Anuj Jaha <er.anujjaha@gmail.com>
 */

use App\Models\Auth\User;
use App\Http\Controllers\API\v1\BaseAPIController;
use Illuminate\Foundation\Validation\ValidationException;
use Illuminate\Http\Request;
use App\Http\Transformers\UserTransformer;
use App\Repositories\Backend\Auth\UserRepository;
use Illuminate\Validation\Rule;

class APIUserController extends BaseAPIController
{   
    /**
     * Construct
     *
     */
    public function __construct()
    {
        $this->repository   = new UserRepository;
        $this->transformer  = new UserTransformer;
    }

    /**
     * Get My Profile
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMyProfile(Request $request)
    {
        $user       = $this->getAuthenticatedUser();
        $response   = $this->transformer->transform($user);

        return $this->successResponse($response);
    }

    /**
     * Create
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        // Validate that credentials exist and are in proper format
        $validationErrors = $this->validateRequest($request->all(), [ 
            'first_name'    => 'required|max:255',
            'last_name'     => 'required|max:255',
            'email'         => 'required|email|max:255|'.Rule::unique('users'),
            'password'      => 'required|min:6'
        ]);

        if(isset($validationErrors) && is_array($validationErrors))
        {
            return $this->validationFailResponse($validationErrors);
        }

        $request->request->add([
            'confirmed' => 1, 
            'roles'     => ['user']
        ]);
        
        $user = $this->repository->create($request->only(
            'first_name',
            'last_name',
            'email',
            'password',
            'active',
            'confirmed',
            'roles'
        )); 
        
        if(isset($user))
        {
            $response = $this->transformer->transform($user);

            return $this->successResponse($response, 'User Created Successfully.');
        }

        return $this->failureResponse([
            'message' => 'Something went Wrong!'
        ]);
    }

    /**
     * Update
     *
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, Request $request)
    {
        $user = User::find($id);

        if(isset($user) && isset($user->id))
        {
            // Validate that credentials exist and are in proper format
            $validationErrors = $this->validateRequest($request->all(), [ 
                'first_name'    => 'max:255',
                'last_name'     => 'max:255',
                'email'         => 'email|max:255|'.Rule::unique('users')->ignore($id),
            ]);

            if(isset($validationErrors) && is_array($validationErrors))
            {
                return $this->validationFailResponse($validationErrors);
            }

            if(isset($user) && isset($user->id))
            {
                $userInfo = $this->repository->update($user, $request->only(
                    'first_name',
                    'last_name',
                    'email',
                    'roles'
                ));

                if(isset($userInfo))
                {
                    $response = $this->transformer->transform($userInfo);

                    return $this->successResponse($response, 'User Updated Successfully.');
                }
            }
        }
        
        return $this->failureResponse([
            'message'   => 'No User Found!',
        ], 'No User Found!');
    }

    /**
     * Destroy
     *
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if(isset($user) && isset($user->id))
        {
            if($user->delete())
            {
                return $this->successResponse([
                    'message' => 'User Deleted Successfully.'
                ], 'User Deleted Successfully.');
            }
        }
        
        return $this->failureResponse([
            'message'   => 'No User Found!',
        ], 'No User Found!');
    }
}