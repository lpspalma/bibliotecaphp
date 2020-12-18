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
	<?php
		include_once("header.php");
		
		//conexão
		include_once("conecta.php");
								   
		//receber os dados
		$recid=$_GET["id"];
								   
		//buscando os dados no banco
		$dados=mysqli_query($conexao, "SELECT * FROM produtos WHERE id=$recid");
		
		//separando os dados
		$item=mysqli_fetch_array($dados);
	?>
	<h2 class="titulopg">Alterações de Produtos</h2>
	<form method="post" action="gravaeditaprod.php" enctype="multipart/form-data" class="formulario">
	<input type="hidden" name="nomecapa" value="<?=$item['capa']?>">
	<input type="hidden" name="fid" value="<?=$item['id']?>">
		<input type="text" name="ftitulo" placeholder="Título" required class="campo" value="<?=$item['titulo']?>">
		<input type="text" name="fautor" placeholder="Autor" required class="meiocampo" value="<?=$item['autor']?>">
		<input type="text" name="feditora" placeholder="Editora" required class="meiocampo" value="<?=$item['editora']?>">
		<select name="fgenero" required class="campo">
			<option value="">Selecione um gênero</option>
			<option value="aventura" <?php if($item['genero'] == 'aventura'){echo "selected";} ?>>Aventura</option>
			<option value="comedia" <?php if($item['genero'] == 'comedia'){echo "selected";} ?>>Comédia</option>
			<option value="romance" <?php if($item['genero'] == 'romance'){echo "selected";} ?>>Romance</option>
			<option value="terror" <?php if($item['genero'] == 'terror'){echo "selected";} ?>>Terror</option>
			<option value="drama" <?php if($item['genero'] == 'drama'){echo "selected";} ?>>Drama</option>
			<option value="outros" <?php if($item['genero'] == 'outros'){echo "selected";} ?>>Outros</option>
		</select>
		<input type="text" name="fvalor" required placeholder="Valor" class="meiocampo" onKeyPress="mascara(this, moeda)" value="<?=number_format($item['valor'],2,',','.')?>" >
		<input type="text" name="fnac" required placeholder="Nacionalidade" class="meiocampo" value="<?=$item['nacionalidade']?>">
		<img src="capas/<?=$item['capa']?>" width="50" alt="" align="middle" hspace="20" vspace="20" >
		<input type="file" name="fcapa" >
		<input type="submit" value="Salvar Alterações" class="botao">
	</form>
</body>
</html>
<?php
  }else{
		$erro=md5(2);
		header("location:index.php?erro=$erro");
	}
?>



