<?php
header('Content-Type: text/html');
global $signature
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Assinatura</title>
    <style>
        body {
            color: black;
            background-color: #181a2a;
            font-family: Calibri, Helvetica, sans-serif;
            text-align: center;
        }

        h4 {
            color: #fff;
        }

        img {
            border: none;
            /*display: block;*/
            padding: 0;
            margin: 0;
        }

        h5 {
            font-family: Arial, Helvetica, sans-serif;
        }

        .child {
            margin: 0 auto;
            width: min-content;
            color: black;
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            text-align: left;
        }

        .buttoncopy {
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
         <?= $signature ?>
    </div>
    <script>
        function copyToClipboard() {
            let container = document.getElementById('signature');

            //if (!navigator.clipboard){
            let range = document.createRange();
            window.getSelection().removeAllRanges();
            range.selectNode(container);
            window.getSelection().addRange(range);
            document.execCommand('copy');
            window.getSelection().removeAllRanges();
            alert("Copiado para a área de transferência!");
            /*} else{
                navigator.clipboard.writeText(container.innerText).then(
                    function(){
                        alert("Copiado para a área de transferência!");
                    })
                    .catch(err => function() {
                            alert(`Erro ao copiar!: ${err}`);
                        });
            }*/
        }
    </script>
</body>

</html>