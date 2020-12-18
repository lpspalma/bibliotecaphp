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
			$dados=mysqli_query($conexao, "SELECT * FROM produtos ORDER BY RAND() LIMIT 8");
			while ($campo=mysqli_fetch_array($dados)){?>
				<a href="descrilivros.php?id=<?=$campo['id']?>">
				<div class="listalivros">
					<img src="admin/capas/<?=$campo['capa']?>">
					<p>
						<h4><?=$campo['titulo']?><br><small><?=$campo['autor']?></small></h4>
						<h3>R$<?=number_format($campo['valor'],2,',','.')?></h3>
					</p>
				</div>	
		</a>
		<?php } ?>
	</section>
	<?php include_once("footer.php");?>
</body>
</html>
