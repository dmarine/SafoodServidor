# SafoodServidor
Despues de clonar en la carpeta src:
    Composer install
    npm install
Documentacion:
https://styde.net/insercion-de-datos-con-los-seeders-de-laravel/
https://www.blenderdeluxe.com/fix-tableseeder-dont-exist-php-artisan-migrate-seed-laravel-5





 // DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
        // DB::table('professions')->truncate();
        // DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Reactivamos la revisión de claves foráneas


Puede editar su archivo /config/database.php, buscar la entrada mysql y cambiar:
'engine' => null,
a
'engine' => 'InnoDB',