<?php
	include_once("conecta.php");
	
	$recid=$_GET["id"];
	$reccapa=$_GET["capa"];

	mysqli_query($conexao, "DELETE FROM produtos WHERE id=$recid");

	//excluindo o arquivo da pasta capas
	unlink("capas/$reccapa");

	header("location: admin.php")




?>