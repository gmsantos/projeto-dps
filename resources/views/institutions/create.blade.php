@extends('layouts.app')

@section('title', 'Criar nova Instituição')

@section('content')

<h2>Criar nova Instituição</h2>

{!! Form::open(['route' => 'institution.store']) !!}

    @include('institutions.form')
    
{!! Form::close() !!}

<a href="{{ route('institution.index') }}">Voltar para a Lista</a>

@endsection