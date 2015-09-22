## Laravel 5.* Boilerplate (Currently 5.1.17) [Screenshots](http://imgur.com/a/uEKuq)

[![Project Status](http://stillmaintained.com/rappasoft/Laravel-5-Boilerplate.png)](http://stillmaintained.com/rappasoft/Laravel-5-Boilerplate) [![Latest Stable Version](https://poser.pugx.org/rappasoft/laravel-5-boilerplate/v/stable)](https://packagist.org/packages/rappasoft/laravel-5-boilerplate) [![Latest Unstable Version](https://poser.pugx.org/rappasoft/laravel-5-boilerplate/v/unstable)](https://packagist.org/packages/rappasoft/laravel-5-boilerplate)

### Features:

* [Custom Access Control System](#access-control) (Authentication/Users/Roles/Permissions)
    * Register/Login/Logout/Password Reset
    * Third party login (Github/Facebook/Twitter/Google)
    * Account Confirmation By E-mail
    * Resend Confirmation E-mail
    * Login Throttling
    * Administrator Management
        * User Index
        * Activate/Deactivate Users
        * Soft & Permanently Delete Users
        * Ban Users
        * Resend User Confirmation E-mails
        * Change Users Password
        * Create/Manage Roles
        * Create/Manage Permissions
        * Create/Manage Permission Groups
        * Manage Users Roles/Permissions
* Default Responsive Layout
* Frontend and Backend Controllers
* User Dashboard
* Administration Dashboard with [Admin LTE](https://almsaeedstudio.com/) Theme
* Namespaced Routes
* Form/HTML Facades Included
* Default Forms Converted to Form Helper Methods
* Master Layout Files with common sections
* Laravel Elixir 3.0
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
* [PHP to Javascript Transformer](https://github.com/laracasts/PHP-Vars-To-Js-Transformer) - [Notes](#javascript-notes)
* [ARCANEDEV Log Viewer](https://github.com/ARCANEDEV/LogViewer)
* Localization to English, Italian, Portuguese (Brazil), and Swedish. (So far)
* Frontend/Backend Language Picker Menu
* Standards
    * Clean Controllers
    * Repository/Contract Implementations
    * Request Classes
    * Events/Handlers
    * Entire application split between frontend/backend
    * Localization Throughout
* [Changelog](#changelog)

### Installation:

- `composer install`
- `npm install`
- Create .env file (example included)
- `php artisan key:generate`
- `php artisan migrate`
- Set administrator info in UserTableSeeder.php
- `php artisan db:seed`
- run `gulp` or `gulp watch` (Install gulp (sudo npm install -g gulp) if needed)

<a name="access-control"/>
## Access Control System
* Configuration
    * [Config File](#config_file)
    * [Route Middleware](#route_middleware)
    * [Create Middleware](#creating_middleware)
    * [Blade Extensions](#blade_extensions)

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
 * PermissionGroup model used by Access to create permissions groups.
 */
access.group

/*
 * Permissions table used by Access to save permissions to the database.
 */
access.permissions_group_table

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
* Table that specifies if one permission is dependent on another.
* For example in order for a user to have the edit-user permission they also need the view-backend permission.
*/
access.permission_dependencies_table

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
 * Whether a role must contain at least one permission, or can be used standalone as a label
 */
access.roles.role_must_contain_permission
```

<a name="route_middleware"/>
### Applying the Route Middleware

Included route middleware let you authorize by either a role or permission:

```php
Route::group(['middleware' => 'access.routeNeedsPermission:view-backend', function()
{
    Route::group(['prefix' => 'access'], function ()
    	{
    		/*User Management*/
    		Route::resource('users', 'Backend\Access\UserController');
    	});
});
```

The following middleware ships with the boilerplate:

- access.routeNeedsRole
- access.routeNeedsPermission

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
	 * This also has a wrapper function called hasPermission which takes the same arguments
	 * @param string $permission.
	 * @return bool
*/
Access::can($permission);

/**
	 * Check an array of permissions and whether or not all are required to continue
	 * This also has a wrapper function called hasPermissions which takes the same arguments
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
$user->hasPermission($permission); //Wrapper function for can()
$user->hasPermissions($permissions, $needsAll); //Wrapper function for canMultiple()
```

<a name="blade_extensions"/>
### Blade Extensions

**Note: The blade syntax for permissions does not support hyphens, only underscores. Use the access helper to check in those cases: access()->has('this-permission') **

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

More will be available in the future.

You can add more extensions by editing app/Services/Blade/Access/AccessBladeExtender.php

## Socialite

To configure socialite, add your credentials to your .env file. The redirects must follow the convention ```http://mysite.com/auth/login/SERVICE```. Available services are ```github```, ```facebook```, ```twitter```, and ```google```. Links to each are included in ```login.blade.php```.

If you are getting a ```cURL error 60``` on localhost, follow [these directions](http://stackoverflow.com/questions/28635295/laravel-socialite-testing-on-localhost-ssl-certificate-issue).

<a name="javascript-notes"/>
## PHP to Javascript Transformer

The Laracast PHP to Javascript Transformer is included in this project.
The config file is published as ```config/javascript.php```

By default the javascript variables are binded to frontend.layouts.master view file, so you can bind javascript to any method in any frontend controller.

If you need binding available in both frontend and backend controllers you should make a super master layout, and use the frontend/backend master layouts as children. After that you can specify that layout in the ```javascript.bind_js_vars_to_this_view``` config option.

A ```javascript()``` helper has been added globally so you do not have to include any files in your controllers, you may just do:

```
javascript()->put([
	'test' => 'it works!'
]);
```

There is an example in ```FrontendController@index``` and is printed out in ```frontend.index```
    
## Troubleshooting

If for any reason something goes wrong, try each of the following:

Delete the `composer.lock` file

Run the `dumpautoload` command

       $ composer dumpautoload -o
       
If the above fails to fix, and the command line is referencing errors in `compiled.php`, do the following:
       
Delete the `storage/framework/compiled.php` file
       
**If all of the above don't work please [report here](https://github.com/rappasoft/Laravel-5-Boilerplate/issues).**

<a name="changelog"/>
## Changelog

###1.4.2
```
- Added Swedish language pack authored by Daniel Blomdahl (@blomdahldaniel)
```

###1.4.1
```
- Updated Italian language pack for 1.4 release.
```

###1.4
```
- Created new Access Control Library
- Started Changelog
```