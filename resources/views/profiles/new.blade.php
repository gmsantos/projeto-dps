@extends('layouts.app')

@section('title', 'Criar perfil')

@section('content')
<div>
  <h1>Escolha seu perfil</h1>
  <form action="{{ route('profile.create') }}" method="POST" enctype="multipart/form-data">
    
    {!! csrf_field() !!}
    
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                Instituição
                </a>
            </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" data-role="institution" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">

                <div class="form-group">
                    {!! Form::label('name', 'Nome') !!}
                    {!! Form::text('name', auth()->user()->name, ['class' => 'form-control', 'placeholder' => 'Nome', 'disabled' => true]) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('address', 'Endereço') !!}
                    {!! Form::text('address', old('address'), ['class' => 'form-control', 'placeholder' => 'Endereço']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('city', 'Cidade') !!}
                    {!! Form::text('city', old('city'), ['class' => 'form-control', 'placeholder' => 'Cidade']) !!}
                </div>
                
            </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Voluntário
                </a>
            </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" data-role="volunteer" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
                <div class="form-group">
                    {!! Form::label('name', 'Nome') !!}
                    {!! Form::text('name', auth()->user()->name, ['class' => 'form-control', 'placeholder' => 'Nome', 'disabled' => true]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('phone', 'Telefone') !!}
                    {!! Form::tel('phone', old('phone'), ['class' => 'form-control', 'placeholder' => 'Telefone']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', auth()->user()->email, ['class' => 'form-control', 'placeholder' => 'Email', 'disabled' => true]) !!}
                </div>
            </div>
            </div>
        </div>
    </div>
    
    <input type="hidden" name="role" id="role" value="" />

    <div class="form-group">
        {!! Form::submit('Enviar', ['class' => 'btn btn-default']) !!}
    </div>
    
  </form>
</div>

@endsection

@push('scripts')
<script>
    $('#accordion').on("shown.bs.collapse", function (e) {
        var role = $(".panel-collapse.collapse.in").data('role');
        $("#role").val(role);
    });
</script>
@endpush