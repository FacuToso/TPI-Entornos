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
                            {{ $inscripcione->user->name }}
                        </div>
                        <br>
                        <div class="form-group">
                            <strong>Materia:</strong>
                            {{ $inscripcione->consulta->materia->nombre }}                            
                        </div>
                        <div class="form-group">
                            <strong>Docente:</strong>
                            {{ $inscripcione->consulta->user->name }}
                        </div> 
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $inscripcione->consulta->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo:</strong>
                            {{ $inscripcione->consulta->tipo }}
                        </div>
                        <div class="form-group">
                            <strong>Lugar:</strong>
                            {{ $inscripcione->consulta->lugar }}
                        </div>
                        <br>
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
