<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employes;

class EmployesController extends Controller
{
    // return all employes

    public function getEmployes(){
        $employes = employes::all();
        return response()->json($employes);
    }

    // return employes by id

    public function getEmployesById($id){
        $employes = employes::find($id);
        return response()->json($employes);
    }

    //create employes

    public function createEmployes(Request $request){
        $employes = new employes;
        $employes->name = $request->name;
        $employes->description = $request->description;
        $employes->salary = $request->salary;
        $employes->requirements = $request->requirements;
        $employes->location = $request->location;
        $employes->sector = $request->sector;
        $employes->city = $request->city;
        $employes->save();
        return response()->json($employes);
    }
}
