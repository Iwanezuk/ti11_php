<!-- Salvar como: carroussel.php -->
<!doctype html>
<html lang="pt-br">
<head>
<title>Chuleta Quente</title>
<meta charset="utf-8">
<!-- Link arquivos Bootstrap css -->
<!-- CÓDIGO DESABILITADO PARA NÃO HAVER CONFLITOS
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/meu_estilo.css" rel="stylesheet" type="text/css">
-->
</head>
<body>
<div id="banners" class="carousel slide" data-ride="carousel">
   <!-- Indicadores dos itens -->
   <ol class="carousel-indicators">
      <li data-target="#banners" data-slide-to="0" class="active"></li>
      <li data-target="#banners" data-slide-to="1"></li>
      <li data-target="#banners" data-slide-to="2"></li> 
   </ol>
   <!-- Imagens -->
   <div class="carousel-inner" role="listbox">
       <div class="item active">
           <img src="imagens/banner_1.jpg" alt="" class="center-block">
       </div>
       <div class="item">
           <img src="imagens/banner_2.jpg" alt="" class="center-block">
       </div>
       <div class="item">
           <img src="imagens/banner_3.jpg" alt="" class="center-block">
       </div>
   </div><!-- fecha carousel-inner -->
   <!-- botões de Navegação -->
   <a href="#banners" class="left carousel-control" role="button" data-slide="prev">
       <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
       <span class="sr-only">Anterior</span>
   </a>
   <a href="#banners" class="right carousel-control" role="button" data-slide="next">
       <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
       <span class="sr-only">Próximo</span>
   </a>  
</div><!-- fecha carousel -->
<!-- Link arquivos Bootstrap js -->
<!-- CÓDIGO DESABILITADO PARA NÃO HAVER CONFLITOS       
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
-->
</body>
</html>