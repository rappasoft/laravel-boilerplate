## Laravel 5.* Boilerplate (Currently 5.1)

[![Project Status](http://stillmaintained.com/rappasoft/Laravel-5-Boilerplate.png)](http://stillmaintained.com/rappasoft/Laravel-5-Boilerplate) [![Latest Stable Version](https://poser.pugx.org/rappasoft/laravel-5-boilerplate/v/stable)](https://packagist.org/packages/rappasoft/laravel-5-boilerplate) [![Latest Unstable Version](https://poser.pugx.org/rappasoft/laravel-5-boilerplate/v/unstable)](https://packagist.org/packages/rappasoft/laravel-5-boilerplate)

### Demo:

[Click here for a demo](http://l5.rappasoft.com)
```
Username: admin@admin.com
Password: 1234
```

### Features:

* [Custom Access Control System](#access-control) (Authentication/Users/Roles/Permissions)
    * Register/Login/Logout/Password Reset
    * Third party login (Github/Facebook/Twitter/Google)
    * Account Confirmation By E-mail
    * Resend Confirmation E-mail
    * Administrator Management
        * User Index
        * Activate/Deactivate Users
        * Soft & Permanently Delete Users
        * Ban Users
        * Resend User Confirmation E-mails
        * Change Users Password
        * Create/Manage Roles
        * Create/Manage Permissions
        * Manage Users Roles/Permissions
* Default Responsive Layout
* Frontend and Backend Controllers
* User Dashboard
* Administration Dashboard with [Admin LTE](https://almsaeedstudio.com/) Theme
* Namespaced Routes
* Form/HTML Facades Included
* Default Forms Converted to Form Helper Methods
* Master Layout Files with common sections
* Elixir Compilation and Auto-Prefixation of CSS in header
* Elixir Compilation and Auto-Prefixation of JS in footer
* Helper functions
* Javascript/jQuery Snippets
* [Bootstrap 3 (LESS/SASS)](http://www.getbootstrap.com)
* [HTML5 Boilerplate v5.0](http://www.html5boilerplate.com)
* [Font Awesome (LESS/SASS)](http://fortawesome.github.io/Font-Awesome/)
* Global Messages/Exception Handling
* Form Macros (State and Country dropdowns, easy to extend)
* [Socialite Integration](https://github.com/laravel/socialite)
* [Laracast Generators](https://github.com/laracasts/Laravel-5-Generators-Extended)
* [Stripe](http://stripe.com) wrapper class for easy implementation
* [Active Menu](https://github.com/letrunghieu/active)
* Standards
    * Clean Controllers
    * Repository/Contract Implementations
    * Request Classes
    * Events/Handlers
    * Entire application split between frontend/backend

### Installation:

- `composer install`
- `npm install`
- Create .env file (example below)
- `php artisan key:generate`
- `php artisan migrate`
- Set administrator info in UserTableSeeder.php
- `php artisan db:seed`
- run `gulp` or `gulp watch` (Install gulp (sudo npm install -g gulp) if needed)

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
    MAIL_FROM=
    MAIL_NAME=
    
    STRIPE_KEY=
    STRIPE_SECRET=
    
    GITHUB_CLIENT_ID=
    GITHUB_CLIENT_SECRET=
    GITHUB_REDIRECT=
    
    FACEBOOK_CLIENT_ID=
    FACEBOOK_CLIENT_SECRET=
    FACEBOOK_REDIRECT=
    
    TWITTER_CLIENT_ID
    TWITTER_CLIENT_SECRET
    TWITTER_REDIRECT=
    
    GOOGLE_CLIENT_ID=
    GOOGLE_CLIENT_SECRET=
    GOOGLE_REDIRECT=

<a name="access-control"/>
## Access Control System (Previously 'Vault')
* [Configuration] (#configuration)
    * [Config File](#config_file)
    * [Route Middleware](#route_middleware)
    * [Controller Middleware](#controller_middleware)
        * [Parameters](#route_middleware_params)
        * [Creating Middleware](#creating_middleware)
        * [AccessParams trait](#access_params_trait)
    * [Blade Extensions](#blade_extensions)

<a name="configuration"/>
### Configuration

<a name="config_file"/>
###Configuration File

```php
/*
 * Role model used by Access to create correct relations. Update the role if it is in a different namespace.
*/
access.role

/*
 * Roles table used by Access to save roles to the database.
 */
access.roles_table

/*
 * Permission model used by Access to create correct relations.
 * Update the permission if it is in a different namespace.
 */
access.permission

/*
 * Permissions table used by Access to save permissions to the database.
 */
access.permissions_table

/*
 * permission_role table used by Access to save relationship between permissions and roles to the database.
 */
access.permission_role_table

/*
 * permission_user table used by Access to save relationship between permissions and users to the database.
 * This table is only for permissions that belong directly to a specific user and not a role
 */
access.permission_user_table

/*
 * assigned_roles table used by Access to save assigned roles to the database.
 */
access.assigned_roles_table

/*
 * Configurations for the user
 */
access.users.default_per_page

/*
 * The role the user is assigned to when they sign up from the frontend
 */
access.users.default_role

/*
 * Whether or not the user has to confirm their email when signing up
 */
access.users.confirm_email

/*
 * Whether or not the users email can be changed on the edit profile screen
 */
access.users.change_email

/*
 * Configuration for roles
 */
access.roles.role_must_contain_permission

/*
 * Whether or not the administrator role must possess every permission
 * Works in unison with permissions.permission_must_contain_role
 */
access.roles.administrator_forced

/*
 * Whether a permission must contain a role or can be used standalone
 * Works in unison with roles.administrator_forced
 */
access.permissions.permission_must_contain_role
```

<a name="route_middleware"/>
### Applying the Route Middleware

Laravel 5 is trying to steer away from the filters.php file and more towards using middleware. Here is an example right from the access routes file of a group of routes that requires the Administrator role:

```php
Route::group([
	'middleware' => 'access.routeNeedsRole',
	'role' => ['Administrator'],
	'redirect' => '/',
	'with' => ['error', 'You do not have access to do that.']
], function()
{
    Route::group(['prefix' => 'access'], function ()
    	{
    		/*User Management*/
    		Route::resource('users', 'Backend\Access\UserController');
    	});
});
```

The above code checks to see if the currently authenticated user has the role `Administrator`, if not redirects to `/` with a session variable that has a key of `message` and value of `You do not have access to do that.`

The following middleware ships with the boilerplate:

- access.routeNeedsRole
- access.routeNeedsPermission
- access.routeNeedsRoleOrPermission

<a name="controller_middleware"/>
### Applying the Controller Middleware

The controller middleware supports all of the same parameters as the route middleware, except that it is declared in the constructor of the controller you are trying to protect:

For example, the ```Route::group``` example above would be this:

```php
public function __construct() {
	$this->middleware('access.routeNeedsRole:{role:Administrator::redirect:/::with:error|You do not have access to do that.}');
}
```

**Notes:** Because the new route middleware parameters in 5.1 don't support arrays, I made my own syntax.

- It uses a single parameter encapulated in brackets `{}`
- `role` can be single `role:Administrator` or an "array" `role:Administrator|User|Other`
- Same for the permissions parameter: `permission:user_permission` or `permission:user_permission|other_permission`
- The session message is in format `with:variable_name|message`
- The parameters are separated by a double colon `::` (I did try a comma, the interpreter wasn't allowing it)


<a name="route_middleware_params"/>
### Route Parameters

- `middleware` => The middleware name, you can change them in your app/Http/Kernel.php file.
- `role` => A string of one role or an array of roles by name.
- `permission` => A string of one permission or an array of permissions by name.
- `needsAll` => A boolean, false by default, that states whether or not all of the specified roles/permissions are required to authenticate.
- `with` => Sends a session flash on failure. Array with 2 items, first is session key, second is value.
- `redirect` => Redirect to a url if authentication fails.
- `redirectRoute` => Redirect to a route if authentication fails.
- `redirectAction` => Redirect to an action if authentication fails.

**If no redirect is specified a `response('Unauthorized', 401);` will be thrown.**

<a name="creating_middleware"/>
### Create Your Own Middleware

If you would like to create your own middleware, the following methods are available.

**Note: A helper method ```access()``` is also available. E.g. access()->hasRole('Administrator') which resolves the Access facade out of the IoC container. You can modify this function to add more functionality in ```app/helpers.php```.**

```php
/**
	 * Checks if the user has a Role by its name.
	 * @param string $name
	 * @return bool
*/
Access::hasRole($role);

/**
	 * Checks to see if the user has an array of roles, and whether or not all must return true to authenticate
	 * @param array $roles
	 * @param boolean $needsAll
	 * @return bool
*/
Access::hasRoles($roles, $needsAll);

/**
	 * Check if user has a permission by its name.
	 * @param string $permission.
	 * @return bool
*/
Access::can($permission);

/**
	 * Check an array of permissions and whether or not all are required to continue
	 * @param array $permissions
	 * @param boolean $needsAll
	 * @return bool
*/
Access::canMultiple($permissions, $needsAll);
```
**Access::** by default uses the currently authenticated user. You can also do:

```php
$user->hasRole($role);
$user->hasRoles($roles, $needsAll);
$user->can($permission);
$user->canMultiple($permissions, $needsAll);
```

<a name="access_params_trait"/>
### AccessParams trait

If you would like to take advantage of the methods used by Access's route/controller handler, you can `use` it:

    `use App\Services\Access\Traits\AccessParams`

Which will give you methods in your middleware to grab route assets or controller parameters. You can then add methods to your middleware to grab assets that access doesn't grab by default and take advantage of them.

**Note:** If middleware is applied to both the controller and a route group, the controller will take precedence. 

<a name="blade_extensions"/>
### Blade Extensions

Access comes with @blade extensions to help you show and hide data by role or permission without clogging up your code with unwanted if statements:

```php
@role('User')
    This content will only show if the authenticated user has the `User` role.
@endrole

@permission('can_view_this_content')
    This content will only show if the authenticated user is somehow associated with the `can_view_this_content` permission.
@endpermission
```

**Currently each call only supports one role or permission, however they can be nested.**

If you want to show or hide a specific section you can do so in your layout files the same way:

```php
@role('User')
    @section('special_content')
@endrole

@permission('can_view_this_content')
    @section('special_content')
@endpermission
```

You can add more extensions by editing app/Blade/Access/AccessBladeExtender.php

## Socialite

To configure socialite, add your credentials to your .env file. The redirects must follow the convention ```http://mysite.com/auth/login/SERVICE```. Available services are ```github```, ```facebook```, ```twitter```, and ```google```. Links to each are included in ```login.blade.php```.

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