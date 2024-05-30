<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return ['Laravel' => app()->version()];
});
Route::get('/l', function () {
    return 'Laravel';
});

// require __DIR__.'/auth.php';
