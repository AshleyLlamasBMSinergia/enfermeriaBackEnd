<?php

namespace App\Http\Controllers;

use App\Models\NomEstado;
use App\Http\Requests\StoreNomEstadoRequest;
use App\Http\Requests\UpdateNomEstadoRequest;

class NomEstadoController extends Controller
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
     * @param  \App\Http\Requests\StoreNomEstadoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNomEstadoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NomEstado  $nomEstado
     * @return \Illuminate\Http\Response
     */
    public function show(NomEstado $nomEstado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NomEstado  $nomEstado
     * @return \Illuminate\Http\Response
     */
    public function edit(NomEstado $nomEstado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNomEstadoRequest  $request
     * @param  \App\Models\NomEstado  $nomEstado
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNomEstadoRequest $request, NomEstado $nomEstado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NomEstado  $nomEstado
     * @return \Illuminate\Http\Response
     */
    public function destroy(NomEstado $nomEstado)
    {
        //
    }
}
