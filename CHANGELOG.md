# Changelog
All notable changes to this project will be documented in this file.

## [Unreleased]

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

[Unreleased]: https://github.com/rappasoft/laravel-boilerplate/compare/v5.3.7...HEAD
