<?php

// #fattoamano


Route::get('/', function () {
    return "Hello Admin";
});


Route::get('/dashboard', function () {
    return "Admin dashboard";
});