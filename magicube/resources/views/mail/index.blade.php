<head>
	<meta charset="utf-8">
	<style>
		* {
			margin:0;
			padding: 0;
			font: 16px normal Arial, sans-serif;
			color: #777
		}
		h2 {
			font-size: 28px;
			font-weight: bold;
			color: #ccc
		}
		body {
			background: #f0f0f0
		}
		hr {
			margin: 30px 0  ;
			background: #ccc;
			display: block;
			width:100%;
			height:1px;
			border:none
		}
		.message {
			padding: 5%;
			box-sizing: border-box
		}
		p {
			margin-bottom: 15px
		}
		.input {
			font-weight: bold;
			color: #aaa
		}
	</style>
</head>
<body>
	<div class="message">
		<h2>Uma nova mensagem: {{ $message-type }} @if(!empty($type)) Tipo: {{ $type }} @endif</h2>
		<hr>
		<p><span class="input">Nome: </span>{{ $name }}</p>
		<p><span class="input">Tel.: </span>{{ $tel }}</p>
		<p><span class="input">Email: </span>{{ $email }}</p>
		<hr>
		<p><span class="input">Mensagem: </span><br>{{ $mensagem }}</p>
	</div>
</body>