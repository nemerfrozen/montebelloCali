<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    // return all gallery
    public function getGallery(){
        $gallery = Gallery::all();
        return response()->json($gallery);
    }

    // return gallery by refrence

    public function getGalleryByRefrence($refrence){
        $gallery = Gallery::find($refrence);
        return response()->json($gallery);
    }

    // create gallery

    public function createGallery(Request $request){
        $gallery = new Gallery;
        $gallery->name = $request->name;
        $gallery->image = $request->image;
        $gallery->refrence = $request->refrence;
        $gallery->save();
        return response()->json($gallery);
    }
}
