<?php

namespace App\Http\Controllers\Status;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStatusRequest;
use App\Http\Requests\UpdateStatusRequest;
use App\Http\Resources\StatusResource;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStatusRequest $request)
    {
        $data = $request->validated();
        Status::firstOrCreate($data);
        $statuses = Status::all();
        return StatusResource::collection($statuses);
    }

    /**
     * Display the specified resource.
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStatusRequest $request, Status $status, string $id)
    {
        $status = Status::findOrFail($id);
        $status->update($request->validated());
        return StatusResource::collection(Status::all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status, string $id)
    {
        Status::destroy($id);
        return StatusResource::collection(Status::all());
    }
}
