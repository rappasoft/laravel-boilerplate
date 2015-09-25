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
        * Permission Dependencies - [Notes](#permission-dependencies)
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
* Localization to English, Italian, Portuguese (Brazil), Russian, and Swedish. (So far)
* Frontend/Backend Language Picker Menu
* [Gravatar](https://github.com/creativeorange/gravatar)
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

Access comes with @blade extensions to help you show and hide data by role or permission without clogging up your code with unwanted if statements:

### @role

Accepts a single Role Name or ID

```php
@role('User')
    This content will only show if the authenticated user has the `User` role.
@endauth

@role(1)
    This content will only show if the authenticated user has the role with an ID of `1`.
@endauth
```

### @roles

Accepts an array of Role Names or IDs

```php
@roles(['Administrator', 'User'])
    This content will only show if the authenticated user has the `Administrator` role OR the `User` role.
@endauth

@roles([1, 2])
    This content will only show if the authenticated user has the role with ID of `1` OR `2`.
@endauth
```

### @needsroles

Accepts an array of roles or role IDs and only returns true if the user has all roles provided.

```php
@needsroles(['Administrator', 'User'])
    This content will only show if the authenticated user has BOTH the `Administrator` role AND the `User` role.
@endauth

@needsroles([1, 2])
    This content will only show if the authenticated user has BOTH roles with ID's of `1` AND `2`.
@endauth
```

### @permission

Accepts a single Permission Name or ID

```php
@permission('view-backend')
    This content will only show if the authenticated user has the `view-backend` permission.
@endauth

@permission(1)
    This content will only show if the authenticated user permission with an ID of `1`.
@endauth
```

### @permissions

Accepts an array of Permission Names or IDs

```php
@permissions(['view-backend', 'view-some-content'])
    This content will only show if the authenticated user has the `view-backend` permission OR the `view-some-content` permission.
@endauth

@permissions([1, 2])
    This content will only show if the authenticated user has the permission with ID of `1` OR `2`.
@endauth
```

### @needspermissions

Accepts an array of permissions or permission IDs and only returns true if the user has all permissions provided.

```php
@needspermissions(['view-backend', 'view-some-content'])
    This content will only show if the authenticated user has BOTH the `view-backend` permission AND the `view-some-content` permission.
@endauth

@needspermissions([1, 2])
    This content will only show if the authenticated user has BOTH permissions with ID's of `1` AND `2`.
@endauth
```

If you want to show or hide a specific section you can do so in your layout files the same way:

```php
@role('User')
    @section('special_content')
@endauth

@permission('can_view_this_content')
    @section('special_content')
@endauth
```

You can add more extensions by appending to App\Providers\AccessServiceProvider@registerBladeExtensions

<a name="permission-dependencies"/>
## Permission Dependencies

The permission dependencies section allows you to tell the system that one permission is dependent on one or more permissions.

For example: If the user has the create-user permission, than they also need the view-backend and view-access-management permissions. Otherwise they will never be able to get to the create user screen. So create-user is dependent on view-backend and view-access-management.

You can specify which permissions are dependent on others in each permissions dependency section.

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

###1.5.6
```
- Blade extension overhaul.
  Removed old blade functions and replaced with native blade directives.
  NEW: role, roles, needsroles
  NEW: permission, permissions, needspermissions
  
  See documentation for details.
```

###1.5.5
```
- Fixed user being able to login with unconfirmed account by resetting
  password, by overriding default password reset function to check
  if user is confirmed.
```

###1.5.4
```
- The people spoke. Removed visual installer.
```

###1.5.3
```
- Removed key generator from installer as it should be done beforehand or creates error.
```

###1.5.2
```
- Russian translation pack by @Sogl
```

###1.5.1
```
- Implemented Gravatar plugin
```

###1.5
```
- Added a visual installer that will run all of the installation commands through
  a series of screens. Good for users installing application on servers without
  composer/SSH access.

  Checks dependencies, folder permissions, creates keys, migrates, seeds, etc.
```

###1.4.4
```
- Added a section to permissions called Permission Dependencies,
  where you can specify that the use of one permission can be dependent
  on the use or one or more permissions. See Permission Dependencies
  section of read me.
```

###1.4.3
```
- Fixed Swedish backend welcome message.
- Altered active menu on sidebar to keep menu open when navigating through links in dropdown.
- by Daniel Blomdahl (@blomdahldaniel)
```

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