<?php

namespace App\Http\Controllers;

use App\Models\Ferry;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FerryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ferries.index', ['ferries' => Ferry::latest()->simplePaginate(4)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ferries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
    }

    /**
     * Display the specified resource.
     */
    public function show(Ferry $ferry)
    {
        return view('ferries.show', ['ferry' => $ferry]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ferry $ferry)
    {
        return view('ferries.edit', ['ferry' => $ferry]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ferry $ferry)
    {
        request()->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('ferries')->ignore($ferry->id)],
            'price' => ['required', 'decimal:0,2', 'min:5', 'max:999'],
            'capacity' => ['required', 'integer', 'min:8', 'max:9999']
        ]);

        $ferry->update([
            'name' => request('name'),
            'price' => request('price'),
            'capacity' => request('capacity'),
        ]);


        return redirect('/ferries');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Ferry $ferry)
    {
        $ferry->delete();
        return redirect('/ferries');
    }
}
