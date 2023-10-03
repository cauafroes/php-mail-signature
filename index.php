<?php

$name = $_POST['name'] ?? null;
$work = $_POST['funcao'] ?? null;
$email = $_POST['email'] ?? null;
$phone = $_POST['phone'] ?? null;
$pass = $_POST['pass'] ?? null;

if (!empty($name) && !empty($work) && !empty($email) && !empty($phone)) {

	if ($pass != 'Clubers@2023') {
		echo 'Senha incorreta!';
		exit;
	}

    include 'gd.php';
} else {
	include 'form.php';
	return;
}

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Assinatura</title>
	<style>
		body{
			color: black;
			background-color: #181a2a;
			font-family: Calibri, Helvetica, sans-serif;
		}
		h4{
			color: #fff;
		}
		img{
			border: none;
			display: block;
			padding: 0;
			margin: 0;
		}
		div{
			color: black;
			background-color: white;
			padding: 30px;
			width: 80%;
			margin: 0;
            border-radius: 15px;
		}
		h5{
			font-family: Arial, Helvetica, sans-serif;
		}
	</style>
</head>
<body>
<h4>Copie isto tudo abaixo (clique e vá arrastando até selecionar tudo) e cole em sua assinatura no outlook</h4>
<br>

<div>
	<table
		id="Tabela_01"
		width="487"
		height="153"
		border="0"
		cellpadding="0"
		cellspacing="0"
	>
		<tr>
			<td rowspan="2">
				<a href="http://www.clubedeferias.com/">
					<img
						src="https://clubedeferias.com/images/emails/clubelogo.png"
						width="154"
						height="153"
						alt=""
					/></a>
			</td>
			<td colspan="4">
				<a href="http://www.clubedeferias.com/">
					<img
						src="./images/<?= $fileName ?>.jpeg"
						width="333"
						height="109"
						alt=""
					/></a>
			</td>
		</tr>
		<tr>
			<td>
				<a href="http://www.instagram.com/oclubedeferias/">
					<img
						src="https://clubedeferias.com/images/emails/instalogo.png"
						width="38"
						height="44"
						alt=""
					/></a>
			</td>
			<td>
				<a href="http://www.facebook.com/clubedeferiasstellabarros/">
					<img
						src="https://clubedeferias.com/images/emails/facelogo.png"
						width="32"
						height="44"
						alt=""
					/></a>
			</td>
			<td>
				<a href="http://www.youtube.com/channel/UC3cNLeggbFCbIT3zTcGocqw">
					<img
						src="https://clubedeferias.com/images/emails/ytlogo.png"
						width="31"
						height="44"
						alt=""
					/></a>
			</td>
			<td>
				<a href="https://grupoaguia.com.br/">
					<img
						src="https://clubedeferias.com/images/emails/aguialogo.png"
						width="232"
						height="44"
						alt=""
					/></a>
			</td>
		</tr>
	</table>
	<br>
	<img src="footer.png">
	<br>
	<strong>IMPORTANTE:</strong>
	<br>
	Esta mensagem é destinada exclusivamente para a(s) pessoa(s) a(s) qual(is) é dirigida. Seu conteúdo é de informação

	confidencial e/ou legalmente privilegiada. Se você a recebeu por engano, pedimos que retorne este e-mail imediatamente ao

	remetente, promovendo, desde logo, a eliminação do seu conteúdo em sua base de dados, registros ou sistema de controle.

	Assim como, desde já, fica notificado de abster-se a divulgar, copiar, distribuir, examinar ou, de qualquer forma, utilizar a

	informação contida nesta mensagem, por ser ilegal.


	<br><br>
	<strong>IMPORTANT:</strong>
	<br>
	This message is intended exclusively for the person (s) to whom it (s) is addressed. Its content is confidential and / or legally privileged information. If you received it by mistake, we ask that you return this e-mail to the sender immediately promoting the elimination of its content in your database, records or control system.

	Furthermore, you are hereby notified to refrain from disclosing, copying, distributing, examining or, in any way, using the information contained in this message, considered to be unlawfull.
</div>

</body>
</html>
