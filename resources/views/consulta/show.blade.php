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
                            <a class="btn btn-primary" href="{{ route('consultas.index') }}"> Back</a>
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
            </div>
        </div>
    </section>
@endsection
