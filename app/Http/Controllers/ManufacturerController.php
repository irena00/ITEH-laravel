<?php

namespace App\Http\Controllers;

use App\Http\Resources\ManufacturerCollection;
use App\Http\Resources\ManufacturerResource;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ManufacturerController extends Controller
{
    //GET
    //localhost:8000/api/manufacturers
    //NO BODY

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return ManufacturerResource::collection(Manufacturer::all());
        return new ManufacturerCollection(Manufacturer::all());
    }


    //POST
    //localhost:8000/api/manufacturers
    //BODY = Manufacturer Model

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
        $manufacturer = Manufacturer::create($input);
        return response()->json([
            "success" => true,
            "message" => "Manufacturer created successfully.",
            "data" => $manufacturer
        ]);
    }

    //GET
    //localhost:8000/api/manufacturers/{manufacturerID}
    //NO BODY

    /**
     * Display the specified resource.
     *
     * @param  integer  $manufacturerID
     * @return \Illuminate\Http\Response
     */
    public function show($manufacturerID)
    {
        $manufacturer = Manufacturer::find($manufacturerID);
        return is_null($manufacturer) ? response()->json('Data not found', 404) : new ManufacturerResource($manufacturer);
    }
    
    //DELETE
    //localhost:8000/api/manufacturers/{manufacturerID}
    //NO BODY

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer  $manufacturerID
     * @return \Illuminate\Http\Response
     */
    public function destroy($manufacturerID)
    {
        $manufacturer = Manufacturer::where('id', $manufacturerID)->delete();
        return response()->json([
            "success" => true,
            "message" => "Manufacturer deleted successfully.",
            "data" => $manufacturer
        ]);
    }
}
