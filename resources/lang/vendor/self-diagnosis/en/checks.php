<?php

return [
    'app_key_is_set' => [
        'message' => 'The application key is not set. Call "php artisan key:generate" to create and set one.',
        'name' => 'App key is set',
    ],
    'composer_with_dev_dependencies_is_up_to_date' => [
        'message' => 'Your composer dependencies are not up to date. Call "composer install" to update them. :more',
        'name' => 'Composer dependencies (including dev) are up to date',
    ],
    'composer_without_dev_dependencies_is_up_to_date' => [
        'message' => 'Your composer dependencies are not up to date. Call "composer install" to update them. :more',
        'name' => 'Composer dependencies (without dev) are up to date',
    ],
    'configuration_is_cached' => [
        'message' => 'Your configuration should be cached in production for better performance. Call "php artisan config:cache" to create the configuration cache.',
        'name' => 'Configuration is cached',
    ],
    'configuration_is_not_cached' => [
        'message' => 'Your configuration files should not be cached during development. Call "php artisan config:clear" to clear the configuration cache.',
        'name' => 'Configuration is not cached',
    ],
    'correct_php_version_is_installed' => [
        'message' => 'You do not have the required PHP version installed.' . PHP_EOL . 'Required: :required' . PHP_EOL . 'Used: :used',
        'name' => 'The correct PHP version is installed',
    ],
    'database_can_be_accessed' => [
        'message' => 'The database can not be accessed: :error',
        'name' => 'The database can be accessed',
    ],
    'debug_mode_is_not_enabled' => [
        'message' => 'You should not use debug mode in production. Set "APP_DEBUG" in the .env file to "false".',
        'name' => 'Debug mode is not enabled',
    ],
    'directories_have_correct_permissions' => [
        'message' => 'The following directories are not writable:' . PHP_EOL .':directories',
        'name' => 'All directories have the correct permissions',
    ],
    'env_file_exists' => [
        'message' => 'The .env file does not exist. Please copy your .env.example file as .env and adjust accordingly.',
        'name' => 'The environment file exists',
    ],
    'example_environment_variables_are_set' => [
        'message' => 'These environment variables are missing in your .env file, but are defined in your .env.example:' . PHP_EOL . ':variables',
        'name' => 'The example environment variables are set',
    ],
    'migrations_are_up_to_date' => [
        'message' => [
            'need_to_migrate' => 'You need to update your database. Call "php artisan migrate" to run migrations.',
            'unable_to_check' => 'Unable to check for migrations: :reason',
        ],
        'name' => 'The migrations are up to date',
    ],
    'php_extensions_are_disabled' => [
        'message' => 'The following extensions are still enabled:' . PHP_EOL . ':extensions',
        'name' => 'Unwanted PHP extensions are disabled',
    ],
    'php_extensions_are_installed' => [
        'message' => 'The following extensions are missing:' . PHP_EOL . ':extensions',
        'name' => 'The required PHP extensions are installed',
    ],
    'routes_are_cached' => [
        'message' => 'Your routes should be cached in production for better performance. Call "php artisan route:cache" to create the route cache.',
        'name' => 'Routes are cached',
    ],
    'routes_are_not_cached' => [
        'message' => 'Your routes should not be cached during development. Call "php artisan route:clear" to clear the route cache.',
        'name' => 'Routes are not cached',
    ],
    'storage_directory_is_linked' => [
        'message' => 'The storage directory is not linked. Use "php artisan storage:link" to create a symbolic link.',
        'name' => 'The storage directory is linked',
    ],
];
