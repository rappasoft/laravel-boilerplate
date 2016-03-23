<?php

namespace App\Setup\Steps;

use App\Models\Access\User\User;
use DB;
use Illuminate\Support\Collection;
use MarvinLabs\SetupWizard\Steps\BaseStep;
use Validator;

/**
 * Class AdministratorStep
 *
 * @package app\SetupSteps
 *
 * Setup wizard step to create a user with the administrator role
 */
class AdministratorStep extends BaseStep
{
    public function __construct($id)
    {
        parent::__construct($id);
    }

    public function getFormData()
    {
        $rolesTable = config('access.roles_table');
        /** @var Collection $availableRoles */
        $availableRoles = DB::table($rolesTable)->orderBy('sort')->pluck('name', 'id');

        return [
            'availableRoles' => $availableRoles
        ];
    }

    public function apply($formData)
    {
        $rolesTable = config('access.roles_table');

        $v = Validator::make($formData, [
            'name'     => 'required',
            'email'    => 'required|email',
            'password' => 'required|confirmed',
            'role'     => 'required|exists:' . $rolesTable . ',id',
        ]);

        if ($v->fails()) {
            $this->mergeErrors($v->errors());

            return false;
        }

        // Create the user
        $userModelClass = config('access.user');
        /** @var User $admin */
        $admin = new $userModelClass();
        $admin->name              = $formData['name'];
        $admin->email             = $formData['email'];
        $admin->password          = bcrypt($formData['password']);
        $admin->confirmation_code = md5(uniqid(mt_rand(), true));
        $admin->confirmed         = true;
        $admin->save();

        // Associate the user to the role
        $roleModelClass = config('access.role');
        $role = $roleModelClass::where('id', $formData['role'])->first();
        $admin->attachRole($role);

        return true;
    }

    public function undo()
    {
        if (env('DB_CONNECTION') == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        $tables = [
            config('access.users_table'),
            config('access.assigned_roles_table'),
        ];

        foreach ($tables as $table) {
            if (env('DB_CONNECTION') == 'mysql') {
                DB::table($table)->truncate();
            } elseif (env('DB_CONNECTION') == 'sqlite') {
                DB::statement('DELETE FROM ' . $table);
            } else {
                DB::statement('TRUNCATE TABLE ' . $table . ' CASCADE');
            }
        }

        if (env('DB_CONNECTION') == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }

        return true;
    }
}
