# inicio SafoodServidor
Despues de clonar en la carpeta src:
    Composer install
    npm install
Crear base de datos (en phpMyAdmin)
Rellenar base de datos
    php artisan migrate --seed

# Pendiente por hacer/revisar
foreing key tabla users
En api.php verificar las route::resource creo que estan mal
# ultimas modificaciones
Creaccion tabla, modelo, controlador y migracion de "carrousel_image"
añadida ruta en api
poner los mismos nombres en los modelos y las migraciones (renombre de tablas,campos...)


# Documentacion:
https://styde.net/insercion-de-datos-con-los-seeders-de-laravel/
https://www.blenderdeluxe.com/fix-tableseeder-dont-exist-php-artisan-migrate-seed-laravel-5

# Para trabajar con foreing keys:
Editar su archivo /config/database.php, buscar la entrada mysql y cambiar:
'engine' => null,   a    'engine' => 'InnoDB',