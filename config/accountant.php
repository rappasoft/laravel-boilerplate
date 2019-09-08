<?php

declare(strict_types=1);

return [

    'ledger' => [

        /*
        |--------------------------------------------------------------------------
        | Ledger Implementation
        |--------------------------------------------------------------------------
        |
        | Define the Ledger implementation.
        |
        */

        'implementation' => Altek\Accountant\Models\Ledger::class,

        /*
        |--------------------------------------------------------------------------
        | Ledger Threshold
        |--------------------------------------------------------------------------
        |
        | Specify a cutoff for the number of Ledger records a model can have.
        | Zero means unlimited.
        |
        */

        'threshold' => 0,

        /*
        |--------------------------------------------------------------------------
        | Ledger Driver
        |--------------------------------------------------------------------------
        |
        | The default driver used to store Ledger records.
        |
        */

        'driver' => 'database',
    ],

    /*
    |--------------------------------------------------------------------------
    | Resolver Implementations
    |--------------------------------------------------------------------------
    |
    | Define the Context, IP Address, URL, User Agent and User resolver
    | implementations.
    |
    */

    'resolvers' => [
        'context'    => Altek\Accountant\Resolvers\ContextResolver::class,
        'ip_address' => Altek\Accountant\Resolvers\IpAddressResolver::class,
        'url'        => Altek\Accountant\Resolvers\UrlResolver::class,
        'user_agent' => Altek\Accountant\Resolvers\UserAgentResolver::class,
        'user'       => Altek\Accountant\Resolvers\UserResolver::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Recording contexts
    |--------------------------------------------------------------------------
    |
    | Define the contexts in which recording should take place.
    |
    */

    'contexts' => Altek\Accountant\Context::WEB,

    /*
    |--------------------------------------------------------------------------
    | Notary Implementation
    |--------------------------------------------------------------------------
    |
    | The default Notary implementation.
    |
    */

    'notary' => Altek\Accountant\Notary::class,

    /*
    |--------------------------------------------------------------------------
    | Recordable Events
    |--------------------------------------------------------------------------
    |
    | The events that trigger a new Ledger record.
    |
    */

    'events' => [
        'created',
        'updated',
        'restored',
        'deleted',
        'forceDeleted',
    ],

    /*
    |--------------------------------------------------------------------------
    | User MorphTo relation prefix & default Guards
    |--------------------------------------------------------------------------
    |
    | Define the morph prefix and which authentication guards the User resolver
    | should use.
    |
    */

    'user' => [
        'prefix' => 'user',
        'guards' => [
            'web',
            'api',
        ],
    ],

];
