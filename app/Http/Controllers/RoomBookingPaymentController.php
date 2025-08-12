<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomBookingPaymentController extends Controller
{
    protected $ticketInfo;

    public function __construct()
    {
        $this->ticketInfo = session()->get('ticket_info');
    }

    public function create(Request $request, Room $room) {
        if ($room->id === $this->ticketInfo['room_id']) {
            return view('room-bookings.payment.gateway', ['room' => $room]);
        }
        abort(403);
    }

    public function store(Request $request, Room $room) {
        $roomBooking = RoomBooking::create([
            'room_id' => $this->ticketInfo['room_id'],
            'visitor_id' => Auth::id(),
            'visitor_count' => $this->ticketInfo['visitor_count'],
            'total_price' => $this->ticketInfo['total_price']
        ]);

        $room->update([
            'booked' => true
        ]);
        
        return redirect()->route('room.payment.success', ['roomBooking' => $roomBooking]);
    }

    public function success(Room $room, RoomBooking $roomBooking) {
        session()->forget('ticket_info');
        return view('room-bookings.payment.success', ['roomBooking' => $roomBooking]);
    }

    public function cancel(Room $room) {
        session()->forget('ticket_info');
        return view('room-bookings.payment.cancel', ['room' => $room]);
    }
}
