<div class="form-group">
    {!! Form::label('name', 'Nome') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}
</div>

<div class="form-group">
    {!! Form::label('phone', 'Telefone') !!}
    {!! Form::tel('phone', null, ['class' => 'form-control', 'placeholder' => 'Telefone']) !!}
</div>

<div class="form-group">
    {!! Form::label('email', 'Email') !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
</div>

<div class="form-group">
    {!! Form::label('institution_id', 'Instituição') !!}
    {!! Form::select('institution_id', $institutions, null, ['class' => 'form-control', 'placeholder' => 'Selecione uma Instituição...']) !!}
</div>

<div class="form-group">
    {!! Form::label('causes_list', 'Causas') !!}
    {!! Form::select('causes_list[]', $causes, null, ['class' => 'form-control', 'multiple' => 'multiple']) !!}
</div>

{!! Form::submit('Enviar', ['class' => 'btn btn-default']) !!}
