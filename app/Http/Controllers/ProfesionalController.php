<?php

namespace App\Http\Controllers;

use App\Models\Profesional;
use App\Http\Requests\StoreProfesionalRequest;
use App\Http\Requests\UpdateProfesionalRequest;

class ProfesionalController extends Controller
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
     * @param  \App\Http\Requests\StoreProfesionalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfesionalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profesional  $profesional
     * @return \Illuminate\Http\Response
     */
    public function show(Profesional $profesional)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profesional  $profesional
     * @return \Illuminate\Http\Response
     */
    public function edit(Profesional $profesional)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfesionalRequest  $request
     * @param  \App\Models\Profesional  $profesional
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfesionalRequest $request, Profesional $profesional)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profesional  $profesional
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profesional $profesional)
    {
        //
    }
}
