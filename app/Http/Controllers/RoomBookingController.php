<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Enums\Role;

class RoomBookingController extends Controller
{

    public function index() 
    {
        if (Auth::user()->role === Role::VISITOR) {
            $roomBookings = RoomBooking::where('visitor_id', Auth::id())->with('room')->latest()->get();
        } else {
            $roomBookings = RoomBooking::with('room')->latest()->get();
        }
        return view('room-bookings.index', ['roomBookings' => $roomBookings]);
    }

    public function create(Room $room)
    {
        return view('room-bookings.create', ['room' => $room]);
    }

    public function store(Request $request, Room $room)
    {
        $attributes = $request->validate([
            'visitor_count' => ['required', 'integer', 'min:1', 'max:10'],
            'total_price' => ['required', 'decimal:0,2', 'min:5', 'max:999'],
        ]);
        $attributes['room_id'] = $room->id;
        session(['ticket_info' => $attributes]);

        return redirect()->route('room.payment', ['room' => $room]);
    }


    public function show(RoomBooking $roomBooking)
    {
        return view('room-bookings.show', ['roomBooking' => $roomBooking]);
    }
}
