@extends('layouts.app')

@section('title', 'Criar nova Causa')

@section('content')

<h2>Criar nova Causa</h2>

{!! Form::open(['route' => 'cause.store']) !!}

    @include('causes.form')
    
{!! Form::close() !!}

<a href="{{ route('cause.index') }}">Voltar para a Lista</a>

@endsection