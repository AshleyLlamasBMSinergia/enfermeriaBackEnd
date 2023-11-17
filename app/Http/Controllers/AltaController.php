<?php

namespace App\Http\Controllers;

use App\Models\Alta;
use App\Http\Requests\StoreAltaRequest;
use App\Http\Requests\UpdateAltaRequest;

class AltaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAltaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAltaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alta  $alta
     * @return \Illuminate\Http\Response
     */
    public function show(Alta $alta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alta  $alta
     * @return \Illuminate\Http\Response
     */
    public function edit(Alta $alta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAltaRequest  $request
     * @param  \App\Models\Alta  $alta
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAltaRequest $request, Alta $alta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alta  $alta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alta $alta)
    {
        //
    }
}
