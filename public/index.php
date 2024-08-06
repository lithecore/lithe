<?php

/*
|--------------------------------------------------------------------------
| Lithe Core
|--------------------------------------------------------------------------
|
| This file is the main entry point for the Lithe framework.
| It loads dependencies, configurations, and starts the application.
|
*/

use Lithe\Support\import;

require __DIR__ . '/../vendor/autoload.php';

define('PROJECT_ROOT', __DIR__ . '/../');

/*
|--------------------------------------------------------------------------
| Load the Database Configuration
|--------------------------------------------------------------------------
|
| Load the database configuration required to establish the connection
| with the database used by the application.
|
*/

define('DB_CONNECTION', require_once  __DIR__ . '/../src/database/config/database.php');

/*
|--------------------------------------------------------------------------
| Load Models
|--------------------------------------------------------------------------
|
| Include all model files present in the models directory,
| allowing model classes to be available throughout the application.
|
*/

import::dir(__DIR__ . '/../src/models')->files();

/*
|--------------------------------------------------------------------------
| Load Middleware
|--------------------------------------------------------------------------
|
| Include all middleware files present in the middleware directory,
| allowing middleware to be available throughout the application.
|
*/

import::dir(__DIR__ . '/../src/Http/Middleware')->files();

/*
|--------------------------------------------------------------------------
| Load Controllers
|--------------------------------------------------------------------------
|
| Include all controller files present in the controllers directory,
| allowing controller classes to be available throughout the application.
|
*/

import::dir(__DIR__ . '/../src/Http/Controllers')->files();

/*
|--------------------------------------------------------------------------
| Load Modules from lithe_modules
|--------------------------------------------------------------------------
|
| Include all module files from the lithe_modules directory,
| allowing additional modules to be available throughout the application.
|
*/

Import::dir(__DIR__ . '/../.lithe_modules')->files();

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| After loading all dependencies and configurations, the application is started
| by calling the "listen" method of the \lithe\App class. This method handles the
| incoming request and sends the response back to the client's browser.
|
*/

require __DIR__ . '/../src/App.php';
