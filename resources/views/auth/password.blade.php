@extends('layouts.app')

@section('title', 'Esqueci minha senha')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Reset Senha</div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label class="col-md-4 control-label">E-Mail</label>
                <div class="col-md-6">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Enviar Link de reset de senha
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection