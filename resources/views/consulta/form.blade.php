<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_materia') }}
            {{ Form::text('id_materia', $consulta->id_materia, ['class' => 'form-control' . ($errors->has('id_materia') ? ' is-invalid' : ''), 'placeholder' => 'Id Materia']) }}
            {!! $errors->first('id_materia', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_materia') }}
            {{ Form::select('id_materia', $materias , $consulta->id_materia, ['class' => 'form-control' . ($errors->has('id_materia') ? ' is-invalid' : ''), 'placeholder' => 'Id Materia']) }}
            {!! $errors->first('id_materia', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_profesor') }}
            {{ Form::text('id_profesor', $consulta->id_profesor, ['class' => 'form-control' . ($errors->has('id_profesor') ? ' is-invalid' : ''), 'placeholder' => 'Id Profesor']) }}
            {!! $errors->first('id_profesor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha') }}
            {{ Form::text('fecha', $consulta->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipo') }}
            {{ Form::text('tipo', $consulta->tipo, ['class' => 'form-control' . ($errors->has('tipo') ? ' is-invalid' : ''), 'placeholder' => 'Tipo']) }}
            {!! $errors->first('tipo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('lugar') }}
            {{ Form::text('lugar', $consulta->lugar, ['class' => 'form-control' . ($errors->has('lugar') ? ' is-invalid' : ''), 'placeholder' => 'Lugar']) }}
            {!! $errors->first('lugar', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>