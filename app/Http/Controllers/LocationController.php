<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    // get all locations
    public function index()
    {
        $locations = Location::all();
        return $locations;
    }

    // get locations
    public function GetLocations()
    {
        $locations = Location::all();
        return response()->json($locations);
    }
}
