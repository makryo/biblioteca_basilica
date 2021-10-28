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
                    
                        <form method="post" action="{{ route('tipo_libro.update', $Edita->id) }}">

                            @csrf
                            @method('PATCH')
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <input type="text" name="nombre" value="{{ $Edita->nombre_tipo }}" class="form-control">
                                       
                                    </div>

                                        @error('nombre')
                                            <small class="text-warning">No se puede dejar en blanco o los datos son erroneos.</small>
                                        @enderror
                                    <br>
                                    <br>

                                   
                                    <div class="col-6">
                                       
                                        
                                    </div>
                                </div>
                            </div>
                            <input type="submit" value="Guardar" class="btn btn-success">
                            <a href="/home" type="button" class="btn btn-secondary">Inicio</a>
                            <a href="{{ route('tipo_libro.index') }}" type="button" class="btn btn-primary">Tabla de tipo de libros</a>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection