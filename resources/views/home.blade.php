@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center ">{{ __('Bienvenido a ConsultameUTN') }}</div>

                <div class="card-body ">              
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <img class='img-fluid' src="/images/UTNFRRO.png" alt="UTN FRRO">
                    <!-- get current user -->

                    <!-- Description of the system -->
                    <p class="text-center">
                        ConsultameUTN es un sistema de gestión de consultas para alumnos de la Universidad Tecnológica Nacional, Facultad Regional Rosario.
                        El sistema permite a los alumnos inscribirse a consultas de los profesores de la facultad, y a los profesores gestionar las consultas que les solicitan los alumnos.
                    </p>

                    <div class="card shadow-sm mb-2 bg-white rounded">
                        
                    <!-- check if auth::user() exist -->
                    @if (Auth::user())

                        @if (Auth::user()->role == 'NONVERIFIED')
                                <h3 class="text-center mt-2"><strong>No estas verificado</strong></h3>
                                <h4 class="text-center">Para mas informacion contacta con el administrador del sitio</h4>
                        @endif

                        @if (Auth::user()->role == 'ADMIN')
                                <h4 class="text-center mt-2">Bienvenido<strong> {{Auth::user()->name}}</strong></h4>
                                <h5 class="text-center">Esta verificado como: <strong>Administrador</strong></h5>
                        @endif

                        @if (Auth::user()->role == 'DOCENTE')
                                <h4 class="text-center mt-2">Bienvenido<strong> {{Auth::user()->name}}</strong></h4>
                                <h5 class="text-center">Esta verificado como: <strong>Docente</strong></h5>
                        @endif

                        @if (Auth::user()->role == 'ALUMNO')
                                <h4 class="text-center mt-2">Bienvenido<strong> {{Auth::user()->name}}</strong></h4>
                                <h5 class="text-center">Esta verificado como: <strong>Alumno</strong></h5>
                        @endif
                    @else
                        <div class="text-center">
                            <h4 class="text-center">Todavia no iniciaste sesion</h4>
                            <h5 class="text-center">Si aun no tienes un cuenta <strong>Registrate</strong></h5>
                        </div>
                    @endif
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
