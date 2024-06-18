<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // get all categories
    public function index()
    {
        $categories = Category::all();
        return $categories;
    }

    // get categories
    public function GetCategories()
    {
        $categories = Category::all();
        return response()->json($categories);
    }


}
