@extends('layouts.app')

@section('template_title')
    {{ $consulta->name ?? 'Show Consulta' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Consulta</span>
                        </div>
                        <div class="float-right">
                            @if(Auth::user()->role == "ADMIN")
                            <a class="btn btn-primary" href="{{ route('consultas.index') }}"> Back</a>
                            @else
                            <a class="btn btn-primary" href="{{ route('misconsultas', Auth::user()->id) }}"> Back</a>
                            @endif
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Materia:</strong>
                            {{ $consulta->id_materia }}
                        </div>
                        <div class="form-group">
                            <strong>Id Profesor:</strong>
                            {{ $consulta->id_profesor }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $consulta->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo:</strong>
                            {{ $consulta->tipo }}
                        </div>
                        <div class="form-group">
                            <strong>Lugar:</strong>
                            {{ $consulta->lugar }}
                        </div>
                    </div>
                </div>             
                    @if ($inscripciones->count() == 0)
                        <div class="card">
                            <div class="card-body"> 
                                <div class="form-group">
                                    <strong>Todavia no hay inscripciones</strong>
                                </div>
                            </div>
                        </div>
                    @else
                        <h4 class="mt-3">Inscripciones:</h2>
                        @foreach ($inscripciones as $ins)
                            <div class="card">
                                <div class="card-body">                            
                                    <div class="form-group">
                                        <strong>Alumno:</strong>
                                        {{ $ins->user->name }}
                                    </div>
                                    <div class="form-group">
                                        <strong>Email:</strong>
                                        {{ $ins->user->email }}
                                    </div>
                                    <div class="form-group">
                                        <strong>Observaciones:</strong>
                                        {{ $ins->observaciones }}
                                    </div>
                                </div>                   
                            <div>
                        @endforeach
                    @endif

            </div>
        </div>
    </section>
@endsection
