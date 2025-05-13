<?php

use App\Livewire\Pages\FollowerList;
use App\Livewire\Pages\Home;
use App\Livewire\Pages\Notifications;
use App\Livewire\Pages\Profile;
use App\Livewire\Pages\Tweet;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Number;

Route::get('/', Home::class)->name('home');
Route::get('/profile/{user:username}', Profile::class)->name('profile.show');

// I want to make sure email verification is required for all routes
// except for the home page and the profile page using the ensureEmailIsVerified middleware
Route::middleware(['auth:sanctum',
config('jetstream.auth_session'),
'verified'])->group(function () {
    Route::get('/tweet/{tweet:uuid}', Tweet::class)->name('tweet.show');
    Route::get('/notifications', Notifications::class)->name('notifications');
    Route::get('/follower/list', FollowerList::class)->name('follower.list');
});
// Route::middleware('auth')->group(function () {
//     Route::get('/tweet/{tweet:uuid}', Tweet::class)->name('tweet.show');
//     Route::get('/notifications', Notifications::class)->name('notifications');
//     Route::get('/follower/list', FollowerList::class)->name('follower.list');
// });
