<?php

use App\Http\Controllers\PaginaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

/*
|--------------------------------------------------------------------------
| Rutas de Backend (Laravel)
|--------------------------------------------------------------------------
| Define aquí las rutas que quieres que Laravel siga manejando.
| Si prefieres que Angular maneje 'home', 'satelite', etc., comenta estas líneas.
*/

Route::get('/iniciarSesion', [PaginaController::class, 'iniciarSesion']);
/* Route::get('/', [PaginaController::class, 'home']); */
// Ejemplo de rutas API (si usas controladores para datos)
// Route::prefix('api')->group(function () {
//    Route::get('/datos', [TuController::class, 'index']);
// });

Route::get('/backoffice', [PaginaController::class, 'home']);
/*
|--------------------------------------------------------------------------
| Integración con Angular (Single Page Application)
|--------------------------------------------------------------------------
| Esta ruta captura cualquier URL y entrega el index.html de Angular.
| Se coloca al final para que no interfiera con las rutas de arriba.
*/

Route::prefix('backoffice')->group(function () 
{
    Route::get('/Eduardo', [PaginaController::class, 'eduardo']);
    Route::get('/Izan', [PaginaController::class, 'izan']);
    Route::get('/Junior', [PaginaController::class, 'junior']);
    Route::get('/Joel', [PaginaController::class, 'joel']);
    Route::get('/Elena', [PaginaController::class, 'elena']);
});

//REDIRECCION LARAVEL A ANGULAR (LO HE COMENTADO POR QUE LA PRACTICA DE BACKOFICE SE TIENE QUE HACER EN LARAVEL)
Route::get('{any}', function ($any = null) {
    $path = public_path("angular/browser/$any");

    // 1. Si la petición pide un archivo físico (JS, CSS, Imágenes), lo servimos
    if (File::isFile($path)) {
        return response()->file($path);
    }

    // 2. Para cualquier otra ruta de navegación, entregamos el index.html
    $indexPath = public_path('angular/browser/index.html');
    
    if (File::exists($indexPath)) {
        return file_get_contents($indexPath);
    }

    abort(404, "El build de Angular no se encuentra en public/angular/browser/");
})->where('any', '.*');