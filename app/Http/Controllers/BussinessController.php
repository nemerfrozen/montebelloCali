<?php

namespace App\Http\Controllers;
use App\Models\bussiness;

use Illuminate\Http\Request;

class BussinessController extends Controller
{
    // return all bussiness
    public function getBussiness(){
        $bussiness = bussiness::all();
        return response()->json($bussiness);
    }

    // return bussiness by id

    public function getBussinessById($id){
        $bussiness = bussiness::find($id);
        return response()->json($bussiness);
    }


    //create bussiness
    public function createBussiness(Request $request){
        $bussiness = new bussiness;
        $bussiness->name = $request->name;
        $bussiness->description = $request->description;
        $bussiness->location = $request->location;
        $bussiness->sector = $request->sector;
        $bussiness->city = $request->city;
        $bussiness->save();
        return response()->json($bussiness);
    }


}
