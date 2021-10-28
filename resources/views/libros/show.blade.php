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
                    <h1>Detalles del libro</h1>
                    
                    <dl>
                    <div class="row">
                        <div class="col-6">
                            <dt>Nombre</dt><dd>{{ $libro->nombre }}</dd>
                            <dt>Codigo de editorial</dt><dd>{{ $libro->editorial_id }}</dd>
                            <dt>Codigo de tipo</dt><dd>{{ $libro->tipo_id }}</dd>
                            <dt>Codigo de pais</dt><dd>{{ $libro->pais_id }}</dd>
                            <dt>Codigo de autor</dt><dd>{{ $libro->autor_id }}</dd>
                        </div>

                        <div class="col-6">
                            
                        </div>
                    </div>
                    </dl>
                    <br>  
                    
                    <a href="/home" type="button" class="btn btn-primary">Regresar</a>
                    <a href="{{ route('libros.edit', $libro->id) }}" class="btn btn-warning">Editar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection