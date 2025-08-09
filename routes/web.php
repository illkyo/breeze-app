<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\FerryController;
use App\Http\Controllers\RoomController;

Route::get('test', function() {
    \Illuminate\Support\Facades\Mail::to('John@gmail.com')->send(new \App\Mail\JobPosted());
    return 'Sent!';
});

Route::view('/', 'home', [
    'greeting' => 'Yo',
    'name' => 'John'
]);

Route::view('/contact', 'contact');

Route::controller(JobController::class)->group(function () {
    Route::get('/jobs', 'index');
    Route::get('/jobs/create', 'create');
    Route::get('/jobs/{job}', 'show');
    Route::post('/jobs', 'store')->middleware('auth');
    Route::get('/jobs/{job}/edit', 'edit')->middleware('auth')->can('edit-job', 'job');
    Route::patch('/jobs/{job}', 'update')->middleware('auth')->can('edit-job', 'job');
    Route::delete('/jobs/{job}', 'delete')->middleware('auth')->can('destroy-job', 'job');
});

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'delete']);

Route::controller(FerryController::class)->group(function () {
    Route::get('/ferries', 'index');
    Route::get('/ferries/create', 'create')->middleware('auth')->can('create-ferry');
    Route::get('/ferries/{ferry}', 'show');
    Route::post('/ferries', 'store')->middleware('auth')->can('create-ferry');
    Route::get('/ferries/{ferry}/edit', 'edit')->middleware('auth')->can('edit-ferry');
    Route::patch('/ferries/{ferry}', 'update')->middleware('auth')->can('edit-ferry');
    Route::delete('/ferries/{ferry}', 'delete')->middleware('auth')->can('delete-ferry');
});

Route::controller(RoomController::class)->group(function () {
    Route::get('/rooms', 'index');
    Route::get('/rooms/create', 'create')->middleware('auth')->can('create-room');
    Route::get('/rooms/{room}', 'show');
    Route::post('/rooms', 'store')->middleware('auth')->can('create-room');
    Route::get('/rooms/{room}/edit', 'edit')->middleware('auth')->can('edit-room');
    Route::patch('/rooms/{room}', 'update')->middleware('auth')->can('edit-room');
    Route::delete('/rooms/{room}', 'delete')->middleware('auth')->can('delete-room');
});

Route::controller(ActivityController::class)->group(function () {
    Route::get('/activities', 'index');
    Route::get('/activities/create', 'create')->middleware('auth')->can('create-activity');
    Route::get('/activities/{activity}', 'show');
    Route::post('/activities', 'store')->middleware('auth')->can('create-activity');
    Route::get('/activities/{activity}/edit', 'edit')->middleware('auth')->can('edit-activity');
    Route::patch('/activities/{activity}', 'update')->middleware('auth')->can('edit-activity');
    Route::delete('/activities/{activity}', 'delete')->middleware('auth')->can('delete-activity');
});
