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
<script src="js/script.js"></script>
</head>

<body>
	<?php include_once("header.php");?>
	<p class="newprod"><a href="cadnewprod.php">CADASTRAR NOVO PRODUTO <i class="fa fa-plus-square-o"></i></a></p>
	<hr>
	<table width="100%">
		<tr align="center" class="titulotabela">
			<td>CAPA</td>
			<td>TÍTULO</td>
			<td>AUTOR</td>
			<td>EDITORA</td>
			<td>GÊNERO</td>
			<td>VALOR</td>
			<td>NACIONALIDADE</td>
		</tr>
		<?php
			include_once("conecta.php");
		
		
			if($_GET){
				$pagina=$_GET["pag"];
			}else{
				$pagina=1;
			}
			
			$limite=5; //qntd itens por pagina
			$inicio=$pagina*$limite-$limite; //determina por qual cadastro inicia a pagina
		
			//selecionando os dados no banco
			$dados=mysqli_query($conexao, "SELECT * FROM produtos ORDER BY id DESC LIMIT $inicio,$limite");
			

			while ($campo=mysqli_fetch_array($dados)){?>
				<tr align="center" >
					<td><img src="capas/<?=$campo['capa']?>" width='50'</td>
					<td><?=$campo['titulo']?></td>
					<td><?=$campo['autor']?></td>
					<td><?=$campo['editora']?></td>
					<td><?=$campo['genero']?></td>
					<td>R$<?=number_format($campo['valor'],2,",",".")?></td>
					<td><?=$campo['nacionalidade']?></td>
					<td width="25"><a href="editaprod.php?id=<?=$campo['id']?>"><i class="fa fa-edit"></a></td>
					<td width="25"><a href="#" onClick="valida('<?=$campo['id']?>','<?=$campo['capa']?>')"><i class="fa fa-trash"></a></td>
				</tr>
			<?php } ?>
			<tr align="center" style="background-color: #fff;">
				<td colspan="9">
				<hr>
				<?php
					$pegadados=mysqli_query($conexao, "SELECT * FROM produtos");
		
					$total=mysqli_num_rows($pegadados);
		
					$totalpg=ceil($total/$limite); // arredonda os dados para cima
					$anterior =$pagina-1;
					$proximo=$pagina+1;
		
					if($anterior == 0){
						$anterior=1;
					}
		
					if($pagina>1){
						echo "<a href='admin.php?pag=1' title='Inicio' class='iconpg'> <i class='fa fa-backward'></i> </a>";
						echo "<a href='admin.php?pag=$anterior' title='Voltar' class='iconpg'> <i class='fa fa-step-backward'></i> </a>";
					}
					echo "<strong><big>".$pagina. "de" .$totalpg."</big></strong>";
		
					if($pagina<$totalpg){
						echo "<a href='admin.php?pag=$proximo' title='Avançar' class='iconpg'> <i class='fa fa-step-forward'></i> </a>";
						echo "<a href='admin.php?pag=$totalpg' title='Fim' class='iconpg'> <i class='fa fa-forward'></i> </a>";
					}
				?>
				</td>
			</tr>
	</table>
</body>
</html>


<?php 
	}else{
		$erro=md5(2);
		header("location:index.php?erro=$erro");
	}

?>