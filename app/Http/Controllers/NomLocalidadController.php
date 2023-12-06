<?php

namespace App\Http\Controllers;

use App\Models\NomLocalidad;
use App\Http\Requests\StoreNomLocalidadRequest;
use App\Http\Requests\UpdateNomLocalidadRequest;

class NomLocalidadController extends Controller
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
     * @param  \App\Http\Requests\StoreNomLocalidadRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNomLocalidadRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NomLocalidad  $nomLocalidad
     * @return \Illuminate\Http\Response
     */
    public function show(NomLocalidad $nomLocalidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NomLocalidad  $nomLocalidad
     * @return \Illuminate\Http\Response
     */
    public function edit(NomLocalidad $nomLocalidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNomLocalidadRequest  $request
     * @param  \App\Models\NomLocalidad  $nomLocalidad
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNomLocalidadRequest $request, NomLocalidad $nomLocalidad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NomLocalidad  $nomLocalidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(NomLocalidad $nomLocalidad)
    {
        //
    }
}
