@extends('layouts.app')

@section('template_title')
    {{ $inscripcione->name ?? 'Show Inscripcione' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Inscripcione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('inscripciones.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Alumno:</strong>
                            {{ $inscripcione->id_alumno }}
                        </div>
                        <div class="form-group">
                            <strong>Id Consulta:</strong>
                            {{ $inscripcione->id_consulta }}
                        </div>
                        <div class="form-group">
                            <strong>Observaciones:</strong>
                            {{ $inscripcione->observaciones }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
