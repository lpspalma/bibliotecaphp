<?php
	//criando o nosso envio de formulário para um e-mail
	
	//receber os dados do formulário
	$recnome=$_POST["fnome"];
	$recemail=$_POST["femail"];
	$recassunto=$_POST["fassunto"];
	$recmsg=$_POST["fmsg"];
	$assuntoenvia="Contato via formulário site";

	//montando a mensagem para ser enviada, aqui vc deve formatar com tudo que deseja que seja visto na msg
	$mensagem="
		<img src='https://cd6.com.br/wp-content/uploads/2016/05/cd6.png'>
		<h2><font color='#FF0000'>Mensagem enviado do site</font><hr></h2>
		<p><b>Assunto:</b> $recassunto</p>
		<p><b>Nome:</b> $recnome</p>
		<p><b>E-Mail:</b> $recemail</p>
		<p><b>Mensagem:</b><br>$recmsg</p>
	 	";

	//e-mail do destinatário
	$destinatario="profrodrigo@cd6.com.br";

	//configuração do envio
	$headers="MIME-Version:1.1";
	$headers.="Content-type: text/html; charset=utf-8";
	$headers.="From: $recemail";
	$headers.="Return-Path: $destinatario";

	//vamos enviar
	$envio=mail($destinatario, $assuntoenvia, $mensagem, $headers);

	//validação e mensagem de sucesso
	if($envio){
		echo "
			<script>
				alert('Mensagem enviada com sucesso!')
				window.location='index.php'
			</script>
		";
	}else{
		echo "
			<script>
				alert('Não deu certo, tente novamente!')
				window.location='index.php'
			</script>
		";
	}
?>

