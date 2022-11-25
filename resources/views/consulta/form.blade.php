<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_materia') }}
            {{ Form::select('id_materia', $materias , $consulta->id_materia, ['class' => 'form-control' . ($errors->has('id_materia') ? ' is-invalid' : ''), 'placeholder' => 'Id Materia']) }}
            {!! $errors->first('id_materia', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_profesor') }}
            {{ Form::select('id_profesor', $users , $consulta->id_profesor, ['class' => 'form-control' . ($errors->has('id_profesor') ? ' is-invalid' : ''), 'placeholder' => 'Id Profesor']) }}
            {!! $errors->first('id_profesor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha') }}
            {{ Form::datetimelocal('fecha', $consulta->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipo') }}
            {{ Form::select('tipo', 
                array(
                'Presencial' => 'Presencial', 
                'Virtual' => 'Virtual')
                , $consulta->tipo, ['class' => 'form-control' . ($errors->has('tipo') ? ' is-invalid' : ''), 'placeholder' => 'Tipo']) }}
            {!! $errors->first('tipo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('lugar') }}
            {{ Form::text('lugar', $consulta->lugar, ['class' => 'form-control' . ($errors->has('lugar') ? ' is-invalid' : ''), 'placeholder' => 'Lugar']) }}
            {!! $errors->first('lugar', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre') }}
            - ID Autogenerada | Este campo sera el ID de tu consulta. Se autogenerara al confirmar o puedes previsualizarla.
            {{ Form::text('nombre', $consulta->nombre , ['class' => 'form-control secondary' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre', 'disabled' => 'true']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
            <!-- Button to generate preview of nombre -->
            <button type="button" class="btn btn-primary mt-1" onclick="generateNombre()">Previsualizar Nombre - ID</button>
            
        </div>


    </div>
    <div class="box-footer mt20">
        <!-- on click do generateNombre -->
        <button type="submit" class="btn btn-primary mt-3" onclick="generateNombre()">Confirmar</button>
    </div>
</div>