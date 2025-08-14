<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Ferry;
use App\Models\Room;

class HomeController extends Controller
{
    public function index() {
        $activities = Activity::where('type', 'event')->latest()->take(4)->get();
        $ferries = Ferry::latest()->take(4)->get();
        $rooms = Room::where('booked', 0)->latest()->take(4)->get();
        return view('home', [
            'activities' => $activities,
            'ferries' => $ferries,
            'rooms' => $rooms,
        ]);
    }
}
