## Laravel 5 Boilerplate

[![Project Status](http://stillmaintained.com/rappasoft/Laravel-5-Boilerplate.png)](http://stillmaintained.com/rappasoft/Laravel-5-Boilerplate)

### Features:

- Default Responsive Layout
- Default Laravel 5 Authentication
- Frontend and Backend Controllers
- Form/HTML Facades Included
- Default Forms Converted to Form Helper Methods
- Master Layout File with common sections
- Elixir Compilation and Auto-Prefixation of CSS in header
- Elixir Compilation and Auto-Prefixation of JS in footer
- Set up perfectly for use with [Laravel 5 Vault Package](https://github.com/rappasoft/vault)
- Helper functions
- [Bootstrap 3 (LESS/SASS)](http://www.getbootstrap.com)
- [HTML5 Boilerplate v5.0](http://www.html5boilerplate.com)
- [Font Awesome (LESS/SASS)](http://fortawesome.github.io/Font-Awesome/)
- Global Messages/Exception Handling
- Form Macros (State and Country dropdowns, easy to extend)
- [Laravel Debugbar](https://github.com/barryvdh/laravel-debugbar)
- [Socialite Integration](https://github.com/laravel/socialite)

### Installation:

- `composer install`
- `npm install`
- Create .env file (example below)
- `php artisan key:generate`
- `php artisan migrate`
- Set administrator info in UserTableSeeder.php
- `php artisan db:seed --class="UserTableSeeder"`
- Install gulp (sudo npm install -g gulp)
- run `gulp` or `gulp watch`
- Configure `app.php` and `mail.php`

### Example .env file:

    APP_ENV=local
    APP_DEBUG=true
    APP_URL=http://localhost
    APP_KEY=WILL BE GENERATED
    
    DB_HOST=localhost
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=root
    
    CACHE_DRIVER=file
    SESSION_DRIVER=file
    QUEUE_DRIVER=sync
    
    MAIL_DRIVER=smtp
    MAIL_HOST=mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=null
    MAIL_PASSWORD=null
    
    GITHUB_CLIENT_ID=
    GITHUB_CLIENT_SECRET=
    GITHUB_REDIRECT=
    
    FACEBOOK_CLIENT_ID=
    FACEBOOK_SECRET=
    FACEBOOK_REDIRECT=
    
    TWITTER_CLIENT_ID
    TWITTER_CLIENT_SECRET
    TWITTER_REDIRECT=
    
    GOOGLE_CLIENT_ID=
    GOOGLE_CLIENT_SECRET=
    GOOGLE_REDIRECT=
    
## Socialite

To configure socialite, add your credentials to your .env file, and your redirect urls in the services.php config file. Follow the directions in the doc blocks.

If you are getting a ```cURL error 60``` on localhost, follow [these directions](http://stackoverflow.com/questions/28635295/laravel-socialite-testing-on-localhost-ssl-certificate-issue).
    
## Troubleshooting

If for any reason something goes wrong, try each of the following:

Delete the `composer.lock` file

Run the `dumpautoload` command

       $ composer dumpautoload -o
       
If the above fails to fix, and the command line is referencing errors in `compiled.php`, do the following:
       
Delete the `storage/framework/compiled.php` file
       
**If all of the above don't work please [report here](https://github.com/rappasoft/Laravel-5-Boilerplate/issues).**
    
## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)