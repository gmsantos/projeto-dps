<div class="form-group">
    {!! Form::label('name', 'Nome') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome', 'disabled' => true]) !!}
</div>

<div class="form-group">
    {!! Form::label('address', 'Endereço') !!}
    {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Endereço']) !!}
</div>

<div class="form-group">
    {!! Form::label('city', 'Cidade') !!}
    {!! Form::tel('city', null, ['class' => 'form-control', 'placeholder' => 'Cidade']) !!}
</div>

{!! Form::submit('Enviar', ['class' => 'btn btn-default']) !!}
