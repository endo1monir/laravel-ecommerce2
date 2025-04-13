<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorecolorsRequest;
use App\Http\Requests\UpdatecolorsRequest;
use App\Models\color;

class ColorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.colors.index');
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
     * @param  \App\Http\Requests\StorecolorsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecolorsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\color  $colors
     * @return \Illuminate\Http\Response
     */
    public function show(color $colors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\color  $colors
     * @return \Illuminate\Http\Response
     */
    public function edit(color $colors)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecolorsRequest  $request
     * @param  \App\Models\color  $colors
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecolorsRequest $request, color $colors)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\color  $colors
     * @return \Illuminate\Http\Response
     */
    public function destroy(color $colors)
    {
        //
    }
}
