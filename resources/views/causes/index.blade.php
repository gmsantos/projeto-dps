@extends('layouts.app')

@section('title', 'Causas')

@section('content')

<h1>Causas</h1>

@can('create', new \App\Cause)
	<p><a href="{{ route('cause.create') }}">Criar Nova Causa</a></p>
@endcan

<table class="table">
	<thead>
		<tr><th>Causa</th><th></th></tr>
	</thead>

<tbody>
@foreach($causes as $cause)

<tr>
	<td><a href="{{ route('cause.show', $cause->id) }}">{{$cause->cause}}</a></td>
	<td>
		@can('update', $cause) 
			<a href="{{ route('cause.edit', $cause->id) }}">Editar</a> - 
		@endcan
		<a href="{{ route('cause.destroy', $cause->id) }}" data-method="DELETE">Excluir</a>
	</td>
</tr>

@endforeach
</tbody>
</table>

{!! $causes->render() !!}

@endsection