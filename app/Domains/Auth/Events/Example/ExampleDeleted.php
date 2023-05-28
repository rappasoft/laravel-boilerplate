<?php

namespace App\Domains\Auth\Events\Example;

use App\Domains\Auth\Models\Example;
use Illuminate\Queue\SerializesModels;

/**
 * Class ExampleDeleted.
 */
class ExampleDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $example;

    /**
     * @param $example
     */
    public function __construct(Example $example)
    {
        $this->example = $example;
    }
}
