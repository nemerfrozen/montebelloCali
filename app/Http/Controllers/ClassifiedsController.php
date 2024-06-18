<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Classifieds;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\CategoryController;
// storage
use Illuminate\Support\Facades\Storage;

// 'title',
// 'short_description',
// 'description',
// 'price',
// 'category',
// 'user_id',
// 'location',
// 'phone',
// 'image',
// 'status',
// 'created_at',
// 'updated_at'

class ClassifiedsController extends Controller
{
    protected $fileUploadController;
    protected $locationController;
    protected $sectorController;
    protected $categoryController;

    // constructor
    public function __construct(CategoryController $categoryController,FileUploadController $fileUploadController, LocationController $locationController, SectorController $sectorController)
    {
        $this->fileUploadController = $fileUploadController;
        $this->locationController = $locationController;
        $this->sectorController = $sectorController;
        $this->categoryController = $categoryController;    
    }

    // api json
    public function GetClassifieds(Request $request)
    {
        // search params
        $search = $request->input('search');
        $category = $request->input('category');
        $location = $request->input('location');
        $sector = $request->input('sector');
        $price = $request->input('price');

       
        $classifieds = Classifieds::where('title', 'like', '%' . $search . '%')
            ->orWhere('short_description', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%')
            ->orWhere('price', 'like', '%' . $search . '%')
            ->orWhere('category', 'like', '%' . $search . '%')
            ->orWhere('location', 'like', '%' . $search . '%')
            ->orWhere('phone', 'like', '%' . $search . '%')
            ->orWhere('status', 'like', '%' . $search . '%')
            ->orderBy('created_at', 'desc')
            ->get();
        return response()->json($classifieds);
        

        //$classifieds = Classifieds::orderBy('created_at', 'desc')->get();   
        //return response()->json($classifieds);
    }




    // crud operations
    public function index()
    {
        //request all classifieds ORDER BY created_at DESC
        $classifieds = Classifieds::orderBy('created_at', 'desc')->get();   
        return view('classifieds.index', compact('classifieds'));
    }

    public function create()
    {   //category
        $categories = $this->categoryController->index();
        //location
        $locations = $this->locationController->index();
        //sectors
        $sectors = $this->sectorController->index();
        return view('classifieds.create', compact('locations', 'sectors', 'categories'));
    }

   
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
        $classified->price = $request->input('price') ?? 0;
        $classified->category = $request->input('category');
        $classified->location = $request->input('location');
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
