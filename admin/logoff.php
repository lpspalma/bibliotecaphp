<?php
	session_start();
	unset($_SESSION["iduser"]);
	unset($_SESSION["niveluser"]);
	session_destroy();
	header("location:index.php");



?>