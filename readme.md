## Laravel 5 Boilerplate

### Features:

- Default Laravel 5 Authentication
- Frontend and Backend Controllers
- Form/HTML Facades Included
- Default Forms Converted to Form Helper Methods
- Default Master Layout
- Elixr Compilation and Auto-Prefixation in Header
- Set up perfectly for use with Laravel 5 Vault Package

### Installation:

- `composer install`
- `npm install`
- Create .env file (example below)
- `php artisan key:generate`
- `php artisan migrate`
- Set administrator info in UserTableSeeder.php
- Uncomment seeders in DatabaseSeeder.php
- `php artisan db:seed`
- Comment seeders in DatabaseSeeder.php
- Set app.php config
- Set mail.php config
- Install gulp (sudo npm install -g gulp)
- run `gulp`

Example .env file:

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