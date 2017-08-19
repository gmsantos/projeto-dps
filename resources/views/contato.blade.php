@extends('layouts.app')

@section('title', 'Contato - Voluntarios')

@section('content')
<div>
  <h1>Entre em contato:</h1>
  <form action="{{ route('contato.send') }}" method="POST" enctype="multipart/form-data">
    
    {!! csrf_field() !!}
    
    <div class="form-group">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" name="nome" value="{{ old('nome') }}" placeholder="Nome">
    </div>
    
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
    </div>
    
    <div class="form-group">
      <label for="mensagem">Mensagem</label>
      <textarea class="form-control" name="mensagem" rows="3">{{ old('mensagem') }}</textarea>
    </div>
    
     <div class="form-group">
      <label for="log">Log de anotações</label>
      <input type="file" class="form-control" name="log" value="{{ old('log') }}">
    </div>
    
    <div class="form-group">
      <button type="submit" class="btn btn-default">Enviar</button>
    </div>
    
  </form>
</div>

@endsection