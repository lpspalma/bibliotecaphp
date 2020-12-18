<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>eBooks - a sua livraria on line</title>
<link href="imagens/logoicon.png" rel="icon">
<link rel="stylesheet" href="css/estilo.css">
<script src="js/jquery-3.3.1.min.js"></script>
<link href="slick/slick-theme.css" rel="stylesheet">
<link href="slick/slick.css" rel="stylesheet">
<script src="slick/slick.min.js"></script>
<script src="js/script.js"></script>
</head>

<body>
	<?php include_once("nav.php");?>
	<?php include_once("banner.php");?>
	<section id="corpo">
		<?php
			include_once("admin/conecta.php");
			$recid=$_GET["id"];
			$dados=mysqli_query($conexao, "SELECT * FROM produtos WHERE id=$recid");
			$campo=mysqli_fetch_array($dados);?>
			<div class="descriprod">
				<img src="admin/capas/<?=$campo['capa']?>" alt="">
				<h2><?=$campo['titulo']?></h2>
				<h4>Autor: <?=$campo['autor']?></h4>
				<h2>Valor: <?=number_format($campo['valor'],2,',','.')?></h2>
				<br><br><br>
				<h4>Genero: <?=$campo['genero']?></h4>
				<h4>Editora: <?=$campo['editora']?></h4>
				<h4>Nacionalidade: <?=$campo['nacionalidade']?></h4>
			</div>
	</section>
	<?php include_once("footer.php");?>
</body>
</html>
