<?php
use App\autor;
use App\editorial;
use App\pais_libro;
use App\tipo_libro;


$autor = autor::all();
$editorial = editorial::all();
$pais = pais_libro::all();
$tipo = tipo_libro::all();

?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Editar registro</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>Actualizar datos</h1>
                    <div class="container">
                    
                    <form method="post" action="{{ route('libros.update', $Edita->id) }}">

                            @csrf
                            @method('PATCH')
                            {{ csrf_field() }}

                            <div class="row">
                            <div class="col-6">
                                
                            <label>Nombre del libro</label>
                            <div class="input-group mb-3">
                            <input type="text" name="nombre" value="{{ $Edita->nombre }}" class="form-control">
                                       
                            </div>

                            @error('nombre')
                            <small class="text-warning">No se puede dejar en blanco o los datos son erroneos.</small>
                            @enderror
                            <br>
                            <br>

                            <label>Autor</label>
                            <div class="input-group mb-3">
                            <select name="autor" class="input-group mb-3 form-control" value="{{ $Edita->autor_id }}">
                            @foreach($autor as $Lista)
                            <option value="{{ $Lista->id }}">
                            {{ $Lista->nombre_autor }}
                            </option>
                            @endforeach
                            </select>
                                            
                            </div>
                            @error('autor')
                            <small class="text-warning">No se puede dejar en blanco o los datos son erroneos.</small>
                            @enderror
                            <br>
                            <br>  



                            <label>Editorial</label>
                            <div class="input-group mb-3">
                            <select name="editorial" class="input-group mb-3 form-control" value="{{ $Edita->editorial_id }}">
                            @foreach($editorial as $Lista)
                            <option value="{{ $Lista->id }}">
                            {{ $Lista->nombre_editorial }}
                            </option>
                            @endforeach
                            </select>
                                            
                            </div>
                            @error('editorial')
                            <small class="text-warning">No se puede dejar en blanco o los datos son erroneos.</small>
                            @enderror
                            <br>
                            <br>
                            </div>
                            <div class="col-6">
                            <label>Pais</label>
                            <div class="input-group mb-3">
                            <select name="pais" class="input-group mb-3 form-control" value="{{ $Edita->pais_id }}">
                            @foreach($pais as $Lista)
                            <option value="{{ $Lista->id }}">
                            {{ $Lista->nombre_pais }}
                            </option>
                            @endforeach
                            </select>
                                            
                            </div>
                            @error('pais')
                            <small class="text-warning">No se puede dejar en blanco o los datos son erroneos.</small>
                            @enderror
                            <br>
                                    

                            <label>Tipo de libro</label>
                            <div class="input-group mb-3">
                            <select name="tipo" class="input-group mb-3 form-control">
                            @foreach($tipo as $Lista)
                            <option value="{{ $Lista->id }}" value="{{ $Edita->tipo_id }}">
                            {{ $Lista->nombre_tipo }}
                            </option>
                            @endforeach
                            </select>
                                            
                            </div>
                            @error('tipo')
                            <small class="text-warning">No se puede dejar en blanco o los datos son erroneos.</small>
                            @enderror
                            <br>
                                    
                            </div>
                            </div>
                            
                            <input type="submit" value="Guardar" class="btn btn-success"> 

                            <a href="/home" type="button" class="btn btn-secondary">Regresar</a>
                            
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection