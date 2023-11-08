<?php

namespace App\Http\Controllers;

use App\Models\Cedi;
use App\Http\Requests\StoreCediRequest;
use App\Http\Requests\UpdateCediRequest;

class CediController extends Controller
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
     * @param  \App\Http\Requests\StoreCediRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCediRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cedi  $cedi
     * @return \Illuminate\Http\Response
     */
    public function show(Cedi $cedi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cedi  $cedi
     * @return \Illuminate\Http\Response
     */
    public function edit(Cedi $cedi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCediRequest  $request
     * @param  \App\Models\Cedi  $cedi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCediRequest $request, Cedi $cedi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cedi  $cedi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cedi $cedi)
    {
        //
    }
}
