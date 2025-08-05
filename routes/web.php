<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\FerryController;
use App\Http\Controllers\RoomController;

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
Route::post('/logout', [SessionController::class, 'destroy']);

Route::controller(FerryController::class)->group(function () {
    Route::get('/ferries', 'index');
    Route::get('/ferries/create', 'create');
    Route::get('/ferries/{ferry}', 'show');
    Route::post('/ferries', 'store');
    Route::get('/ferries/{ferry}/edit', 'edit');
    Route::patch('/ferries/{ferry}', 'update');
    Route::delete('/ferries/{ferry}', 'delete');
});

Route::controller(RoomController::class)->group(function () {
    Route::get('/rooms', 'index');
    Route::get('/rooms/create', 'create');
    Route::get('/rooms/{room}', 'show');
    Route::post('/rooms', 'store');
    Route::get('/rooms/{room}/edit', 'edit');
    Route::patch('/rooms/{room}', 'update');
    Route::delete('/rooms/{room}', 'delete');
});

Route::controller(ActivityController::class)->group(function () {
    Route::get('/activities', 'index');
    Route::get('/activities/create', 'create');
    Route::get('/activities/{activity}', 'show');
    Route::post('/activities', 'store');
    Route::get('/activities/{activity}/edit', 'edit');
    Route::patch('/activities/{activity}', 'update');
    Route::delete('/activities/{activity}', 'delete');
});
