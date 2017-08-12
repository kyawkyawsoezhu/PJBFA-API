<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Filters\OfficeFilter;
use App\Partials\OfficePartial;
use App\Http\Requests\StoreOffice;
use App\Http\Requests\IndexOffice;

class OfficesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexOffice $request, OfficeFilter $officeFilter, OfficePartial $officePartial)
    {
        $response = $request->user()->offices()->filter($officeFilter)->partial($officePartial)->paginate();
        
        if($response->isEmpty()){
            return $this->responseEmptyResource();
        }

        return $this->responseWithPagination($response);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOffice $request)
    {
        $response = $request->user()->offices()->create($request->input());

        return $this->responseCreated($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $response = $request->user()->offices()->find($id);
        
        if(empty($response)) {
            return $this->responseEmptyResource();
        }
        
        return $this->responseSpecificResource($response);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $response = $request->user()->offices()->find($id);
        
        if(empty($response)) {
            return $this->responseBadRequest();
        }

        $response->update($request->input());

        return $this->responseUpdated($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $response = $request->user()->offices()->find($id);
        if(empty($response)) {
            return $this->response->responseBadRequest();
        }
        $response->delete();
        return $this->responseDeleted();
    }
}
