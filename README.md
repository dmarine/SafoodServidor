## SafoodServidor start
```
git clone https://github.com/dmarine/SafoodServidor.git
```

### Iniciar servidor
```
npm run init
```

### Actualizar base de datos (opcional)
```
npm run db
```

## Pendiente
- NULL

## Ultimas modificaciones
- Middleware Cors para controlar quien puede hacer peticiones a la api
- Creaccion tabla, modelo, controlador y migracion
- añadida ruta en api
- Renombrar modelos
- Añadir campo precio en la tabla comida
- Creaccion de script para rellenar base de Datos

## Documentacion para el desarrollo
- [Inserción de datos con los seeders de Laravel](https://styde.net/insercion-de-datos-con-los-seeders-de-laravel)
- [Fix TableSeeder don’t exist "php artisan migrate –seed"](https://www.blenderdeluxe.com/fix-tableseeder-dont-exist-php-artisan-migrate-seed-laravel-5)

### Trabajar con foreing keys
Editar el archivo /config/database.php | Array: connections -> mysql -> engine
```
'engine' => 'InnoDB'
```