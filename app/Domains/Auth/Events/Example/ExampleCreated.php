<?php

namespace App\Domains\Auth\Events\Example;

use App\Domains\Auth\Models\Example;
use Illuminate\Queue\SerializesModels;

/**
 * Class ExampleCreated.
 */
class ExampleCreated
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
