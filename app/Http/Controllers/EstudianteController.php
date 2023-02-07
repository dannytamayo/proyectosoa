<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {




        // return view('index', compact('estudiantes'));

        $query = $request->input('query');

        $client = new Client();
        if (!empty($query)) {
            $response = $client->get('http://proyectosoa.test/api/estudiantesS/' . $query);
        } else {
            $response = $client->get('http://proyectosoa.test/api/estudiantes');
        }

        
        $res = json_decode($response->getBody()->getContents(), true);

        $estudiantes = $res['estudiantes'];


        return view('index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = new Client();

        $data = [
            'cedula' => $request->cedula,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion
        ];

        $response = $client->post('http://proyectosoa.test/api/crear', [
            'form_params' => $data
        ]);

        $res = json_decode($response->getBody()->getContents(), true);


        if ($res['success']) {
            return redirect()->route('estudiantes.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estudiante = Estudiante::find($id);


        return view('edit', compact('estudiante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estudiante $estudiante)
    {


        $client = new Client();
        $response = $client->put('http://proyectosoa.test/api/editar/' . $estudiante->id, [
            'form_params' => [
                'cedula' => $request->cedula,
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'telefono' => $request->telefono,
                'direccion' => $request->direccion
            ]
        ]);

        $res = json_decode($response->getBody()->getContents(), true);

        if ($res['success']) {
            return redirect()->route('estudiantes.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = new Client();
        $response = $client->delete('http://proyectosoa.test/api/eliminar/' . $id);


        $res = json_decode($response->getBody()->getContents(), true);

        return redirect()->route('estudiantes.index');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $estudiantes = Estudiante::where('cedula', 'like', "%{$query}%")
            ->get();
        return view('index', compact('estudiantes'))->render();
    }
}
