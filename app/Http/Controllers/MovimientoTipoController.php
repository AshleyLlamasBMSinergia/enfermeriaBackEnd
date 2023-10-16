<?php

namespace App\Http\Controllers;

use App\Models\MovimientoTipo;
use App\Http\Requests\StoreMovimientoTipoRequest;
use App\Http\Requests\UpdateMovimientoTipoRequest;

class MovimientoTipoController extends Controller
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
     * @param  \App\Http\Requests\StoreMovimientoTipoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMovimientoTipoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MovimientoTipo  $movimientoTipo
     * @return \Illuminate\Http\Response
     */
    public function show(MovimientoTipo $movimientoTipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MovimientoTipo  $movimientoTipo
     * @return \Illuminate\Http\Response
     */
    public function edit(MovimientoTipo $movimientoTipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMovimientoTipoRequest  $request
     * @param  \App\Models\MovimientoTipo  $movimientoTipo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMovimientoTipoRequest $request, MovimientoTipo $movimientoTipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MovimientoTipo  $movimientoTipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(MovimientoTipo $movimientoTipo)
    {
        //
    }
}
