<?php

// $uri = urldecode(
//     parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
// );

// This file allows us to emulate Apache's "mod_rewrite" functionality from the
// built-in PHP web server. This provides a convenient way to test a Laravel
// application without having installed a "real" web server software here.
// if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
//     return false;
// }
// require_once __DIR__.'/public/index.php';

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));


if (file_exists($maintenance = __DIR__ . './storage/framework/maintenance.php')) {
    require $maintenance;
}




require __DIR__ . '/vendor/autoload.php';



$app = require_once __DIR__ . '../bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);
