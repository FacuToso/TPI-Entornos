@extends('layouts.app')

@section('template_title')
    Update Consulta
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Consulta</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('consultas.update', $consulta->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('consulta.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')

<script>

    // generateNombre Metodo para generar el nombre de la consulta
    function generateNombre() {
        console.log('generateNombre');

        var materia = document.getElementById('id_materia').selectedOptions[0].text;
        materia = materia.replace(/\s+/g, '');
        materia = materia.replace(/[a-z]/g, '');
        
        var profesor = document.getElementById('id_profesor').selectedOptions[0].text;
        profesor = profesor.replace(/\s+/g, '');
        profesor = profesor.replace(/[a-z]/g, '');

        var fecha = document.getElementById("fecha").value;
        fecha = fecha.substring(5, 16);

        var tipo = document.getElementById("tipo").value;
        tipo = tipo.replace(/\s+/g, '');
        tipo = tipo.replace(/[a-z]/g, '');

        var nombre = materia + "-" + profesor + "-" + fecha + "-" + tipo;
        document.getElementById("nombre").value = nombre;
    }
</script>

@endsection
