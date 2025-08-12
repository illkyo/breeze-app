<?php

namespace App\Http\Controllers;

use App\Models\ActivityTicket;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityTicketPaymentController extends Controller
{
    protected $ticketInfo;

    public function __construct()
    {
        $this->ticketInfo = session()->get('ticket_info');
    }

    public function create(Request $request, Activity $activity) {
        if ($activity->id === $this->ticketInfo['activity_id']) {
            return view('activity-tickets.payment.gateway', ['activity' => $activity]);
        }
        abort(403);
    }

    public function store(Request $request, Activity $activity) {
        $activityTicket = ActivityTicket::create([
            'activity_id' => $this->ticketInfo['activity_id'],
            'visitor_id' => Auth::id(),
            'visitor_count' => $this->ticketInfo['visitor_count'],
            'total_price' => $this->ticketInfo['total_price']
        ]);
        return redirect()->route('activity.payment.success', ['activityTicket' => $activityTicket]);
    }

    public function success(Activity $activity, ActivityTicket $activityTicket) {
        session()->forget('ticket_info');
        return view('activity-tickets.payment.success', ['activityTicket' => $activityTicket]);
    }

    public function cancel(Activity $activity) {
        session()->forget('ticket_info');
        return view('activity-tickets.payment.cancel', ['activity' => $activity]);
    }
}
