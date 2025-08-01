<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Job;
use App\Models\Ferry;
use App\Models\Room;
use App\Models\Activity;
use App\Enums\Type;
use Illuminate\Validation\Rule;


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
    $jobs = Job::with('employer')->latest()->simplePaginate(2);
    return view('jobs.index', ['jobs' => $jobs]);
});

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('jobs.show', ['job' => $job, 'id' => $id]);
});

Route::post('/jobs', function () {
    request()->validate([
        'title' => ['required', 'min:5'],
        'salary' => ['required']
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1,
    ]);

    return redirect('/jobs');
});

Route::get('/ferries', function () {
    return view('ferries.index', ['ferries' => Ferry::all()]);
});

Route::get('/ferries/create', function () {
    return view('ferries.create');
});

Route::get('/ferries/{id}', function ($id) {
    $ferry = Ferry::find($id);
    return view('ferries.show', ['ferry' => $ferry, 'id' => $id]);
});

Route::post('/ferries', function () {
    request()->validate([
        'name' => ['required', 'string', 'max:255', 'unique:ferries'],
        'price' => ['required', 'decimal:0,2', 'min:5', 'max:999'],
        'capacity' => ['required', 'integer', 'min:8', 'max:9999']
    ]);

    Ferry::create([
        'name' => request('name'),
        'price' => request('price'),
        'capacity' => request('capacity'),
    ]);


    return redirect('/ferries');
});

Route::get('/rooms', function () {
    return view('rooms.index', ['rooms' => Room::all()]);
});

Route::get('/rooms/create', function () {
    return view('rooms.create');
});

Route::get('/rooms/{id}', function ($id) {
    $room = Room::find($id);
    return view('rooms.show', ['room' => $room, 'id' => $id]);
});

Route::post('/rooms', function () {
    request()->validate([
        'number' => ['required', 'numeric', 'digits:2', 'min:0', 'max:99'],
        'floor' => ['required', 'numeric', 'digits:2', 'min:0', 'max:99'],
        'code' => ['required', 'numeric', 'min:0000', 'max:9999', 'unique:rooms'],
        'price' => ['required', 'decimal:0,2', 'min:0', 'max:9999']
    ]);

    Room::create([
        'code' => request('code'),
        'price' => request('price')
    ]);

    return redirect('/rooms');
});

Route::get('/activities', function () {
    return view('activities.index', ['activities' => Activity::all()]);
});

Route::get('/activities/create', function () {
    return view('activities.create');
});

Route::get('/activities/{id}', function ($id) {
    $activity = Activity::find($id);
    return view('activities.show', ['activity' => $activity, 'id' => $id]);
});

Route::post('/activities', function () {
    request()->validate([
        'name' => ['required', 'string', 'max:255', 'unique:activities'],
        'price' => ['required', 'decimal:0,2', 'min:5', 'max:999'],
        'type' => ['required', Rule::enum(Type::class)]
    ]);

    Activity::create([
        'name' => request('name'),
        'price' => request('price'),
        'type' => request('type')
    ]);

    return redirect('/activities');
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
