<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Artisan;

class DatabaseBackupController extends Controller
{
    public function index()
    {
        // Muestra los archivos de respaldo almacenados en la carpeta POS
        return view('database.index', [
            'files' => File::allFiles(storage_path('app/POS'))
        ]);
    }

    public function create()
    {
        // Configura los detalles de tu base de datos desde el archivo .env
        $database = env('DB_DATABASE');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD'); // Ya está vacío, como lo has configurado
        $host = env('DB_HOST');
        $port = env('DB_PORT', '3306');
    
        // Configura el nombre del archivo de respaldo
        $filename = storage_path("app/POS/" . date('Y-m-d_H-i-s') . ".sql");
    
        // Ejecuta el comando mysqldump sin la solicitud de contraseña manual
        $command = "mysqldump -h $host -P $port -u $username $database > $filename";
    
        // Ejecuta el comando en el sistema
        exec($command, $output, $status);
    
        // Verifica si el comando se ejecutó correctamente
        if ($status === 0) {
            return Redirect::route('backup.index')->with('success', '¡Copia de seguridad de la base de datos realizada exitosamente!');
        } else {
            return Redirect::route('backup.index')->with('error', 'Error creating database backup.');
        }
    }
    
    

    public function download(string $fileName)
    {
        // Define el path del archivo a descargar
        $path = storage_path('app/POS/' . $fileName);

        return response()->download($path);
    }

    public function delete(string $fileName)
    {
        // Elimina el archivo de respaldo desde el almacenamiento
        Storage::delete('POS/' . $fileName);

        return Redirect::route('backup.index')->with('success', '¡Copia de seguridad de la base de datos eliminada exitosamente!');
    }
}
