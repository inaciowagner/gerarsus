<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="icon" href="img/icon_SUS_256_256.png" type="image/png" sizes="16x16">

	
	<title>..::VIVA O SUS!::..</title>
</head>
<body> 
		<header>
			<h1>Gere Seu Cartão do SUS!</h1>
			
		</header>
	<!-- https://github.com/inaciowagner/inaciowagner.git -->
	<div id="interface">
	<form method="get" id="form" action="sus.php">
		<legend><h3>Entre com seus dados</h3></legend>
		<p>
			<label for="campo-nome">Nome: </label> <input type="text" name="texto-nome" id="campo-nome" size="30" placeholder="Digite seu nome completo">
		</p> 
		<p>
			<label for="campo-data">Data Nascimento: </label> <input type="date" name="texto-data" id="campo-data">
		</p>
		<fieldset id="fieldset-sexo"><legend><label> Sexo:</label></legend>
				<p>
					<label for="masculino">Masculino: </label>	<input type="radio" name="sexo" id="masculino" value="M">
					<label for="feminino">Feminino </label>	<input type="radio" name="sexo" id="feminino" value="F">
				</p>
		</fieldset>
		<p>
			<label>Número do Cartão do SUS: </label> <br> <input class="form-control" type="number" minlength="15" maxlength="15" name="texto-numero" id="sus" placeholder="N° do cartão do SUS" min="" >
		</p>
		<p>
			<input type="submit" class="btn" name="botao" value="Clique para gerar">
		</p>
	</form>
	</div>
</body>

<footer>
	
	
	<div id="contados"> 
		<h3>Contatos</h3>
		<a href="mailto:inaciowagner@gmail.com"> <img id="icon" src="imagens/icons8-gmail-48.png"> </a>
		<a href="https://twitter.com/inacio_wagner" target="_blank"> <img id="icon" src="imagens/icons8-twitter-48.png"> </a>
		<a href="https://www.instagram.com/inaciowagner/" target="_blank"> <img id="icon" src="imagens/icons8-instagram-48.png"> </a>
		<a href="https://api.whatsapp.com/send?phone=5584988167832"> <img id="icon" src="imagens/icons8-whatsapp-48.png"> </a>
</div>
</footer>
</html>