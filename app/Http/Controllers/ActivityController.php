<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Enums\Type;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('activities.index', ['activities' => Activity::latest()->simplePaginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('activities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        return view('activities.show', ['activity' => $activity]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        //
    }
}
