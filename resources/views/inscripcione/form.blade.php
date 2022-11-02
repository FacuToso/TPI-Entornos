<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_alumno') }}
            {{ Form::select('id_alumno', $users, $inscripcione->id_alumno, ['class' => 'form-control' . ($errors->has('id_alumno') ? ' is-invalid' : ''), 'placeholder' => 'Id Alumno']) }}
            {!! $errors->first('id_alumno', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_consulta') }}
            {{ Form::select('id_consulta', $consultas , $inscripcione->id_consulta, ['class' => 'form-control' . ($errors->has('id_consulta') ? ' is-invalid' : ''), 'placeholder' => 'Id Consulta']) }}
            {!! $errors->first('id_consulta', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('observaciones') }}
            {{ Form::text('observaciones', $inscripcione->observaciones, ['class' => 'form-control' . ($errors->has('observaciones') ? ' is-invalid' : ''), 'placeholder' => 'Observaciones']) }}
            {!! $errors->first('observaciones', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>