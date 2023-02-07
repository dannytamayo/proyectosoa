<?php

use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/estudiantesS/{query}', function ($query){

    $estudiantes = Estudiante::query();
    if ($query) {
        $estudiantes->where('cedula', 'like', "%{$query}%");
    }
    $estudiantes = $estudiantes->get();

    return response()->json([
        'estudiantes' => $estudiantes
    ], 200);
});

Route::get('/estudiantes', function (){

    $estudiantes = Estudiante::all();

    return response()->json([
        'estudiantes' => $estudiantes
    ], 200);
});

Route::post('/crear', function (Request $request) {

    // dd($validatedData);


    $estudiante = new Estudiante();
    $estudiante->cedula = $request->cedula;
    $estudiante->nombre = $request->nombre;
    $estudiante->apellido = $request->apellido;
    $estudiante->telefono = $request->telefono;
    $estudiante->direccion = $request->direccion;

    $estudiante->save();

    return response()->json([
        'success' => true,
        'message' => 'Estudiante añadido corectamente'
    ]);
});

Route::put('/editar/{id}', function (Request $request, $id) {

    $estudiante = Estudiante::find($id);
    $estudiante->nombre = $request->nombre;
    $estudiante->apellido = $request->apellido;
    $estudiante->telefono = $request->telefono;
    $estudiante->direccion = $request->direccion;

    $estudiante->save();

    return response()->json([
        'success' => true,
        'message' => 'Estudiante editado correctamente'
    ]);
});

Route::delete('/eliminar/{id}', function ($id){

    $estudiante = Estudiante::find($id);

    $estudiante->delete();

    return response()->json([
        'success' => true,
        'message' => 'Estudiante editado correctamente'
    ]);

});