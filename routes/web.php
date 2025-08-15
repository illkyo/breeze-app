<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasswordResetLinkController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ActivityTicketController;
use App\Http\Controllers\ActivityTicketPaymentController;
use App\Http\Controllers\FerryController;
use App\Http\Controllers\FerryTicketController;
use App\Http\Controllers\FerryTicketPaymentController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomBookingController;
use App\Http\Controllers\RoomBookingPaymentController;
use App\Http\Controllers\TicketController;
use App\Http\Middleware\TicketInfoExists;

Route::get('test', function() {
    \Illuminate\Support\Facades\Mail::to('John@gmail.com')->send(new \App\Mail\JobPosted());
    return 'Sent!';
});

Route::get('/', [HomeController::class, 'index']);

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

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);
    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);
    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store']);
    Route::get('/reset-password/{token}', [PasswordResetController::class, 'create'])->name('password.reset');
    Route::post('/reset-password', [PasswordResetController::class, 'store'])->name('password.update');
});
Route::post('/logout', [SessionController::class, 'delete'])->middleware('auth');

Route::controller(TicketController::class)->group(function () {
    Route::get('/tickets', 'index')->middleware('auth');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index')->middleware('auth')->can('view-users');
    Route::get('/users/create', 'create')->middleware('auth')->can('create-user');
    Route::get('/users/{user}', 'show')->middleware('auth')->can('view-user');
    Route::post('/users', 'store')->middleware('auth')->can('create-user');
    Route::get('/users/{user}/edit', 'edit')->middleware('auth')->can('edit-user');
    Route::patch('/users/{user}', 'update')->middleware('auth')->can('edit-user');
    Route::delete('/users/{user}', 'delete')->middleware('auth')->can('delete-user');
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

Route::controller(ActivityTicketController::class)->group(function () {
    Route::get('/activity-tickets', 'index')->middleware('auth')->can('view-activity-tickets');
    Route::get('/activity-tickets/{activity}/create', 'create')->middleware('auth');
    Route::post('/activity-tickets/{activity}', 'store')->middleware('auth');
    Route::get('/activity-tickets/{activityTicket}', 'show')->middleware('auth')->can('view-activity-ticket', 'activityTicket');
});

Route::controller(ActivityTicketPaymentController::class)->group(function () {
    Route::get('/activity-tickets/{activity}/payment', 'create')->middleware(['auth', TicketInfoExists::class])->name('activity.payment');
    Route::post('/activity-tickets/{activity}/payment', 'store')->middleware(['auth', TicketInfoExists::class]);
    Route::get('/activity-tickets/payment/success/{activityTicket}', 'success')->middleware(['auth', TicketInfoExists::class])->name('activity.payment.success');
    Route::get('/activity-tickets/{activity}/payment/cancel', 'cancel')->middleware(['auth', TicketInfoExists::class])->name('activity.payment.cancel');
});

Route::controller(FerryController::class)->group(function () {
    Route::get('/ferries', 'index');
    Route::get('/ferries/create', 'create')->middleware('auth')->can('create-ferry');
    Route::get('/ferries/{ferry}', 'show');
    Route::post('/ferries', 'store')->middleware('auth')->can('create-ferry');
    Route::get('/ferries/{ferry}/edit', 'edit')->middleware('auth')->can('edit-ferry');
    Route::patch('/ferries/{ferry}', 'update')->middleware('auth')->can('edit-ferry');
    Route::delete('/ferries/{ferry}', 'delete')->middleware('auth')->can('delete-ferry');
});

Route::controller(FerryTicketController::class)->group(function () {
    Route::get('/ferry-tickets', 'index')->middleware('auth')->can('view-ferry-tickets');
    Route::get('/ferry-tickets/{ferry}/create', 'create')->middleware('auth');
    Route::post('/ferry-tickets/{ferry}', 'store')->middleware('auth');
    Route::get('/ferry-tickets/{ferryTicket}', 'show')->middleware('auth')->can('view-ferry-ticket', 'ferryTicket');
});

Route::controller(FerryTicketPaymentController::class)->group(function () {
    Route::get('/ferry-tickets/{ferry}/payment', 'create')->middleware(['auth', TicketInfoExists::class])->name('ferry.payment');
    Route::post('/ferry-tickets/{ferry}/payment', 'store')->middleware(['auth', TicketInfoExists::class]);
    Route::get('/ferry-tickets/payment/success/{ferryTicket}', 'success')->middleware(['auth', TicketInfoExists::class])->name('ferry.payment.success');
    Route::get('/ferry-tickets/{ferry}/payment/cancel', 'cancel')->middleware(['auth', TicketInfoExists::class])->name('ferry.payment.cancel');
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

Route::controller(RoomBookingController::class)->group(function () {
    Route::get('/room-bookings', 'index')->middleware('auth')->can('view-room-bookings');
    Route::get('/room-bookings/{room}/create', 'create')->middleware('auth')->can('book-room', 'room');
    Route::post('/room-bookings/{room}', 'store')->middleware('auth')->can('book-room', 'room');
    Route::get('/room-bookings/{roomBooking}', 'show')->middleware('auth')->can('view-room-booking', 'roomBooking');
});

Route::controller(RoomBookingPaymentController::class)->group(function () {
    Route::get('/room-bookings/{room}/payment', 'create')->middleware(['auth', TicketInfoExists::class])->name('room.payment');
    Route::post('/room-bookings/{room}/payment', 'store')->middleware(['auth', TicketInfoExists::class]);
    Route::get('/room-bookings/payment/success/{roomBooking}', 'success')->middleware(['auth', TicketInfoExists::class])->name('room.payment.success');
    Route::get('/room-bookings/{room}/payment/cancel', 'cancel')->middleware(['auth', TicketInfoExists::class])->name('room.payment.cancel');
});

