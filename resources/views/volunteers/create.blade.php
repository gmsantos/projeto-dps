@extends('layouts.app')

@section('title', 'Criar novo Voluntário')

@section('content')

<h2>Criar novo Voluntário</h2>

{!! Form::open(['route' => 'volunteer.store']) !!}

    @include('volunteers.form')
    
{!! Form::close() !!}

<a href="{{ route('volunteer.index') }}">Voltar para a Lista</a>

@endsection