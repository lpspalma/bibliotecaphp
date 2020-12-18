<?php
	//conectando no banco
	include_once("conecta.php");

//recebendo dados enviados via posto pelo formulario de alteração

	$rectitulo=$_POST["ftitulo"];
	$recautor=$_POST["fautor"];
	$receditora=$_POST["feditora"];
	$recgenero=$_POST["fgenero"];
	$recvalor=$_POST["fvalor"];
	$recnac=$_POST["fnac"];
	$reccapa=$_FILES["fcapa"]["name"];
	$recnomecapa=$_POST["nomecapa"];
	$recid=$_POST['fid'];

	//ajustando o campo valor
$recvalor=str_replace(".", "", $recvalor);
$recvalor=str_replace(",", ".", $recvalor);

if($reccapa != ""){
	move_uploaded_file($_FILES["fcapa"]["tmp_name"], "capas/$recnomecapa");//upload do arquivo para a pasta capas com o mesmo nome da capaantiga para sobreescrever
}


mysqli_query($conexao, "UPDATE produtos SET titulo='$rectitulo', autor='$recautor', editora='$receditora', genero='$recgenero', valor='$recvalor', nacionalidade='$recnac' WHERE id=$recid  ");


header("location:admin.php")
?>