<?php  
use App\tipo_libro;
$datos = tipo_libro::all();
?>

@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-13">
            <div class="card">
                <div class="card-header">Lista de tipos de libros</div>
                    
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>Tipos de libros ingresados</h1>
                    <br>
                    <script language="JavaScript">
                        $(document).ready(function() {
                            $('#datos').DataTable();
                        } );
                    </script>
                    <input type="text" id="searchTerm" onkeyup="doSearch()" class="form-control">
                    <br>
                    <br>
                    <table class="table table-striped " id="datos">
                        <thead>
                        <tr class="table-info">
                            <th>Nombre</th>   
                            <th>detalles</th>
                        </tr>
                        </thead>

                        @foreach($datos as $Lista)
                            <tr>
                                <td>{{ $Lista->nombre_tipo }}</td>
                                
                                <td>
                                    <a href="{{ route('tipo_libro.show', $Lista->id) }}" class="btn btn-success">Detalles</a>    
                                    <br>
                                    <br>
                                    <form method="post" action="{{ route('tipo_libro.destroy', $Lista->id) }}">
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

                    
                    <br>  
                    <a href="/home" type="button" class="btn btn-danger">Regresar</a>
                    <a href="{{route('tipo_libro.create')}}" type="button" class="btn btn-success">Nuevo tipo de libro</a>
                    
                    
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection