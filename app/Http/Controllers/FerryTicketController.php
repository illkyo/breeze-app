<?php

namespace App\Http\Controllers;

use App\Models\Ferry;
use App\Models\FerryTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Enums\Role;

class FerryTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role === Role::VISITOR) {
            $ferryTickets = FerryTicket::where('visitor_id', Auth::id())->with('ferry')->latest()->get();
        } else {
            $ferryTickets = FerryTicket::with('ferry')->latest()->get();
        }
        return view('ferry-tickets.index', ['ferryTickets' => $ferryTickets]);
    }


    public function create(Ferry $ferry)
    {
        return view('ferry-tickets.create', ['ferry' => $ferry]);
    }

    public function store(Request $request, Ferry $ferry)
    {
        $attributes = $request->validate([
            'visitor_count' => ['required', 'integer', 'min:1', 'max:10'],
            'total_price' => ['required', 'decimal:0,2', 'min:5', 'max:999'],
        ]);
        $attributes['ferry_id'] = $ferry->id;
        session(['ticket_info' => $attributes]);

        return redirect()->route('ferry.payment', ['ferry' => $ferry]);
    }


    public function show(FerryTicket $ferryTicket)
    {
        return view('ferry-tickets.show', ['ferryTicket' => $ferryTicket]);
    }


    public function edit(FerryTicket $ferryticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FerryTicket $ferryticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FerryTicket $ferryticket)
    {
        //
    }
}
