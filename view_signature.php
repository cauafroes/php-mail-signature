<?php
$img = $_GET['img'] ?? null;

if (empty($img)) {
    http_response_code(404);
    echo 'Imagem não encontrada!';
	exit;
}

//protegendo de xss e outros ataques:
//payload = img=aa.png" alt = "aa" onerror=alert('xss') a
$img = htmlspecialchars($img, ENT_QUOTES);

$file = __DIR__ . '/images/' . $img;
if (!file_exists($file)) {
    http_response_code(404);
    echo 'Imagem não encontrada!';
    exit;
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
            text-align: center;
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
        h5{
            font-family: Arial, Helvetica, sans-serif;
        }
        .child{
            margin: 0 auto;
            width: 80%;
            color: black;
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            text-align: left;
        }
        .buttoncopy{
            background-color: #3486d7;
            border-radius: 10px;
            border-color: #3486d7;
            color: white;
            padding: 5px 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<h4>Clique <button class="buttoncopy" onclick="copyToClipboard()">aqui</button> para copiar a assinatura e cole nas configurações de assinatura do seu outlook</h4>
<br>

<div class="child" id="signature">
    <!--  infelizmente teve que ser em tabela, os emails tem dificuldade em mostrar padrões modernos, a maioria dos clientes de email ainda nao suportam display:flex, por exemplo   -->
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
                <a href="https://www.clubedeferias.com/">
                    <img
                            src="https://clubedeferias.com/images/emails/clubelogo.png"
                            width="154"
                            height="153"
                            alt=""
                    /></a>
            </td>
            <td colspan="4">
                <a href="https://www.clubedeferias.com/">
                    <img
                            src="./images/<?= $img ?>"
                            width="333"
                            height="109"
                            alt=""
                    /></a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="https://www.instagram.com/oclubedeferias/">
                    <img
                            src="https://clubedeferias.com/images/emails/instalogo.png"
                            width="38"
                            height="44"
                            alt=""
                    /></a>
            </td>
            <td>
                <a href="https://www.facebook.com/clubedeferiasstellabarros/">
                    <img
                            src="https://clubedeferias.com/images/emails/facelogo.png"
                            width="32"
                            height="44"
                            alt=""
                    /></a>
            </td>
            <td>
                <a href="https://www.youtube.com/channel/UC3cNLeggbFCbIT3zTcGocqw">
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
                            src="https://images-store.us-southeast-1.linodeobjects.com/images/bottom_sig.webp"
                            width="232"
                            height="44"
                            alt=""
                    /></a>
            </td>
        </tr>
    </table>
    <br>
    <img src="footer.png" alt="">
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


<script>
    //copiar tudo ao clicar
    function copyToClipboard() {
        let container = document.getElementById('signature');

        if (!navigator.clipboard){
            let range = document.createRange();
            window.getSelection().removeAllRanges();
            range.selectNode(container);
            window.getSelection().addRange(range);
            document.execCommand('copy');
            window.getSelection().removeAllRanges();
            alert("Copiado para a área de transferência!");
        } else{
            navigator.clipboard.writeText(container.innerHTML).then(
                function(){
                    alert("Copiado para a área de transferência!");
                })
                .catch(err => function() {
                        alert(`Erro ao copiar!: ${err}`);
                    });
        }
    }
</script>
</body>
</html>
