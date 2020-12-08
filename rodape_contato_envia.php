<!-- Salvar como: rodape_contato_envia.php -->
<!doctype html>
<html lang="pt-br">
<head>
<title>Verificação do contato</title>
<meta charset="utf-8">
<!-- Após  15 segundos a página redirecionada para index.php -->
<meta http-equiv="refresh" content="1500;URL=index.php">
<!-- Link arquivos Bootstrap css -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/meu_estilo.css" rel="stylesheet" type="text/css">
</head>
<body class="fundofixo">
<?php include('menu_publico.php'); ?>
<main class="container">
<section>
    <div class="jumbotron alert-danger">
        <h1 class="text-danger">Agradecemos seu contato!</h1>
        <?php
            $destino        =   "contato@chuletaquente.com.br";
            $nome_contato   =   $_POST['nome_contato'];
            $email_contato  =   $_POST['email_contato'];
            $msg_contato    =   "Mensagem de: ".$_POST['nome_contato']."\n".$_POST['comentarios_contato'];
            $mailsend   = mail("$destino","Formulário de comentários","$msg_contato","De: $email_contato");
        
            echo "<p class='text-center'>Obrigado por enviar seus comentários, <b>$nome_contato</b>!</p>";
            echo "<p class='text-center'>Mensagem enviada com sucesso!</p>";
        ?>
        <h5 class="text-center">
            Caso não visualize a mensagem de agradecimento, entre em contato através do email
            <br>
            <b><i><?php echo $destino; ?></i></b>
        </h5>
    </div><!-- fecha jumbotron -->
    
</section>
<!-- RODAPÉ -->
<footer>
    <?php include('rodape.php'); ?>
</footer>
</main>

<!-- Link arquivos Bootstrap js -->       
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>