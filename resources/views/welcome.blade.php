@extends('layouts.app')

@section('title', 'Inicio - Voluntarios')

@push('scripts')

  <script src="https://js.pusher.com/3.0/pusher.min.js"></script>
  <script>
    // Enable pusher logging - don't include this in production
    Pusher.log = function(message) {
      if (window.console && window.console.log) {
        window.console.log(message);
      }
    };

    var pusher = new Pusher('408fad95ea244709492d', {
      encrypted: true
    });
    var channel = pusher.subscribe('test_channel');
    channel.bind('app.cause-edited', function(data) {
      alert(data.cause.cause);
    });
  </script>

@endpush

@section('content')
<div class="starter-template">
  <h1>Desenvolvimento de Projeto de Sistemas II</h1>
  <p class="lead">Projeto Voluntários.</p>
</div>
@endsection
