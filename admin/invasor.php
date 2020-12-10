<!-- Salvar como: admin/invasor.php -->
<!doctype html>
<html lang="pt-br">
<head>
<meta http-equiv="refresh" content="15;URL=../index.php">
<title>Invasor</title>
<meta charset="utf-8">
<!-- Link arquivos Bootstrap css -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
<script src="https://kit.fontawesome.com/2495680ceb.js" crossorigin="anonymous"></script>
<link href="../css/meu_estilo.css" rel="stylesheet" type="text/css">
</head>
<body class="fundofixo">
<main class="container">
<section>
<article>
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
            <h1 class="breadcrumb text-danger text-center">Atenção!</h1>
            <div class="thumbnail text-center">
                <span class="fa-stack fa-7x">
                    <i class="fas fa-user-secret fa-stack-1x"></i>
                    <i class="fas fa-ban fa-stack-2x text-danger"></i>
                </span>
                <br><br>
                <div class="alert alert-danger">
                    <h4>
                        <i class="fas fa-spinner fa-lg fa-pulse"></i>
                        Usuário e/ou Senha inválido.
                    </h4>
                    <p class="text-danger">
                        <a href="login.php" class="btn btn-danger">
                            <i class="fas fa-external-link-alt fa-rotate-270 fa-3x"></i>
                            <br><br>
                            Tentar <br>
                            Novamente
                        </a>
                        <a href="../index.php" class="btn btn-success">
                            <i class="fas fa-home fa-3x"></i>
                            <br><br>
                            Voltar <br>
                            Área Pública
                        </a>
                    </p>
                    <p>
                        <small>
                            <br>
                            Caso não faça uma escolha em 15 segundos será redirecionado automaticamente para página inicial.
                        </small>
                    </p>
                </div><!-- fecha alert-danger -->
                
            </div><!-- fecha thumbnail -->
        </div><!-- fecha dimensionamento -->
    </div><!-- fecha row -->
</article>
</section>
</main>

<!-- Link arquivos Bootstrap js -->        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>