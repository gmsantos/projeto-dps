<div class="form-group">
    {!! Form::label('cause', 'Causa') !!}
    {!! Form::text('cause', null, ['class' => 'form-control', 'placeholder' => 'Causa']) !!}
</div>

{!! Form::submit('Enviar', ['class' => 'btn btn-default']) !!}
