<body>
	<h1>Email de contato</h1>
	
	<p>O usuário {{ $nome }} enviou a seguinte mensagem:</p>
	
	<pre>{{ $mensagem }}</pre>
	
	<p><a href="mailto:{{ $email }}">Clique aqui para responder</a></p>
	
	<img src="{{ $message->embed(storage_path('app/email-signature.jpg')) }}">
	
</body>