<?php

namespace App\Http\Controllers;

use App\Http\Resources\BicycleCollection;
use App\Http\Resources\BicycleResource;
use App\Models\Bicycle;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BicycleController extends Controller
{
    //GET
    //localhost:8000/api/bicycles
    //NO BODY

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return BicycleResource::collection(Bicycle::all());
        return new BicycleCollection(Bicycle::all());
    }

    //GET
    //localhost:8000/api/bicycles/{bicycleID}
    //NO BODY

    /**
     * Display the specified resource.
     *
     * @param  integer  $bicycleID
     * @return \Illuminate\Http\Response
     */
    public function show($bicycleID)
    {
        $bicycle = Bicycle::find($bicycleID);
        return is_null($bicycle) ? response()->json('Data not found', 404) : new BicycleResource($bicycle);
    }


    //DELETE
    //localhost:8000/api/bicycles/{bicycleID}
    //NO BODY

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer  $bicycleID
     * @return \Illuminate\Http\Response
     */
    public function destroy($bicycleID)
    {
        $bicycle = Bicycle::where('id', $bicycleID)->delete();
        return response()->json([
            "success" => true,
            "message" => "Bicycle deleted successfully.",
            "data" => $bicycle
        ]);
    }
}
