<?php

namespace App\Http\Controllers;

use App\Models\TipoPermiso;
use App\Http\Requests\StoreTipoPermisoRequest;
use App\Http\Requests\UpdateTipoPermisoRequest;

class TipoPermisoController extends Controller
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
     * @param  \App\Http\Requests\StoreTipoPermisoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipoPermisoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoPermiso  $tipoPermiso
     * @return \Illuminate\Http\Response
     */
    public function show(TipoPermiso $tipoPermiso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoPermiso  $tipoPermiso
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoPermiso $tipoPermiso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTipoPermisoRequest  $request
     * @param  \App\Models\TipoPermiso  $tipoPermiso
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipoPermisoRequest $request, TipoPermiso $tipoPermiso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoPermiso  $tipoPermiso
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoPermiso $tipoPermiso)
    {
        //
    }
}
