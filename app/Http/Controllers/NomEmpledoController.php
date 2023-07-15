<?php

namespace App\Http\Controllers;

use App\Models\NomEmpledo;
use App\Http\Requests\StoreNomEmpledoRequest;
use App\Http\Requests\UpdateNomEmpledoRequest;

class NomEmpledoController extends Controller
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
     * @param  \App\Http\Requests\StoreNomEmpledoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNomEmpledoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NomEmpledo  $nomEmpledo
     * @return \Illuminate\Http\Response
     */
    public function show(NomEmpledo $nomEmpledo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NomEmpledo  $nomEmpledo
     * @return \Illuminate\Http\Response
     */
    public function edit(NomEmpledo $nomEmpledo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNomEmpledoRequest  $request
     * @param  \App\Models\NomEmpledo  $nomEmpledo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNomEmpledoRequest $request, NomEmpledo $nomEmpledo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NomEmpledo  $nomEmpledo
     * @return \Illuminate\Http\Response
     */
    public function destroy(NomEmpledo $nomEmpledo)
    {
        //
    }
}
