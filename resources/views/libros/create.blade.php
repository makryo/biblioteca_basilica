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
                <div class="card-header">Formulario</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>Nuevo Libro</h1>
                    <div class="container">
                        
                    <!-- -->
                        <form method="post" action="{{ route('libros.store') }}">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-6">


                                    <br>
                                    <label>Nombre</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="nombre">
                                         
                                    </div>
                                        @error('nombre')
                                            <small class="text-warning">No se puede dejar en blanco o los datos son erroneos.</small>
                                        @enderror
                                    <br> 
                                    <br>
                                        

                                    <label>Autor</label>
                                        <div class="input-group mb-3">
                                            <select name="autor" class="input-group mb-3 form-control">
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
                                            <select name="editorial" class="input-group mb-3 form-control">
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
                                <br>
                                <label>Pais</label>
                                        <div class="input-group mb-3">
                                            <select name="pais" class="input-group mb-3 form-control">
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
                                                    <option value="{{ $Lista->id }}">
                                                        {{ $Lista->nombre_tipo }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            
                                        </div>
                                        @error('tipo')
                                            <small class="text-warning">No se puede dejar en blanco o los datos son erroneos.</small>
                                        @enderror
                                    <br>
                                    <br> 
                                    
                                </div>
                            </div>
                            <br>
                            <input type="submit" value="Guardar" class="btn btn-success">
                            <a href="/home" type="button" class="btn btn-secondary">Regresar</a>

                            
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Info</button>
                            
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Informacion</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>En el formulario ingrese los datos solicitados, en algunos campos se debe introducir 
                                        los datos correctos de lo contrario el sistema no dejara ingresarlo, asi como tampoco 
                                        podra dejar un campo vacio.</p>
                                    </div>
                                    <div class="modal-footer">
                                        
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                           
                        </form>      
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection