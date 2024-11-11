<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWineRequest;
use App\Http\Requests\UpdateWineRequest;
use App\Models\Wine;

class WineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wines = Wine::orderBy('time_tried', 'desc')->get();
        return view('wines.index', compact('wines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWineRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Wine $wine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wine $wine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWineRequest $request, Wine $wine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wine $wine)
    {
        //
    }
}
