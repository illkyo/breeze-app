<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Enums\Role;

class ActivityTicketController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === Role::VISITOR) {
            $activityTickets = ActivityTicket::where('visitor_id', Auth::id())->with('activity')->latest()->get();
        } else {
            $activityTickets = ActivityTicket::with('activity')->latest()->get();
        }
        return view('activity-tickets.index', ['activityTickets' => $activityTickets]);
    }

    public function create(Activity $activity)
    {
        return view('activity-tickets.create', ['activity' => $activity]);
    }

    public function store(Request $request, Activity $activity)
    {
        $attributes = $request->validate([
            'visitor_count' => ['required', 'integer', 'min:1', 'max:10'],
            'total_price' => ['required', 'decimal:0,2', 'min:5', 'max:999'],
        ]);
        $attributes['activity_id'] = $activity->id;
        session(['ticket_info' => $attributes]);

        return redirect()->route('activity.payment', ['activity' => $activity]);
    }


    public function show(ActivityTicket $activityTicket)
    {
        return view('activity-tickets.show', ['activityTicket' => $activityTicket]);
    }
}
