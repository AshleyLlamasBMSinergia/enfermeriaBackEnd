<?php

namespace App\Http\Controllers;

use App\Models\Accidente;
use App\Http\Requests\StoreAccidenteRequest;
use App\Http\Requests\UpdateAccidenteRequest;

class AccidenteController extends Controller
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
     * @param  \App\Http\Requests\StoreAccidenteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAccidenteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accidente  $accidente
     * @return \Illuminate\Http\Response
     */
    public function show(Accidente $accidente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accidente  $accidente
     * @return \Illuminate\Http\Response
     */
    public function edit(Accidente $accidente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAccidenteRequest  $request
     * @param  \App\Models\Accidente  $accidente
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAccidenteRequest $request, Accidente $accidente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accidente  $accidente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accidente $accidente)
    {
        //
    }
}
