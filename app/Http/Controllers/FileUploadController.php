<?php

namespace App\Http\Controllers;
//storage
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function upload(Request $request)
    {
        // Validar que el archivo ha sido subido
        $request->validate([
            'file' => 'required|file',
        ]);

        // Obtener el archivo del request
        $file = $request->file('image');

        // Definir la ruta donde se guardará el archivo
        $path = 'uploads/files';

        // Guardar el archivo en la ruta especificada
        Storage::putFileAs($path, $file, $file->getClientOriginalName());

        // Devolver una respuesta con la ruta del archivo guardado
        return $filePath;
    }


    // multiple file upload gallery
    public function uploadGallery(Request $request)
    {
        // Validar que los archivos han sido subidos
        $request->validate([
            'files' => 'required',
            'files.*' => 'file',
        ]);

        // Obtener los archivos del request
        $files = $request->file('files');

        // Definir la ruta donde se guardarán los archivos
        $path = 'uploads/gallery';

        // Crear un array para almacenar las rutas de los archivos guardados
        $filePaths = [];

        // Guardar cada archivo en la ruta especificada
        foreach ($files as $file) {
            $filePath = $file->store($path);
            $filePaths[] = $filePath;
        }

        // Devolver una respuesta con las rutas de los archivos guardados
        return response()->json(['file_paths' => $filePaths]);
    }
}
