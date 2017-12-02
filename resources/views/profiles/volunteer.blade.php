@extends('layouts.app')

@section('title', 'Perfil Voluntário')

@section('content')
  <h2>Perfil do Voluntário</h2>

  <p><b>Nome:</b> {{$volunteer->name}}</p>
  <p><b>Telefone:</b> {{$volunteer->phone}}</p>
  <p><b>Email:</b> {{$volunteer->email}}</p>

  @unless($volunteer->causes->isEmpty())
    <p><b>Causas apoiadas:</b></p>
    <ul>
    @foreach($volunteer->causes as $cause)
      <li>{{$cause->cause}}</li>
    @endforeach
    </ul>
  @endunless

@endsection