<?php

/*
|--------------------------------------------------------------------------
| Composer
|--------------------------------------------------------------------------
|
| Composer also autoloads custom classes within /app/ Folder.
| Classes which are to be called after theme init are locacted
| at the end of the file.
|
 */
require_once 'vendor/autoload.php';


/*
|--------------------------------------------------------------------------
| Config
|--------------------------------------------------------------------------
|
| Here are custom theme constants.
|
 */
$configFolder = glob(__DIR__ . '/app/Config/*.php');
foreach ($configFolder as $configFile) {
	require $configFile;
}

/*
|--------------------------------------------------------------------------
| WordPress Hooks (Actions, Filters)
|--------------------------------------------------------------------------
|
| Hooks are a way for one piece of code to interact/modify
| another piece of code at specific, pre-defined spots. They make up
| the foundation for how plugins and themes interact with WordPress Core,
| but they’re also used extensively by Core itself.
|
 */
$hooksFolder = glob(__DIR__ . '/app/Hooks/*.php');
foreach ($hooksFolder as $hooksFile) {
	require $hooksFile;
}

/*
|--------------------------------------------------------------------------
| Custom Support Functions
|--------------------------------------------------------------------------
|
| Here are custom functions that are to be called upon theme initiation.
| They are mostly used for quick WP modification or as support functions.
|
 */
$supportFolder = glob(__DIR__ . '/app/Support/*.php');
foreach ($supportFolder as $supportFile) {
	require $supportFile;
}


/*
|--------------------------------------------------------------------------
| Timber
|--------------------------------------------------------------------------
|
| Construction of Timber Twigs files with custom location in /app/Views/
| @see https://timber.github.io/docs/
|
 */
new Timber\Timber();
Timber::$dirname = 'app/Views';

/*
|--------------------------------------------------------------------------
| Classes
|--------------------------------------------------------------------------
|
| Here are classes that are to be called after theme initiation.
|
 */

 //new App\Extensions\CustomPostTypes\Example();
//new App\Extensions\Taxonomies\Section();
