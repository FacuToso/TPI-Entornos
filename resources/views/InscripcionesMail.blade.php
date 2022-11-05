
@component('mail::message')

# Inscripciones a consulta {{ $consulta->nombre }}

# Info Consulta:
    Profesor: {{$consulta->user->name}}
    Materia: {{$consulta->materia->nombre}}
    Fecha: {{ date('d-M-Y | H:i', strtotime($consulta->fecha))}} hs
    Tipo: {{$consulta->tipo}}
    Lugar: {{$consulta->lugar}}

# Inscripciones:
    @if ($inscripciones->count() == 0)
    
# Todavia no hay inscripciones

    @else
    @foreach ($inscripciones as $ins)
    
    Inscripcion {{$loop->iteration}}
    Alumno: {{$ins->user->name}}
    Email: {{$ins->user->email}}
    Observaciones: {{$ins->observaciones}}
    
    - - - - - - - - -
    @endforeach
    @endif

@endcomponent

