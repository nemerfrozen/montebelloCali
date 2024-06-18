<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sector;

class SectorController extends Controller
{
    // get all sectors
    public function index()
    {
        $sectors = Sector::all();
        return $sectors;
    }

    // get sectors
    public function GetSectors()
    {
        $sectors = Sector::all();
        return response()->json($sectors);
    }

    // create a new sector
    public function store(Request $request)
    {
        $sector = new Sector;
        $sector->name = $request->name;
        $sector->location_id = $request->location_id;
        $sector->save();
        // json
        return response()->json([
            'status' => 200,
            'message' => 'Sector created successfully',
            'data' => $sector
        ]);
    }
}
