@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-13">
            <div class="card">
                <div class="card-header">Libro Actualizado</div>
                    
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>Libro actualizado exitosamente</h1>
                    <br>
                     
                    <a href="/home" type="button" class="btn btn-primary">Regresar</a>
                   
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection