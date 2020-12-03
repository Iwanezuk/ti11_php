<!-- Salvar como: produtos_geral.php -->
<?php
// Incluir arquivo para fazer a conexão
include ("Connections/conn_produtos.php");

// Consulta para trazer os dados e se necessário filtrar
$tabela         = "vw_tbprodutos";
$campo_filtro   = "destaque_produto";
$filtro_select  = "Não";
$ordernar_por   = "descri_produto ASC";
$consulta   =   "SELECT *
                FROM ".$tabela."
                WHERE ".$campo_filtro."='".$filtro_select."'
                ORDER BY ".$ordernar_por."
                ";
$lista      =   $conn_produtos->query($consulta);
$row        =   $lista->fetch_assoc();
$totalRows  =   ($lista)->num_rows;
?>
<!doctype html>
<html lang="pt-br">
<head>
<title>Produtos</title>
<meta charset="utf-8">
<!-- Link arquivos Bootstrap css -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/meu_estilo.css" rel="stylesheet" type="text/css">
</head>
<body>
<h2 class="breadcrumb alert-danger">Produtos</h2>
<div class="row"><!-- manter os elementos na linha -->
<!-- Abre estrutura de repetição -->
<?php do { ?>
<!-- Abre thumbnail/card -->
<div class="col-sm-6 col-md-4">
   <div class="thumbnail">
      <a href="produto_detalhe.php?id_produto=<?php echo $row['id_produto']; ?>">
        <img src="imagens/<?php echo $row['imagem_produto']; ?>" alt="" class="img-responsive img-rounded" style="height: 20em;">
       </a>
       <div class="caption text-right">
           <h3 class="text-danger">
               <strong><?php echo $row['descri_produto']; ?></strong>
           </h3>
           <p class="text-warning">
               <strong><?php echo $row['rotulo_tipo']; ?></strong>
           </p>
           <p class="text-left">
               <?php echo mb_strimwidth($row['resumo_produto'],0,42,'...'); ?>
           </p>
           <p>
               <button class="btn btn-default disabled" style="cursor:default;" role="button">
                   <?php echo number_format($row['valor_produto'],2,',','.'); ?>
               </button>
               <a href="produto_detalhe.php?id_produto=<?php echo $row['id_produto']; ?>" class="btn btn-danger" role="button">
                   <span class="hidden-xs">Saiba mais...</span>
                   <span class="visible-xs glyphicon glyphicon-eye-open" aria-hidden="true"></span>
               </a>
           </p>
       </div><!-- fecha caption text-right -->
   </div><!-- fecha thumbnail --> 
</div><!-- fecha dimensionamento -->
<!-- Fecha thumbnail/card -->
<?php } while ($row=$lista->fetch_assoc()); ?>  
<!-- Fecha estrutura de repetição --> 
</div><!-- fecha row -->



<!-- Link arquivos Bootstrap js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php mysqli_free_result($lista); ?>