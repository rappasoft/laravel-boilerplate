<?php

namespace App\Domains\Auth\Services\Traits;

/**
 * Class HasPermissions.
 */
trait HasAbilities
{

    /**
     * @param  array  $data
     *
     * @return array
     */
    private function getPermissions(array $data = []): array
    {
        if (! isset($data['permissions']) || ! count($data['permissions'])) {
            return [];
        }

        return $data['permissions'];
    }

    /**
     * @param  array  $data
     *
     * @return array
     */
    private function getRoles(array $data = []): array
    {
        if (! isset($data['roles']) || ! count($data['roles'])) {
            return [];
        }

        return $data['roles'];
    }
}
