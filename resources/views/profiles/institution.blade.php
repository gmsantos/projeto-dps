@extends('layouts.app')

@section('title', 'Perfil Instituição')

@section('content')
  <h2>Perfil da Instituição</h2>

  <p><b>Nome:</b> {{$institution->name}}</p>
  <p><b>Endereço:</b> {{$institution->address}}</p>
  <p><b>Cidade:</b> {{$institution->city}}</p>

  @unless($institution->volunteers->isEmpty())
    <p><b>Voluntários associados:</b></p>
    <ul>
    @foreach($institution->volunteers as $volunteer)
      <li>{{$volunteer->name}}</li>
    @endforeach
    </ul>
  @endunless
@endsection