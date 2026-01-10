<?php

use Illuminate\Support\Facades\Route;


// HOME / LANDING PAGE
Route::get('/', function () {
    return view('welcome');
});

// USER PAGES
Route::get('/dashboard', function () {
    return view('users.dashboard');
});

Route::get('/contents', function () {
    return view('users.contents');
});

Route::get('/feed', function () {
    return view('users.feed');
});

Route::get('/newpost', function () {
    return view('users.newpost');
});

Route::get('/profile', function () {
    return view('users.profile');
});

// ADMIN PAGES
Route::get('/adashboard', function () {
    return view('admins.dashboard');
});

Route::get('/acontents', function () {
    return view('admins.contents');
});

Route::get('/anewpost', function () {
    return view('admins.newpost');
});

Route::get('/aprofile', function () {
    return view('admins.profile');
});

Route::get('/apages', function () {
    return view('admins.pages');
});

Route::get('/aactivitylog', function () {
    return view('admins.activitylog');
});
