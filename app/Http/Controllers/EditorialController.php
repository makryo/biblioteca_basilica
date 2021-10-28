<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\editorial;

class EditorialController extends Controller
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
        return view('editorial.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('editorial.create');
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

        editorial::create([
            'nombre_editorial' => $nom1
        ]);

        return redirect()->route('editoriales.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $editor = editorial::find($id);
        return view('editorial.show', compact('editor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Edita = editorial::findOrFail($id);
        return view('editorial.edit', compact('Edita'));
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
        $editor = editorial::find($id);

        $request->validate(
            [
                'nombre' => 'required|max:100|regex:/^[\pL\s\-]+$/u'
            ]
        );

        $nom1 = $request->input('nombre');


        $editor -> update([
            'nombre_editorial' => $nom1
        ]);

        return redirect()->route('editoriales.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        editorial::find($id)->delete();
        $editor = editorial::all();
        return redirect()->route('editoriales.index');
    }
}
