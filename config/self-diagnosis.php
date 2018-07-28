<?php

return [

    /*
     * A list of environment aliases mapped to the actual environment configuration.
     */
    'environment_aliases' => [
        'prod' => 'production',
        'live' => 'production',
        'local' => 'development',
    ],

    /*
     * Common checks that will be performed on all environments.
     */
    'checks' => [
        \BeyondCode\SelfDiagnosis\Checks\AppKeyIsSet::class,
        \BeyondCode\SelfDiagnosis\Checks\CorrectPhpVersionIsInstalled::class,
        \BeyondCode\SelfDiagnosis\Checks\DatabaseCanBeAccessed::class => [
            'default_connection' => true,
            'connections' => [],
        ],
        \BeyondCode\SelfDiagnosis\Checks\DirectoriesHaveCorrectPermissions::class => [
            'directories' => [
                storage_path(),
                base_path('bootstrap/cache'),
            ],
        ],
        \BeyondCode\SelfDiagnosis\Checks\EnvFileExists::class,
        \BeyondCode\SelfDiagnosis\Checks\ExampleEnvironmentVariablesAreSet::class,
        \BeyondCode\SelfDiagnosis\Checks\MigrationsAreUpToDate::class,
        \BeyondCode\SelfDiagnosis\Checks\PhpExtensionsAreInstalled::class => [
            'extensions' => [
                'openssl',
                'PDO',
                'mbstring',
                'tokenizer',
                'xml',
                'ctype',
                'json',
            ],
            'include_composer_extensions' => true,
        ],
        \BeyondCode\SelfDiagnosis\Checks\StorageDirectoryIsLinked::class,
    ],

    /*
     * Environment specific checks that will only be performed for the corresponding environment.
     */
    'environment_checks' => [
        'development' => [
            \BeyondCode\SelfDiagnosis\Checks\ComposerWithDevDependenciesIsUpToDate::class,
            \BeyondCode\SelfDiagnosis\Checks\ConfigurationIsNotCached::class,
            \BeyondCode\SelfDiagnosis\Checks\RoutesAreNotCached::class,
        ],
        'production' => [
            \BeyondCode\SelfDiagnosis\Checks\ComposerWithoutDevDependenciesIsUpToDate::class,
            \BeyondCode\SelfDiagnosis\Checks\ConfigurationIsCached::class,
            \BeyondCode\SelfDiagnosis\Checks\DebugModeIsNotEnabled::class,
            \BeyondCode\SelfDiagnosis\Checks\PhpExtensionsAreDisabled::class => [
                'extensions' => [
                    'xdebug',
                ],
            ],
            \BeyondCode\SelfDiagnosis\Checks\RoutesAreCached::class,
        ],
    ],

];
