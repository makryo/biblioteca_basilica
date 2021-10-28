<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\libro;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('libros.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('libros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nombre' => 'required|max:100|regex:/^[\pL\s\-]+$/u'
                
            ]
        );

        $nombre = $request->input('nombre');
        $autor = $request->input('autor');
        $editorial = $request->input('editorial');
        $pais = $request->input('pais');
        $tipo = $request->input('tipo');

        libro::create([
            'nombre' => $nombre,
            'editorial_id' => $editorial,
            'tipo_id' => $tipo,
            'pais_id' => $pais,
            'autor_id' => $autor
        ]);

        return view('libros.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $libro = libro::find($id);
        return view('libros.show', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Edita = libro::findOrFail($id);
        return view('libros.edit', compact('Edita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = libro::find($id);

        $request->validate(
            [
                'nombre' => 'required|max:100|regex:/^[\pL\s\-]+$/u'
            ]
        );

        $nombre = $request->input('nombre');
        $autor = $request->input('autor');
        $editorial = $request->input('editorial');
        $pais = $request->input('pais');
        $tipo = $request->input('tipo');

        $book -> update([
            'nombre' => $nombre,
            'editorial_id' => $editorial,
            'tipo_id' => $tipo,
            'pais_id' => $pais,
            'autor_id' => $autor
        ]);

        return view('libros.modif');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        libro::find($id)->delete();
        $libro = libro::all();
        return view('libros.delete');
    }
}
