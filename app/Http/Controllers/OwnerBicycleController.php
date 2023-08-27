<?php

namespace App\Http\Controllers;

use App\Http\Resources\BicycleCollection;
use App\Models\Bicycle;
use Illuminate\Http\Request;

class OwnerBicycleController extends Controller
{
    public function index($ownerID)
    {
        $bicycles = Bicycle::get()->where('owner_id', $ownerID);
        if(is_null($bicycles)) {
            return response()->json('Data not found', 404);
        }
        return new BicycleCollection($bicycles);
    }
}
