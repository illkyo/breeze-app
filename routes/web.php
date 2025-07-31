<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Job;
use App\Models\Ferry;
use App\Models\Room;
use App\Models\Activity;


Route::get('/', function () {
    return view('home', [
        'greeting' => 'Yo',
        'name' => 'John'
        ]
    );
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->simplePaginate(2);
    return view('jobs', ['jobs' => $jobs]);
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('job', ['job' => $job, 'id' => $id]);
});

Route::get('/ferries', function () {
    return view('ferries', ['ferries' => Ferry::all()]);
});

Route::get('/ferries/{id}', function ($id) {
    $ferry = Ferry::find($id);
    return view('ferry', ['ferry' => $ferry, 'id' => $id]);
});

Route::get('/rooms', function () {
    return view('rooms', ['rooms' => Room::all()]);
});

Route::get('/rooms/{id}', function ($id) {
    $room = Room::find($id);
    return view('room', ['room' => $room, 'id' => $id]);
});

Route::get('/activities', function () {
    return view('activities', ['activities' => Activity::all()]);
});

Route::get('/activities/{id}', function ($id) {
    $activity = Activity::find($id);
    return view('activity', ['activity' => $activity, 'id' => $id]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
