@extends('layouts.app')

@section('template_title')
    Inscripcione
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Inscripciones') }}
                            </span>
                            @if(Auth::user()->role == "ADMIN")
                                <div class="float-right">
                                    <a href="{{ route('inscripciones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Crear nuevo') }}
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>ID</th>
                                        
										<th>Alumno</th>
										<th>Consulta</th>
										<th>Observaciones</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inscripciones as $inscripcione)
                                        <tr>
                                            <td>{{ $inscripcione->id }}</td>
                                            
											<td>{{ $inscripcione->user->name }}</td>
											<td>{{ $inscripcione->consulta->materia->nombre . " | " . $inscripcione->consulta->user->name }}</td>
											<td>{{ $inscripcione->observaciones }}</td>

                                            <td>
                                                <form action="{{ route('inscripciones.destroy',$inscripcione->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('inscripciones.show',$inscripcione->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    @if(Auth::user()->role == "ADMIN")
                                                        <a class="btn btn-sm btn-success" href="{{ route('inscripciones.edit',$inscripcione->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @endif
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $inscripciones->links() !!}
            </div>
        </div>
    </div>
@endsection
