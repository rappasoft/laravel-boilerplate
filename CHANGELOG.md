# Changelog
All notable changes to this project will be documented in this file.

## [Unreleased]

## [6.0.4] - 2020-04-09

### Changed

- Fixed typo in translation file
- Dependency updates

## [6.0.3] - 2020-02-17

### Changed

- Update to Laravel commit: c78a1d8184f00f8270d8a135cc21590837b6bfbd
- Fix log viewer error
- Rename include_route_files to include_files_in_folder
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
- Added facade/ignition-self-diagnosis to for useful checklist of things that could get fixed when encountering an error
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

[Unreleased]: https://github.com/rappasoft/laravel-boilerplate/compare/v6.0.4...development
[6.0.4]: https://github.com/rappasoft/laravel-boilerplate/compare/v6.0.3...v6.0.4
[6.0.3]: https://github.com/rappasoft/laravel-boilerplate/compare/v6.0.2...v6.0.3
[6.0.2]: https://github.com/rappasoft/laravel-boilerplate/compare/v6.0.1...v6.0.2
[6.0.1]: https://github.com/rappasoft/laravel-boilerplate/compare/v6.0.0...v6.0.1
[6.0.0]: https://github.com/rappasoft/laravel-boilerplate/compare/v5.3.8...v6.0.0
[5.3.8]: https://github.com/rappasoft/laravel-boilerplate/compare/v5.3.7...v5.3.8
