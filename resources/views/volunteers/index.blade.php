@extends('layouts.app')

@section('title', 'Voluntários')

@section('content')

<h1>Voluntários</h1>

<p><a href="{{ route('volunteer.create') }}">Criar Novo Voluntário</a></p>

<table class="table">
	<thead>
		<tr><th>Nome</th><th>Email</th><th></th></tr>
	</thead>

<tbody>
@foreach($volunteers as $volunteer)

<tr>
	<td><a href="{{ route('volunteer.show', $volunteer->id) }}">{{$volunteer->name}}</a></td>
	<td>{{$volunteer->email}}</td>
	<td>
		<a href="{{ route('volunteer.edit', $volunteer->id) }}">Editar</a> - 
		<a href="{{ route('volunteer.destroy', $volunteer->id) }}" data-method="DELETE">Excluir</a>
	</td>
</tr>

@endforeach
</tbody>
</table>

{!! $volunteers->render() !!}

@endsection