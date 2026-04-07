<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Satellite;

class SatelliteController extends Controller
{
    // Todos los satélites
public function index() {
    return response()->json(Satellite::all());
}

// Favoritos del usuario
public function favorites(Request $request) {
    return response()->json($request->user()->favoriteSatellites);
}

// Añadir favorito
public function addFavorite(Request $request, $id) {
    $request->user()->favoriteSatellites()->syncWithoutDetaching([$id]);
    return response()->json(['message' => 'Añadido a favoritos']); // ->setStatusCode(201) (Para establecer valores de codigos response de manera estatica)
}

// Quitar favorito
public function removeFavorite(Request $request, $id) {
    $request->user()->favoriteSatellites()->detach($id);
    return response()->json(data: ['message' => 'Quitado de favoritos']); // ->setStatusCode(204) 201 -> put/update hecho correctamente | 204 -> delete hecho correctamente (No Content)
}
}
