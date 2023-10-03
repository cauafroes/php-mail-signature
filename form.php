<!doctype html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Gerador de assinatura CDF</title>
	<style>
        body{
            background-color: #181a2a;
            font-family: Arial, Helvetica, sans-serif;
        }
        input[type=text], select, input[type=password], input[type=email] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 100%;
            background-color: #340085;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #5200d7;
        }

        div {
            max-width: 80%;
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 30px;
        }
        .child{
            margin: 5% auto;
            width: 80%;
        }
	</style>
</head>
<body>

<div class="child">
	<form action="index.php" method="post">
		<label for="name">Nome</label>
		<input type="text" id="name" name="name" placeholder="Digite seu nome">

		<label for="funcao">Função</label>
		<input type="text" id="funcao" name="funcao" placeholder="Sua função">

		<label for="phone">Telefone</label>
		<input type="text" id="phone" name="phone" placeholder="Seu telefone">

		<label for="email">E-mail</label>
		<input type="email" id="email" name="email" placeholder="Seu e-mail">

        <hr>
        <br>

        <label for="password">Senha</label>
        <input type="password" id="password" name="pass" placeholder="Qual a senha para utilizar este serviço?">

		<input type="submit" value="Enviar">
	</form>
</div>

</body>
</html>