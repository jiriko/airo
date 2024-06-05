<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\Finder\Finder;

$routeFiles = Finder::create()
    ->files()
    ->in(app_path())
    ->name('routes.php')
    ->getIterator();

foreach ($routeFiles as $file) {
    Route::group([
        'middleware' => 'api',
    ], $file);
}
