<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\{
    showTweets
};
use App\Http\Livewire\user\UploadPhoto;

Route::get('/tweets', showTweets::class)->middleware('auth')->name('tweets.index');
Route::get('/upload', UploadPhoto::class)->middleware('auth')->name('upload.user.photo');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
