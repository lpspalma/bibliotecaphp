<?php
//conectando no banco
	include_once("conecta.php");

//recebendo dados enviados via posto pelo formulario de cadastro

	$rectitulo=$_POST["ftitulo"];
	$recautor=$_POST["fautor"];
	$receditora=$_POST["feditora"];
	$recgenero=$_POST["fgenero"];
	$recvalor=$_POST["fvalor"];
	$recnac=$_POST["fnac"];
	$reccapa=$_FILES["fcapa"]["name"];

//criptografando o nome da imagem para evitar duplicidade e caracteres especiais

	$ext=pathinfo($reccapa, PATHINFO_EXTENSION);
	$hora=time();
	$data=date("d/m/Y");
	$novonome=md5($reccapa.$hora).".".$ext;

//upload do arquivo para a pasta capas ja com o novo nome
	
	move_uploaded_file($_FILES["fcapa"]["tmp_name"], "capas/$novonome");

//substituindo o ponto por vazio
	$recvalor=str_replace(".","", $recvalor);
//substituindo a virgula por ponto
	$recvalor=str_replace(",",".", $recvalor);

//gravando no banco

	mysqli_query($conexao, "INSERT INTO produtos (titulo, autor, editora, genero, valor, nacionalidade, capa) VALUES ('$rectitulo', '$recautor', '$receditora', '$recgenero', '$recvalor', '$recnac', '$novonome')");
		// redirecionar
		
		header("location:admin.php");

?>