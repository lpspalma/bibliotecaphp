<?php
	//conexão com o banco de dados
	include_once("conecta.php");

	//recebendo os dados
	$recuser=$_POST["fuser"];
	$recpass=$_POST["fpass"];

	//verificar se o usuário e senha estão cadastrados
	$login=mysqli_query($conexao, "SELECT * FROM usuarios WHERE user='$recuser' AND pass='$recpass' ");
	
	//validando o login
	if(mysqli_num_rows($login) > 0){
		session_start();
		$dados=mysqli_fetch_array($login);
		$_SESSION["iduser"]=$dados["id"];
		$_SESSION["niveluser"]=$dados["nivel"];
		header("location:admin.php");
	}else{
		$erro=md5(1);
		header("location:index.php?erro=$erro");
	}	
?>

