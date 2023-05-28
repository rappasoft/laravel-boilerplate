<?php

namespace App\Domains\Auth\Models\Traits\Method;

/**
 * Trait ExampleMethod.
 */
trait ExampleMethod
{
    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }
}
