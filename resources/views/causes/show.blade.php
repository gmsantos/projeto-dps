@extends('layouts.app')

@section('title', 'Detalhes da Causa')

@section('content')

<h2>Detalhes da Causa</h2>

<p><b>Causa:</b> {{$cause->cause}}</p>

@unless($cause->volunteers->isEmpty())
	<p><b>Voluntários com essa causa:</b></p>
	<ul>
	@foreach($cause->volunteers as $volunteer)
		<li>{{$volunteer->name}}</li>
	@endforeach
	</ul>
@endunless

<a href="{{ route('cause.index') }}">Voltar para a Lista</a>

@endsection