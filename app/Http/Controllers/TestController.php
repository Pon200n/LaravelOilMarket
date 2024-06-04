<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'get test ';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return 'store test';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return 'show test id=' . $id;
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update()
    // {

    //     return 'test controller update';
    // }
    public function update(Request $request, string $id)
    {
        $name = $request->input('name');
        return 'test controller update' . $id . $name;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return 'destroy test';
    }
}
