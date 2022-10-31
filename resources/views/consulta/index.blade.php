@extends('layouts.app')

@section('template_title')
    Consulta
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Consulta') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('consultas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
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
                                        <th>No</th>
                                        
										<th>Id Materia</th>
										<th>Id Profesor</th>
										<th>Fecha</th>
										<th>Tipo</th>
										<th>Lugar</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($consultas as $consulta)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $consulta->id_materia }}</td>
											<td>{{ $consulta->id_profesor }}</td>
											<td>{{ $consulta->fecha }}</td>
											<td>{{ $consulta->tipo }}</td>
											<td>{{ $consulta->lugar }}</td>

                                            <td>
                                                <form action="{{ route('consultas.destroy',$consulta->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('consultas.show',$consulta->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('consultas.edit',$consulta->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $consultas->links() !!}
            </div>
        </div>
    </div>
@endsection
