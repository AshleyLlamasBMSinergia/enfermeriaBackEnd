<?php

namespace App\Http\Controllers;

use App\Models\Reactivo;
use App\Http\Requests\StoreReactivoRequest;
use App\Http\Requests\UpdateReactivoRequest;

class ReactivoController extends Controller
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
     * @param  \App\Http\Requests\StoreReactivoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReactivoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reactivo  $reactivo
     * @return \Illuminate\Http\Response
     */
    public function show(Reactivo $reactivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reactivo  $reactivo
     * @return \Illuminate\Http\Response
     */
    public function edit(Reactivo $reactivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReactivoRequest  $request
     * @param  \App\Models\Reactivo  $reactivo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReactivoRequest $request, Reactivo $reactivo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reactivo  $reactivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reactivo $reactivo)
    {
        //
    }
}
