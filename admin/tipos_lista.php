<?php
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_produtos.php");
// Selecionar os dados
$consulta   =   "SELECT *
                FROM tbtipos
                ORDER BY rotulo_tipo ASC";
// Fazer a lsita completa dos dados
$lista      =   $conn_produtos->query($consulta);
// Separar os dados em linhas(row)
$row        =   $lista->fetch_assoc();
// Contar o total de linhas
$totalRows  =   ($lista)->num_rows;    
?>
<!doctype html>
<!-- html>head>title -->
<html lang="pt-br">
<head>
<title>Tipos - Lista</title>
<meta charset="utf-8">
<!-- Depois vamos inserir aqui o Bootstrap -->
<!-- Link arquivos Bootstrap css -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="../css/meu_estilo.css" type="text/css">
</head>
<!-- body>main>h1 -->
<body class="fundofixo">
<?php include "menu_adm.php"; ?>
<main class="container">
    <h1 class="breadcrumb alert-warning">Lista de Tipos</h1>
    <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6">
    <table class="table table-condensed table-hover tbopacidade">
       <!-- thead>tr>th*4 -->
       <thead><!-- cabeçalho da tabela -->
           <tr>
               <th class="hidden">ID</th><!-- cabeça da coluna -->
               <th>SIGLA</th>
               <th>RÓTULO</th>
                <th>
                    <a href="tipos_insere.php" target="_self" class="btn btn-block btn-primary btn-xs" role="button">
                        <span class="hidden-xs">ADICIONAR<br></span>
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                </th>
           </tr>
       </thead>
       <!-- tbody>tr>td*4 -->
       <tbody><!-- corpo da tabela -->
          <!-- Abre estrutura de repetição -->
          <?php do { ?>
           <tr><!-- linha da tabela -->
              <!-- Insira os dados determinando a linha e o campo -->
               <td class="hidden"><?php echo $row['id_tipo']; ?></td>
               <td><?php echo $row['sigla_tipo']; ?></td>
               <td><?php echo $row['rotulo_tipo']; ?></td>
               <td>
                   <a href="" target="_self" class="btn btn-warning btn-block btn-xs" role="button">
                      <span class="hidden-xs">ALTERAR<br></span>
                      <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                       
                   </a>
                    <button class="btn btn-danger btn-block btn-xs delete" role="button" data-nome="<?php echo $row['rotulo_tipo']; ?>" data-id="<?php echo $row['id_tipo']; ?>">
                        <span class="hidden-xs">EXCLUIR<br></span>
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </td>
           </tr>
           <?php } while ($row = $lista->fetch_assoc()); ?>
           <!-- Fecha estrutura de repetição -->
       </tbody>    
    </table>
    </div><!-- FECHA dimensionamento -->
</main>
<!-- MODAL -->
<div id="myModal" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal">&times;</button>
             <h4 class="modal-title text-danger">ATENÇÃO!</h4>
         </div><!-- fecha modal-header -->
         <div class="modal-body">
            Deseja mesmo EXCLUIR o item?
            <h3><span class="text-danger nome"></span></h3>
         </div><!-- fecha modal-body -->
         <div class="modal-footer">
            <a href="#" type="button" class="btn btn-danger delete-yes">
                Confirmar
            </a>
            <button class="btn btn-success" data-dismiss="modal">
                Cancelar
            </button>             
         </div><!-- fecha modal-footer --> 
      </div><!-- fecha modal-content -->    
   </div><!-- fecha modal-dialog -->    
</div>
<!-- fecha MODAL -->
<!-- Link arquivos Bootstrap js -->        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

<!-- Script para o Modal -->
<script type="text/javascript">
    $('.delete').on('click',function(){
        var nome    =  $(this).data('nome');
        // buscar o valor do atributo data-nome
        var id      =  $(this).data('id');
        // buscar o valor do atributo data-id
        $('span.nome').text(nome);
        // Inserir o nome do item na confirmação do Modal
        $('a.delete-yes').attr('href','tipos_exclui.php?id_tipo='+id);
        // Enviar o id através do link do botão confirmar
        $('#myModal').modal('show'); //Abre o modal
    });
</script>
</body>
</html>
<?php mysqli_free_result($lista); ?>