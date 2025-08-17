<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Posts;
use App\Livewire\User ;
use App\Livewire\AddPost;   
Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

Route::get('/dashboard', Posts::class)->name('dashboard');
Route::get('/users', User::class)->name('users.index');
Route::get('/posts', AddPost::class)->name('posts.index');


});
