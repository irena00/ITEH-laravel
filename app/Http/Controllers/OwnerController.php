<?php

namespace App\Http\Controllers;

use App\Http\Resources\OwnerCollection;
use App\Http\Resources\OwnerResource;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OwnerController extends Controller
{
    //GET
    //localhost:8000/api/owners
    //NO BODY

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return OwnerResource::collection(Owner::all());
        return new OwnerCollection(Owner::all());
    }


    //POST
    //localhost:8000/api/owners
    //BODY = Owner Model

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $owner = Owner::create($input);
        return response()->json([
            "success" => true,
            "message" => "Owner created successfully.",
            "data" => $owner
        ]);
    }

    //GET
    //localhost:8000/api/owners/{ownerID}
    //NO BODY

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function show($ownerID)
    {
        $owner = Owner::find($ownerID);
        return is_null($owner) ? response()->json('Data not found', 404) : new OwnerResource($owner);
    }


    //DELETE
    //localhost:8000/api/owners/{ownerID}
    //NO BODY

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer  $ownerID
     * @return \Illuminate\Http\Response
     */
    public function destroy($ownerID)
    {
        $owner = Owner::where('id', $ownerID)->delete();
        return response()->json([
            "success" => true,
            "message" => "Owner deleted successfully.",
            "data" => $owner
        ]);
    }
}
