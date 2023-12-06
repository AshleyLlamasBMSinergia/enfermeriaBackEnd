<?php

namespace App\Http\Controllers;

use App\Models\NomIncidencia;
use App\Http\Requests\StoreNomIncidenciaRequest;
use App\Http\Requests\UpdateNomIncidenciaRequest;

class NomIncidenciaController extends Controller
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
     * @param  \App\Http\Requests\StoreNomIncidenciaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNomIncidenciaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NomIncidencia  $nomIncidencia
     * @return \Illuminate\Http\Response
     */
    public function show(NomIncidencia $nomIncidencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NomIncidencia  $nomIncidencia
     * @return \Illuminate\Http\Response
     */
    public function edit(NomIncidencia $nomIncidencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNomIncidenciaRequest  $request
     * @param  \App\Models\NomIncidencia  $nomIncidencia
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNomIncidenciaRequest $request, NomIncidencia $nomIncidencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NomIncidencia  $nomIncidencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(NomIncidencia $nomIncidencia)
    {
        //
    }
}
