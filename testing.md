## Testing
* `cd laravel-5-boilerplate/`
* `composer validate`
* `composer phpunit`
* `composer coverage-text`
* `yarn check`        # just accept typical errors in vendor libs :( Yarn not yet supported in node v10.0.0
* `npm run test`
* `npm run develop`   # or production, etc.
* `phpcs --standard=PSR2 -n app`  # Better: edit PSR2, lineLength in ruleset.xml
* `phpcs --standard=PSR2 app | grep -v 'Line exceeds'`
* * `phpcbf --standard=PSR2 -n app`  # to fix any / some warnings
* `php artisan sniff -n`
* `eslint resources/`
* `jshint resources/`
* `jscs resources/`      # jscs is being deprecated
* `sass-lint`
* `find resources/ -name *.scss | xargs stylelint` # zsh: `style-lint resources/**/*.scss`

Optional: `npm i -g prettier`   # details at https://prettier.io/ 

### Login
Login with *user@user.com* / *secret*
Accounts are in database/seeds/Auth/UserTableSeeder.php

### Notice
If you have upgraded to Node v10.0.0, note that Yarn is not
yet working in April, 2018. By now, it should be upgraded.
Until then, use npm.
