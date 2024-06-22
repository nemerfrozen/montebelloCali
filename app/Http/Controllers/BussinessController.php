<?php

namespace App\Http\Controllers;
use App\Models\bussiness;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SectorController;

use Illuminate\Http\Request;

class BussinessController extends Controller
{
    // constructor
    public function __construct(CategoryController $categoryController, LocationController $locationController, SectorController $sectorController)
    {
        $this->categoryController = $categoryController;
        $this->locationController = $locationController;
        $this->sectorController = $sectorController;
    }

    // index
    public function index(){
        return view('bussiness.index');
    }

    // create view
    public function create(){
         //category
         $categories = $this->categoryController->index();
         //location
         $locations = $this->locationController->index();
         //sectors
         $sectors = $this->sectorController->index();
        return view('bussiness.create', ['categories' => $categories, 'locations' => $locations, 'sectors' => $sectors]);
    }

    // view bussiness
    public function view($id){
        $bussiness = bussiness::find($id);
        return view('bussiness.view', ['bussiness' => $bussiness]);
    }


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
   
    public function store(Request $request)
    {
        try {
           
        // validate the form data
        try {
            $request->validate([
                'title' => 'required',
                'short_description' => 'required',
                'description' => 'required',                
                'category' => 'required'                
            ]);
        } catch (ValidationException $e) {
           
            return Response::json(['errors' => $e->errors()]);
        }
       



        $fileNameToStore = '/public/images/icon-ejemplo.png';

        // check if a file was uploaded
        if ($request->hasFile('image')) {
            // get the file with the name
            $file = $request->file('image');
            // get the filename
            $fileName = $file->getClientOriginalName();
            // get the file extension
            $extension = $file->getClientOriginalExtension();
            // create a new filename
            $fileNameToStore = Str::slug(pathinfo($fileName, PATHINFO_FILENAME)) . '_' . time() . '.' . $extension;
            // upload the file
            // $path = $file->store('public');
            // // Obtener la URL del archivo guardado
            // $url = Storage::url($path);
            // redimensionar la imagen
            // $img = Image::make($file->getRealPath());
            // $img->resize(120, 120, function ($constraint) {
            //     $constraint->aspectRatio();
            // });
            // $img->stream();           
            
            // save storage to public/images
            $path = $file->storeAs('classifieds', $fileNameToStore);
            // Obtener la URL del archivo guardado
            
            
            $url = Storage::url($path);

            
            $fileNameToStore = '/public/images/classifieds/'.$fileNameToStore;
        }
        

        // create a new classified
        $classified = new Classifieds;
        $classified->title = $request->input('title');
        $classified->short_description = $request->input('short_description');
        $classified->description = $request->input('description');
        //$classified->price = $request->input('price') ?? 0;
        $classified->category = $request->input('category');
        $classified->location = $request->input('location');
        // geolocation
        $classified->geolocation = $request->input('geolocation');
        $classified->phone = $request->input('phone');
        $classified->image = $fileNameToStore;
        $classified->status = 'Activo';
        $classified->user_id = auth()->user()->id ?? 999;
        $classified->save();

        //redirect to the classifieds page
        return redirect('/')->with('success', 'Clasificado creado correctamente');

       
    } catch (\Throwable $error) {  
        
        echo $error;
        return Response::json(['error' => 'Error al crear el clasificado']);

    }
    }


}
