<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tipo_libro;

class TipoLibroController extends Controller
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
        return view('tipo_libro.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipo_libro.create');
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

        $nom1 = $request->input('nombre');

        tipo_libro::create([
            'nombre_tipo' => $nom1
        ]);

        return redirect()->route('tipo_libro.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipos = tipo_libro::find($id);
        return view('tipo_libro.show', compact('tipos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Edita = tipo_libro::findOrFail($id);
        return view('tipo_libro.edit', compact('Edita'));
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
        $tipos = tipo_libro::find($id);

        $request->validate(
            [
                'nombre' => 'required|max:100|regex:/^[\pL\s\-]+$/u'
            ]
        );

        $nom1 = $request->input('nombre');


        $tipos -> update([
            'nombre_tipo' => $nom1
        ]);

        return redirect()->route('tipo_libro.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tipo_libro::find($id)->delete();
        $tipos = tipo_libro::all();
        return redirect()->route('tipo_libro.index');
    }
}
