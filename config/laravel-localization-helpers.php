<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Folders where to search for lemmas
	|--------------------------------------------------------------------------
	|
	| Localization::Missing will search recursively for lemmas in all php files
	| included in these folders. You can use these keywords :
	| - %APP     : the laravel app folder of your project
	| - %BASE    : the laravel base folder of your project
	| - %PUBLIC  : the laravel public folder of your project
	| - %STORAGE : the laravel storage folder of your project
	| No error or exception is thrown when a folder does not exist.
	|
	*/
    'folders' => array(
        '%BASE/resources/views',
        '%APP/Http/Controllers',
    ),


	/*
	|--------------------------------------------------------------------------
	| Lang file to ignore
	|--------------------------------------------------------------------------
	|
	| These lang files will not be written
	|
	*/
    'ignore_lang_files' => array(
        'validation',
    ),


	/*
	|--------------------------------------------------------------------------
	| Lang folder
	|--------------------------------------------------------------------------
	|
	| You can overwrite where is located your lang folder
	| If null or missing, Localization::Missing will search :
    | - first in app_path() . DIRECTORY_SEPARATOR . 'lang',
    | - then  in base_path() . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'lang',
	|
	*/
    'lang_folder_path' => null,


	/*
	|--------------------------------------------------------------------------
	| Methods or functions to search for
	|--------------------------------------------------------------------------
	|
	| Localization::Missing will search lemmas by using these regular expressions
	| Several regular expressions can be used for a single method or function.
	|
	*/
    'trans_methods' => array(
	    'trans' => array(
	        '@trans\(\s*(\'.*\')\s*(,.*)*\)@U',
	        '@trans\(\s*(".*")\s*(,.*)*\)@U',
	    ),
	    'Lang::Get' => array(
	        '@Lang::Get\(\s*(\'.*\')\s*(,.*)*\)@U',
	        '@Lang::Get\(\s*(".*")\s*(,.*)*\)@U',
	        '@Lang::get\(\s*(\'.*\')\s*(,.*)*\)@U',
	        '@Lang::get\(\s*(".*")\s*(,.*)*\)@U',
	    ),
	    'trans_choice' => array(
	        '@trans_choice\(\s*(\'.*\')\s*,.*\)@U',
	        '@trans_choice\(\s*(".*")\s*,.*\)@U',
	    ),
	    'Lang::choice' => array(
	        '@Lang::choice\(\s*(\'.*\')\s*,.*\)@U',
	        '@Lang::choice\(\s*(".*")\s*,.*\)@U',
	    ),
	    '@lang' => array(
	        '@\@lang\(\s*(\'.*\')\s*(,.*)*\)@U',
	        '@\@lang\(\s*(".*")\s*(,.*)*\)@U',
	    ),
	    '@choice' => array(
			'@\@choice\(\s*(\'.*\')\s*,.*\)@U',
			'@\@choice\(\s*(".*")\s*,.*\)@U',
	    ),
	),


	/*
	|--------------------------------------------------------------------------
	| Keywords for obsolete check
	|--------------------------------------------------------------------------
	|
	| Localization::Missing will search lemmas in existing lang files.
	| Then it searches in all PHP source files.
	| When using dynamic or auto-generated lemmas, you must tell Localization::Missing
	| that there are dynamic because it cannot guess them.
	|
	| Example :
	|   - in PHP blade code : <span>{{{ trans( "message.user.dynamo.$s" ) }}}</span>
	|   - in lang/en.message.php :
	|     - 'user' => array(
	|         'dynamo' => array(
	|           'lastname'  => 'Family name',
	|           'firstname' => 'Name',
	|           'email'     => 'Email address',
	|           ...
	|   Then you can define in this parameter value dynamo for example so that
	|   Localization::Missing will not exclude lastname, firstname and email from
	|   translation files.
	|
	*/
	'never_obsolete_keys' => array(
		'dynamic' ,
		'fields' ,
	),


	/*
	|--------------------------------------------------------------------------
	| Editor
	|--------------------------------------------------------------------------
	|
	| when using option editor, package will use this command to open your files
	|
	*/
	'editor_command_line' => '/Applications/Sublime\\ Text.app/Contents/SharedSupport/bin/subl'

);
