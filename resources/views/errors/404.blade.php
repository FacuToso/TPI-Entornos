@extends('layouts.app')

@section('content')
<!-- Make a 404 page -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 style="font-size: 150px;" class="text-center"><strong>404</strong></h2>
                </div>
                <div class="card-body">
                    <h2 class="text-center">No se encontró la página</h2>
                </div>
                <!-- Make a centered button to redirect to home -->
                <div class="card-footer">
                    <div class="d-flex justify-content-center">
                        <a style="width: 300px; " class="btn btn-primary" href="{{ route('home') }}">Volver al inicio</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection