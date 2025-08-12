<?php

namespace App\Http\Controllers;

use App\Models\Ferry;
use App\Models\FerryTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FerryTicketPaymentController extends Controller
{
    protected $ticketInfo;

    public function __construct()
    {
        $this->ticketInfo = session()->get('ticket_info');
    }

    public function create(Request $request, Ferry $ferry) {
        if ($ferry->id === $this->ticketInfo['ferry_id']) {
            return view('ferry-tickets.payment.gateway', ['ferry' => $ferry]);
        }
        abort(403);
    }

    public function store(Request $request, Ferry $ferry) {
        $ferryTicket = FerryTicket::create([
            'ferry_id' => $this->ticketInfo['ferry_id'],
            'visitor_id' => Auth::id(),
            'visitor_count' => $this->ticketInfo['visitor_count'],
            'total_price' => $this->ticketInfo['total_price']
        ]);
        return redirect()->route('ferry.payment.success', ['ferryTicket' => $ferryTicket]);
    }

    public function success(Ferry $ferry, FerryTicket $ferryTicket) {
        session()->forget('ticket_info');
        return view('ferry-tickets.payment.success', ['ferryTicket' => $ferryTicket]);
    }

    public function cancel(Ferry $ferry) {
        session()->forget('ticket_info');
        return view('ferry-tickets.payment.cancel', ['ferry' => $ferry]);
    }
}
