<?php
	session_start();
	if(isset($_SESSION["iduser"])){
	
	
?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Área Administrativa | eBooks - a sua livraria on line</title>
<link href="../imagens/logoicon.png" rel="icon">
<link rel="stylesheet" href="css/estilo.css">
<link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
<script src="js/scriptpreco.js"></script>
</head>

<body>
	<?php include_once("header.php");?>
	<h2 class="titulopg"> Cadastro de novos produtos</h2>
	<form class="formulario" action="gravanewprod.php" method="post" enctype="multipart/form-data"><!--enctype eh o comando para enviar os arquivos alem dos dados no formulario-->
	<input type="text" name="ftitulo" placeholder="Titulo" required class="campo">
	<input type="text" name="fautor" placeholder="Autor" required class="meiocampo">
	<input type="text" name="feditora" placeholder="Editora" required class="meiocampo">
		<select name="fgenero"  required class="campo"> 
			<option value="">Selecione um gênero</option>
			<option value="aventura">Aventura</option>
			<option value="autoajuda">Auto Ajuda</option>
			<option value="comedia">Comédia</option>
			<option value="drama">Drama</option>
			<option value="romance">Romance</option>
			<option value="terror">Terror</option>
			<option value="outros">Outros</option>
		</select>
	
	<input type="text" name="fvalor" placeholder="Valor" required class="meiocampo" onKeyPress="mascara(this, moeda)" >
	<input type="text" name="fnac" placeholder="Nacionalidade" required class="meiocampo">
	<input type="file" name="fcapa" required class="campo">
	<input type="submit" value="Gravar Produto" class="botao">
	</form>
</body>
</html>


<?php 
	}else{
		$erro=md5(2);
		header("location:index.php?erro=$erro");
	}

?>