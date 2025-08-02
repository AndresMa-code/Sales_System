<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DatabaseBackup extends Command
{
    protected $signature = 'backup:run';
    protected $description = 'Realiza una copia de seguridad de la base de datos';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Configuración de la base de datos
        $database = env('DB_DATABASE');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');
        $host = env('DB_HOST');
        $port = env('DB_PORT', '3306');

        // Configura el nombre del archivo de respaldo
        $filename = storage_path("app/POS/" . date('Y-m-d_H-i-s') . ".sql");

        // Ejecuta el comando mysqldump
        $command = "mysqldump -h $host -P $port -u $username -p$password $database > $filename";

        // Ejecuta el comando en el sistema
        exec($command);

        // Mensaje de éxito
        $this->info('Copia de seguridad realizada correctamente: ' . $filename);
    }
}
