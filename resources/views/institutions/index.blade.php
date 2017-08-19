@extends('layouts.app')

@section('title', 'Instituições')

@section('content')

<h1>Instituições</h1>

<p><a href="{{ route('institution.create') }}">Criar Nova Instituição</a></p>

<table class="table">
	<thead>
		<tr><th>Nome</th><th>Endereço</th><th>Cidade</th><th></th></tr>
	</thead>

<tbody>
@foreach($institutions as $institution)

<tr>
	<td><a href="{{ route('institution.show', $institution->id) }}">{{$institution->name}}</a></td>
	<td>{{$institution->address}}</td>
	<td>{{$institution->city}}</td>
	<td>
		<a href="{{ route('institution.edit', $institution->id) }}">Editar</a> - 
		<a href="{{ route('institution.destroy', $institution->id) }}" data-method="DELETE">Excluir</a>
	</td>
</tr>

@endforeach
</tbody>
</table>

{!! $institutions->render() !!}

@endsection