<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Posts;
use App\Livewire\User ;
use App\Livewire\AddPost;   
use App\Livewire\UsersSystem;
use App\Livewire\BlogSite;



Route::get('/', BlogSite::class)->name('web.index');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

              Route::get('/dashboard', Posts::class)->name('dashboard');



        Route::middleware(['auth:sanctum', 'verified', 'userType:admin'])->group(function () {

                    Route::get('/users', UsersSystem::class)->name('users.index');
        });




              Route::get('/posts', AddPost::class)->name('posts.index');


});
