<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('rooms.index', ['rooms' => Room::latest()->simplePaginate(4)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'number' => ['required', 'numeric', 'digits:2', 'min:0', 'max:99'],
            'floor' => ['required', 'numeric', 'digits:2', 'min:0', 'max:99'],
            'code' => ['required', 'numeric', 'min:0000', 'max:9999', 'unique:rooms'],
            'price' => ['required', 'decimal:0,2', 'min:0', 'max:9999']
        ]);

        Room::create([
            'code' => request('code'),
            'price' => request('price'),
            'booked' => false
        ]);

        return redirect('/rooms');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        return view('rooms.show', ['room' => $room]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        return view('rooms.edit', ['room' => $room]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        request()->validate([
            'number' => ['required', 'numeric', 'digits:2', 'min:0', 'max:99'],
            'floor' => ['required', 'numeric', 'digits:2', 'min:0', 'max:99'],
            'code' => ['required', 'numeric', 'min:0000', 'max:9999', Rule::unique('rooms')->ignore($room->id)],
            'price' => ['required', 'decimal:0,2', 'min:0', 'max:9999']
        ]);

        $room->update([
            'code' => request('code'),
            'price' => request('price')
        ]);

        return redirect('/rooms');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Room $room)
    {
        $room->delete();
        return redirect('/rooms');
    }
}
