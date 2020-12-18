<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Área Administrativa | eBooks - a sua livraria on line</title>
<link href="../imagens/logoicon.png" rel="icon">
<link rel="stylesheet" href="css/estilo.css">
<link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
</head>

<body>
	<center>
		<img src="../imagens/logo.jpg" class="logo">
		<h1 class="titulo">Área Administrativa</h1>
		<h2>Acesso Restrito - Favor entrar com usuário e senha</h2>
		<div class="formulario">
			<form method="post" action="login.php">
				<input type="text" name="fuser" placeholder="USUÁRIO" required class="campo">
				<input type="password" name="fpass" placeholder="SENHA" required class="campo">
				<input type="submit" value="ACESSAR" class="botao">
			</form>
		</div>
		<h3>
			<?php
				$errologin=md5(1);
				$erroacesso=md5(2);
				if($_GET){
					if ($_GET["erro"] == $errologin){
						echo "Usuário e/ou senha incorreto(s). Favor tentar novamente.";
					}
				}
				if($_GET){
					if ($_GET["erro"] == $erroacesso){
						echo "A página que você esta tentando acessar é restrita. Por favor entre com usuario e senha.";
					}
				}
			?>
		</h3>
	</center>
</body>
</html>