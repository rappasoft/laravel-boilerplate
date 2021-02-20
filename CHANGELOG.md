# Changelog
All notable changes to this project will be documented in this file.

## [Unreleased]

## [8.0.3] - 2021-02-20

### Added

- Added pt_PT language
- Added RO language
- Added missing cors middleware

### Changed

- Updated composer
- Updated yarn
- Update to Laravel commit: f0de9fd9967d4e1b4427d8458bf8983bc2cde201
- Upgrade to Laravel Mix 6
- Fixed 2fa/admin issue (https://github.com/rappasoft/laravel-boilerplate/pull/1488)
- Update pt_BR language
- Updated failed_jobs table (https://github.com/rappasoft/laravel-boilerplate/pull/1503, https://github.com/rappasoft/laravel-boilerplate/issues/1501)

### Removed

- Google Analytics tag and config since it's done differently since that was added

## [8.0.2] - 2020-12-15

### Changed

- Removed the base controller dependency from all controllers as it's not needed for any of the current functionality and is just more overhead for no reason.
- Move verification middleware to routes file
- Update phpunit.xml file to current format

## [8.0.1] - 2020-12-12

## Changed

- Update dependencies
- Update to laravel commit: ddb26fbc504cd64fb1b89511773aa8d03c758c6d
- Update exception handling to match laravel
- Added sail docker file
- Update FA language
- Add 'main' branch to workflow

## [8.0.0] - 2020-10-21

## Added

- Added back roave/security-advisories
- Added new database factories
- Added Polish languages
- Added BladeServiceProvider with @captcha directive
- Added Captcha rule
- Added Captcha configs to boilerplate configs

## Changed

- Update livewire tables to 0.3
- Updated users/roles table to use new tables
- Moved livewire components into Frontend/Backend and updated calls
- Removed type partial and just merged into table format
- Update PHP to 7.3
- Update Guzzle to v7
- Update Laravel to v8
- Update Socialite to v5
- Update Laravel UI to v3
- Update Lockout to v3
- Update Breadcrumbs to v2
- Update PHP Pretty Printer to v0.29
- Update Ignition to v2.3.6
- Update Collision to v5
- Condense .env.example
- Updated tests to use new factories
- Updated seeders and factories to be namespaced
- Follow Laravel upgrade guide for v8 and change all the needed files
- Update to Laravel commit: 8d3ca07c4cff6d36593625ee4b34e19ce2dba15b
- Update CS/FR/IN languages
- Sort locale dropdown by language not array key
- Modified login/register controllers to use new Captcha rule

## Removed

- Remove recaptcha

## [7.2.5] - 2020-08-06

## Changed

- Min Livewire to 1.3
- Update Italian Translations
- Update Indonesia Translations
- Update Hebrew Translations
- Make tests compatible with any locale
- Make backend sidebar logs link a dropdown

## [7.2.4] - 2020-07-29

## Added

- Added GitAds to README, putting here for transparency.
- Ported over validation for default language files from 6.x BP
- Added Czech language files

## Changed

- Changed default gravatar to be more generic.
- Use Laravel bootable traits with UUID trait.

## [7.2.3] - 2020-07-26

## Changed

- Update Laravel, proxy, and mockery min versions

## [7.2.2] - 2020-07-26

## Changed

- Update to Laravel security patch

## [7.2.1] - 2020-07-26

## Changed

- Update for Laravel security patch

## [7.2.0] - 2020-07-25

## Added

- Added gravatar to frontend navbar
- Added breadcrumbs on the frontend on pages that it would benefit on. Added a config item to be able to turn it off. If there are no breadcrumbs for a page the bar won't show.
- Added SuperAdminCheck, AdminCheck and UserCheck middleware
- Added scopes for user types
- Added GET form component
- Added back ARCANEDEV/LogViewer
- Add container to all frontend views
- Publish laravel error pages

## Changed

- Update to Laravel commit: 791c87a80d1c5eebd75e1bf499f86899d6b2b26f
- Change alpine.js @click and @change methods to use x-on/x-change to not interfere with Vue
- Default old request for user edit page
- Wrapped backend breadcrumbs in conditional so if there are no breadcrumbs for that page the just don't show.
- Allow UserTypeCheck to accept multiple types
- Full width frontend messages partial
- Prefix all admin permissions with admin. and refactor.
- Italian language updates

## Removed

- Removed an un-needed redirect from LoginController
- Remove container from frontend master view

## [7.1.1] - 2020-07-12

## Added

- Added method and scope to get users by type
- Added headerActions to frontend card component

## Changed

- Be explicit when showing type labels in the backend
- Moved frontend user routes to own file
- Change default password expiration days to 180
- Change default 'change email' status to true

## [7.1.0] - 2020-07-07

This release completely changes the way the previous authentication system worked. I probably went through 5 different iterations of a multi auth/guard architecture, but it became too messy and there are too many variables when dealing with different user tables and multiple different sessions. The solution I came up with I think serves the same purpose without the complexities. There is a new `type` column on the users table that is a predefined list of user types that your system supports, and a middleware to lock parts down to different types. The roles and permissions also have a corresponding `type` column to organize what roles and permissions are available to what user types, and the backend will only let you choose from the correct ones. For example: Any user of type `admin` can access the admin area, but they cannot do anything without a corresponding role or permission to a given section. This will let you structure your applications better if the use multiple different user types that have access to different areas, without using different guards, all with one users table and one login form.

## Added

- Add user type check middleware
- User accounts no longer require roles
- The roles and permissions a user can have are now constrained by their type
- Change isAdmin to hasAllAccess, because isAdmin now repurposed to check type
- Update UserService to reflect type, no longer assign default role to users
- Delete view backend permission as all users of admin type can view the backend.
- Add type column to user/role tables
- Update the global gate to check hasAllAccess instead of isAdmin, since now an admin may not have all access
- Remove redirect and default user role from boilerplate config
- Update factories and seeders
- When creating a user from the backend, a new type dropdown is available, and will show the correct roles/permissions for that type to be able to choose from and validate on the backend
- Update all old instances of isAdmin to hasAllAccess, and use new isAdmin where applicable
- Frontend user dashboard now limited to user type
- When creating/editing a role, only the permissions related to the type will be available to choose from
- Add spatie/activitylog
- Add events for roles and users
- Add role event subscriber
- Boolean for whether or not 2FA is required for admin
- Added Terms & Conditions checkbox with validation to registration
- Added dummy Terms & Conditions page
- Added UUID trait back if needed
- Added ability to only allow users to be assigned roles from the backend and not additional permissions

## Changed

- Change password histories to be polymorphic
- Make alert banners shorter vertically
- Refactor system to use user types to define who can view certain areas, then use roles and permissions from there to narrow down further.
- Update all tests
- Require 2FA to be enabled to access admin
- Change 2FA restricted redirect to enable 2FA page
- Automatically load roles and permissions for users and permissions for role models
- Move user event namespace
- Move HomeController out of auth domain
- Change account tabs from vertical to normal because they respond better

## Removed

- Removed accountant package

## [7.0.3] - 2020-07-01

## Changed

- Updated breadcrumbs to be more readable
- Update link utility to allow slot
- Add note for Gate::after in AuthServiceProvider if wanted
- Change title bar delimiter from - to |
- Update yarn and composer

## [7.0.2] - 2020-06-28

## Changed

- Revert UserRoleSeeder change

## [7.0.1] - 2020-06-28

## Added

- Missing captcha functionality for login/register

## Changed

- Seed second role in production not just testing

## Removed

- Duplicate user tests
- Terser in mix file

## [7.0.0] - 2020-06-26

Started from scratch with a blank Laravel 7.* installation. This release is not an upgrade, and for that reason it is impossible to document all the changes that occurred. This version should be used for new projects.

## [6.0.3] - 2020-02-17

### Changed

- Update to Laravel commit: c78a1d8184f00f8270d8a135cc21590837b6bfbd
- Fix log viewer error
- Rename includeRouteFiles to includeFilesInFolder
- Update form-control-file class

## [6.0.2] - 2020-01-01

### Changed

- Updated to Laravel commit: 25c36eb592c57e075acc32a12703005f67c4ec10
- Updated ignition
- Update laravel min version
- Make avatar field on social_accounts text to account for Google
- Fix user dropdown
- Package updates

## [6.0.1] - 2019-10-22

### Added

- Added facade/ignition-code-editor to be able to edit files right from ignition screens
- Added facade/ignition-self-diagnosis to for a useful checklist of things that could get fixed when encountering an error
- Added facade/ignition-tinker-tab which adds a tinker tab in ignition which uses laravel tinker behind the scenes to be able to use tinker right from error screens

### Changed

- Update to Laravel Commit 953b488b8bb681d4d6e12227645c7c1b7ac26935 (Without password confirmation stuff)
- Fix socialite bug (https://github.com/rappasoft/laravel-boilerplate/issues/1284)

## [6.0.0] - 2019-09-08
### Added
- Added captcha to login request
- Added server variable that denotes whether or not the application is currently running tests, false by default but enabled by phpunit.xml
- Added security headers middleware with everything disabled by default
- Added Mail globals to .env.example
- Added Email validation to contact form
- Added the https://github.com/404labfr/laravel-impersonate package to replace my home grown impersonate feature with much stronger functionality

### Changed
- Upgrade to Laravel 6.0
- Update to laravel commit: 31394de4d736c171d40bb03d50313c60b0e4af38
- Enabled debugbar models
- Converted “Demo Mode” to “Read Only Mode” to be more generic
- Update package versions
- .env.example Laravel version
- Hide sidebar ‘System’ label unless admin
- Added blade include snippets instead of attributes on the model, if they returned any sort of html
- Don’t preinstall predis or force redis as any driver
- Condense language dropdown padding
- Refactor socialite buttons to php includes
- Add array of paths that can not be accessed as GET requests in read only mode
- Update base repository and refactor anything that broke

### Removed
- Removed unused avatar images from CoreUI
- Removed dashboard as parent breadcrumb for certain sections
- Removed unused key in app.php
- Removed default string length of 191 because everyone should be above MySQL 5.7.7 at this point.
- Removed all html being returned from attribute classes in favor of blade include snippets
- Removed laravel dump server, laravel tinker, laravel self-diagnosis from default install
- Removed backend.php config file and just put comment in layout file
- Removed unused helper file
- Removed letrunghieu/active for homegrown one since I’m not waiting for them to update to laravel 6.0
- Removed owen-it/laravel-auditing until it supports Laravel 6.0

## [5.3.8] - 2019-08-21
### Added
- Added Azerbaijan language (https://github.com/rappasoft/laravel-boilerplate/pull/1254)
- Added NIST Password Rules (https://github.com/rappasoft/laravel-boilerplate/pull/1258)

### Changed
- Assign all permissions to the Admin role without the need to explicitly assign the roles/permissions to the user. (https://github.com/rappasoft/laravel-boilerplate/pull/1227)

### Removed
- Removed default Google scopes (https://github.com/rappasoft/laravel-boilerplate/pull/1253/files)
- Removed ChangePassword rule as the new NIST rules cover it

## 5.3.7 - 2019-08-21
### Added
- Actual changelog

### Changed
- Repository name since 6.0 is about to release
- Upgrade to laravel commit bb433725483803a27f21d3b21317072610bc3e9c

## 5.3.6 - 2019-06-28
### Changed
- Update to Laravel commit ebc6f6e2c794b07c6d432483fd654aebf2ffe222
- Update frontend dependencies

## 5.3.5 - 2019-05-03
### Changed
- Fix jQuery vulnerability. 

## 5.3.4 - 2019-04-29
### Added
- Added demo mode that anyone can use to give demos of their application without worrying about users altering data.

## 5.3.3 - 2019-04-28
### Added
- Added shouldDiscoverEvents but default to false
- Add missing tooltip call to plugins.js

### Changed
- Update Dutch language files
- Upgrade to Laravel commit: 3995828c13ddca61dec45b8f9511a669cc90a15c
- Composer update
- Default send confirmation email on new users to off since confirmed is defaulted to on
- Move log viewer links under isAdmin
- Execute SubstituteBindings after LocaleMiddleware

### Fixed
- SESSION_ENCRYPT env wasn’t hooked up to session config
- Fix Google analytics add on
- Fix redis default in env file

## 5.3.2 - 2019-03-31
### Changed
- Replace simple line icons with font awesome
- Update and run php-cs-fixer

## 5.3.1 - 2019-03-31
### Changed
- PR: https://github.com/rappasoft/laravel-boilerplate/pull/1221

## 5.3.0 - 2019-03-30
### Added
- Add new ReportableException class to throw when you want it to be logged, one of the two can be extended to add new exceptions that you either do or do not want logged. Both still redirect with the flash message.
- Added optional captcha to contact form
- Add laravel auditing to certain models, UI is up to person creating the project
- Include redis by default

### Changed
- Upgrade to Laravel 5.8
- Upgrade to phpunit 8.0
- Upgrade to phpunit-results-printer 0.26.1
- Upgrade to log viewer 4.7
- Upgrade to nocaptcha 9.*
- Upgrade to socialite 4.1
- Upgrade to spatie/permission to 2.36
- Upgrade to Laravel Dump Server 1.2
- Upgrade to debugbar 3.2
- Upgrade to ide-helper 2.6
- Upgrade password validation rule to fix ca-cert.json issue
- Upgrade SweetAlert
- Upgrade Bootstrap
- Update to Laravel commit: 3886012c0f3ad5653d9d5138530f3fc4276eaf93
- Use assertStringContainsString instead of assertContains to make all current tests pass
- Laravel 5.8 uses bigIncrements as default for the users table so the foreign keys had to be converted to bigIntegers
- Set resource root in webpack
- Don’t report GeneralException errors
- Replace recaptcha with invisible recaptcha
- Updated single login to use features with AuthenticateMiddleware to work with every driver as well as logout users on other devices
- Change Clear Session button to be driver agnostic, sets a flag that triggers part of the web middleware to force the user to log out
- Load helpers with service provider instead of composer which allows better organization,  give all existing helper files a Helper postfix
- Use casts property on User model and refactor

### Removed
- Remove BladeServiceProvider and register in the boot method of AppServiceProvider as per 5.8 docs
- Remove webpatser/laravel-uuid and convert UUID functions to Laravel 5.8’s built in UUID package from Ramsey
- Remove unneeded laravel-blade directives package
- Remove withInput parameter in GeneralException since it is covered by the dontReport property of the parent class
- Remove Session model because it’s only good for one driver and the user can create it if they need it
- Remove boilerplate html from CoreUI

### Fixed
- Fix yarn tests
- Fix: Socially logged in users get assigned the default role

[Unreleased]: https://github.com/rappasoft/laravel-boilerplate/compare/v8.0.3...development
[8.0.3]: https://github.com/rappasoft/laravel-boilerplate/compare/v8.0.2...v8.0.3
[8.0.2]: https://github.com/rappasoft/laravel-boilerplate/compare/v8.0.1...v8.0.2
[8.0.1]: https://github.com/rappasoft/laravel-boilerplate/compare/v8.0.0...v8.0.1
[8.0.0]: https://github.com/rappasoft/laravel-boilerplate/compare/v7.2.6...v8.0.0
[7.2.6]: https://github.com/rappasoft/laravel-boilerplate/compare/v7.2.5...v7.2.6
[7.2.5]: https://github.com/rappasoft/laravel-boilerplate/compare/v7.2.4...v7.2.5
[7.2.4]: https://github.com/rappasoft/laravel-boilerplate/compare/v7.2.3...v7.2.4
[7.2.3]: https://github.com/rappasoft/laravel-boilerplate/compare/v7.2.2...v7.2.3
[7.2.2]: https://github.com/rappasoft/laravel-boilerplate/compare/v7.2.1...v7.2.2
[7.2.1]: https://github.com/rappasoft/laravel-boilerplate/compare/v7.2.0...v7.2.1
[7.2.0]: https://github.com/rappasoft/laravel-boilerplate/compare/v7.1.1...v7.2.0
[7.1.1]: https://github.com/rappasoft/laravel-boilerplate/compare/v7.1.0...v7.1.1
[7.1.0]: https://github.com/rappasoft/laravel-boilerplate/compare/v7.0.3...v7.1.0
[7.0.3]: https://github.com/rappasoft/laravel-boilerplate/compare/v7.0.2...v7.0.3
[7.0.2]: https://github.com/rappasoft/laravel-boilerplate/compare/v7.0.1...v7.0.2
[7.0.1]: https://github.com/rappasoft/laravel-boilerplate/compare/v7.0.0...v7.0.1
[7.0.0]: https://github.com/rappasoft/laravel-boilerplate/compare/v6.0.3...v7.0.0
[6.0.3]: https://github.com/rappasoft/laravel-boilerplate/compare/v6.0.2...v6.0.3
[6.0.2]: https://github.com/rappasoft/laravel-boilerplate/compare/v6.0.1...v6.0.2
[6.0.1]: https://github.com/rappasoft/laravel-boilerplate/compare/v6.0.0...v6.0.1
[6.0.0]: https://github.com/rappasoft/laravel-boilerplate/compare/v5.3.8...v6.0.0
[5.3.8]: https://github.com/rappasoft/laravel-boilerplate/compare/v5.3.7...v5.3.8
