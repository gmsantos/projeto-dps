@extends('layouts.app')

@section('title', 'Registrar')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Reset Senha</div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label class="col-md-4 control-label">E-Mail</label>
                <div class="col-md-6">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Nova Senha</label>
                <div class="col-md-6">
                    <input type="password" class="form-control" name="password">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Confirmar Nova Senha</label>
                <div class="col-md-6">
                    <input type="password" class="form-control" name="password_confirmation">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Reset Password
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection