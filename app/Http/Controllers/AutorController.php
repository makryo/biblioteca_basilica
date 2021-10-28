<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\autor;

class AutorController extends Controller
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
        return view('autor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('autor.create');
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

        autor::create([
            'nombre_autor' => $nom1
        ]);

        return redirect()->route('autores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $autores = autor::find($id);
        return view('autor.show', compact('autores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Edita = autor::findOrFail($id);
        return view('autor.edit', compact('Edita'));
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
        $autores = autor::find($id);

        $request->validate(
            [
                'nombre' => 'required|max:100|regex:/^[\pL\s\-]+$/u'
            ]
        );

        $nom1 = $request->input('nombre');


        $autores -> update([
            'nombre_autor' => $nom1
        ]);

        return redirect()->route('autores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        autor::find($id)->delete();
        $autores = autor::all();
        return redirect()->route('autores.index');
    }
}
