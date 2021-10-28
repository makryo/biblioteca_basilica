@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Detalles</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>Detalles del autor</h1>
                    
                    <dl>
                    <div class="row">
                        <div class="col-6">
                            <dt>Nombres</dt><dd>{{ $autores->nombre_autor }}</dd>
                            
                        </div>

                        <div class="col-6">
                            
                        </div>
                    </div>
                    </dl>
                    <br>  
                    <a href="/home" type="button" class="btn btn-secondary">Inicio</a>
                    <a href="{{ route('autores.index') }}" type="button" class="btn btn-primary">Tabla de autores</a>
                    <a href="{{ route('autores.edit', $autores->id) }}" class="btn btn-warning">Editar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection