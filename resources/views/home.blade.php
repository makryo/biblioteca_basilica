<?php  
$datos = DB::select('select libros.id, nombre, editorials.nombre_editorial, tipo_libros.nombre_tipo, pais_libros.nombre_pais, autors.nombre_autor
from libros, editorials, tipo_libros, pais_libros, autors
where libros.editorial_id = editorials.id
and libros.tipo_id = tipo_libros.id
and libros.pais_id = pais_libros.id
and libros.autor_id = autors.id');
?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <h2>Biblioteca Abad Mateo Martin</h2>
            <ul class="nav nav-tabs">
                <li class="nav-item" wfd-id="275"><a data-toggle="tab" href="#home" class="nav-link active">Inicio</a></li>
                <li class="nav-item"><a data-toggle="tab" href="#menu1" class="nav-link">Lista de libros</a></li>
                <li class="nav-item"><a data-toggle="tab" href="#menu2" class="nav-link">Registros</a></li>
                
            </ul>

            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                <h3>Bienvenido {{ Auth::user()->name }}</h3>
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            {{ __('You are logged in!') }}
                        </div>
                    </div>
                </div>


                <div id="menu1" class="tab-pane fade">
                <h3>Libros</h3>
                    <h2>Lista de libros registrados</h2>
                    <p>Libros registrados existentes en la biblioteca</p>

                    <a href="{{ route('libros.create') }}" class="btn btn-success">Registrar Libro</a>
                    <br>  
                    <br>

                    <input type="text" id="searchTerm" onkeyup="doSearch()" class="form-control">
                    <br>


                    <table class="table table-striped" id="datos">
                        <thead>
                        <tr class="table-info">
                            <th>Nombre</th>
                            <th>Editorial</th>
                            <th>Tipo de libro</th>
                            <th>Pais</th>
                            <th>Autor</th>
                            <th>detalles</th>
                        </tr>
                        </thead>

                        @foreach($datos as $Lista)
                            <tr>
                                <td>{{ $Lista->nombre }}</td>
                                <td>{{ $Lista->nombre_editorial }}</td>
                                <td>{{ $Lista->nombre_tipo }}</td>
                                <td>{{ $Lista->nombre_pais }}</td>
                                <td>{{ $Lista->nombre_autor }}</td>
                                
                                <td>
                                    <a href="{{ route('libros.show', $Lista->id) }}" class="btn btn-success">Detalles</a>    
                                    <br>
                                    <br>
                                    <form method="post" action="{{ route('libros.destroy', $Lista->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Borrar" class="btn btn-danger">
                                    </form>
                                </td>
                                
                            </tr>
                        @endforeach
                          
                    <tr class='noSearch hide'>
                        <td colspan="5"></td>
                    </tr>
                    </table>


                </div>


                <div id="menu2" class="tab-pane fade">
                <h3>Registros</h3>
                
                    <div class="card" wfd-id="38">
                    <div class="card-body" wfd-id="39">
                        <h4 class="card-title">Registros de datos</h4>
                        <h6 class="card-subtitle mb-2 text-muted">guardar datos</h6>
                        <p class="card-text">Registro de datos de autores, editoriales, y tipos de libros</p>
                        <a href="{{ route('autores.create') }}" class="card-link">Registrar autores</a>
                        <a href="{{ route('editoriales.create') }}" class="card-link">Registrar editoriales</a>
                        <a href="{{ route('tipo_libro.create') }}" class="card-link">Registrar tipos de libros</a>
                        <br>
                        <br>
                        <p class="card-text">Lista de datos de autores, editoriales, y tipos de libros</p>
                        <a href="{{ route('autores.index') }}" class="card-link">Lista de autores</a>
                        <a href="{{ route('editoriales.index') }}" class="card-link">Lista de editoriales</a>
                        <a href="{{ route('tipo_libro.index') }}" class="card-link">Lista de tipos de libros</a>
                        
                    </div>
                    </div>
                </div>
                
            </div>
            </div>






            




        </div>
    </div>
</div>


@endsection
