<!doctype html>
<html lang="pt-br">
<head>
<title>Área Administrativa</title>
<meta charset="utf-8">
<!-- Link arquivos Bootstrap css -->
<!-- CÓDIGO DESABILITADO PARA NÃO HAVER CONFLITOS 
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../css/bootstrap.min.css" rel="stylesheet">
-->
</head>
<body>
<nav class="nav navbar-inverse">
<div class="container-fluid">
   <!-- Agrupamento para exibição MOBILE -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar" aria-expanded="false">
           <span class="sr-only"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span> 
        </button>
        <a href="index.php" class="navbar-brand">
            <img src="../imagens/logochurrascopequeno.png" alt="">
        </a>
    </div><!-- fecha navbar-header -->
    <!-- Fecha Agrupamento para exibição MOBILE -->
    <!-- nav direita -->
    <div class="collapse navbar-collapse" id="defaultNavbar">
       <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="index.php">ADMIN</a></li>
          <li><a href="produtos_lista.php">PRODUTOS</a></li>
          <li><a href="tipos_lista.php">TIPOS</a></li>
          <li><a href="usuarios_lista.php">USUÁRIOS</a></li>
          <li class="active">
              <a href="../index.php">
                  <span class="glyphicon glyphicon-home"></span>
              </a>
          </li>
          <li>
              <a href="logout.php">
                  <span class="glyphicon glyphicon-log-out"></span>
              </a>
          </li> 
       </ul>
        
    </div><!-- fecha collapse navbar-collapse -->    
    <!-- fecha nav direita -->
</div><!-- fecha container-fluid -->
</nav>


<!-- Link arquivos Bootstrap js -->
<!-- CÓDIGO DESABILITADO PARA NÃO HAVER CONFLITOS        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
-->
</body>
</html>
