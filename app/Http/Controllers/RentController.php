<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rent;

class RentController extends Controller
{
    // return all rent
    public function getRent(){
        $rent = Rent::all();
        return response()->json($rent);
    }

    // return rent by id

    public function getRentById($id){
        $rent = Rent::find($id);
        return response()->json($rent);
    }

    // create rent
    public function createRent(Request $request){
        $rent = new Rent;
        $rent->name = $request->name;
        $rent->description = $request->description;
        $rent->location = $request->location;
        $rent->sector = $request->sector;
        $rent->city = $request->city;
        $rent->save();
        return response()->json($rent);
    }

}
