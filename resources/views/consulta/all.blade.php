@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <h2 class="text-center text-muted mb-3">Consultas</h2>
                <!-- Make a search input -->
                <div class="col-md-6 mx-auto">
                    <form action="" method="GET">
                        <div class="input-group mb-3">
                            <input type="search" name="search" class="form-control bg-dark text-info" placeholder="Buscar por materia" aria-label="Buscar por materia" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary bg-primary" type="submit" id="button-addon2">Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="row">
                    @foreach($consultas as $consulta)

                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h4 class="card-title text-center mb-1">{{ $consulta->materia->nombre }}</h4>
                                <h5 class="card-text text-center"><strong>{{ $consulta->user->name }}</strong></h5>
                                <p class="card-text text-center text-muted">{{ $consulta->nombre }}</p>
                                <!-- <p class="card-subtitle mb-2">{{ $consulta->id_profesor }}</p>
                                <p class="card-text">{{ $consulta->fecha }}</p>
                                <p class="card-text">{{ $consulta->tipo }}</p>
                                <p class="card-text">{{ $consulta->lugar }}</p>-->
                                <!-- <a href="{{ route('consultas.show', $consulta->id) }}" class="btn btn-primary btn-block">Ver</a> -->
                                <!-- <a href="{{ route('inscripciones.create', $consulta->id) }}" class="card-link">Ver</a>  -->
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item text-center"><strong>Fecha:</strong> {{ date('d-M-Y | H:i', strtotime($consulta->fecha))}} hs</li>
                                <li class="list-group-item text-center"><strong>Tipo:</strong> {{ $consulta->tipo }}</li>
                                <li class="list-group-item text-center"><strong>Lugar:</strong> {{ $consulta->lugar }}</li>
                                <li class="list-group-item text-center"><strong>Inscriptos:</strong> {{ $consulta->inscripciones->count() }}</li>
                                <a class="btn btn-sm btn-primary " href="{{ route('inscribirse',$consulta->id) }}"><i class="fa fa-fw fa-eye"></i> Inscribirme</a>
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>    
            </div>
        </div>
    </div>
@endsection

