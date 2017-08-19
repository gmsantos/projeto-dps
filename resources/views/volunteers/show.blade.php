@extends('layouts.app')

@section('title', 'Detalhes do Voluntário')

@section('content')

<h2>Detalhes do Voluntário</h2>

<p><b>Nome:</b> {{$volunteer->name}}</p>
<p><b>Telefone:</b> {{$volunteer->phone}}</p>
<p><b>Email:</b> {{$volunteer->email}}</p>
<p><b>Instituição:</b> {{$volunteer->institution->name}}</p>

@unless($volunteer->causes->isEmpty())
	<p><b>Causas apoiadas:</b></p>
	<ul>
	@foreach($volunteer->causes as $cause)
		<li>{{$cause->cause}}</li>
	@endforeach
	</ul>
@endunless

<a href="{{ route('volunteer.index') }}">Voltar para a Lista</a>

@endsection