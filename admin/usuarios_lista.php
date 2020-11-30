<?php
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_produtos.php");
// Selecionar o banco de dados
mysqli_select_db($conn_produtos,$database_conn);
// Selecionar os dados
$consulta   =   "SELECT *
                FROM tbusuarios
                ORDER BY login_usuario ASC
                ";
$lista      =   $conn_produtos->query($consulta);
$row        =   $lista->fetch_assoc();
$totalRows  =   ($lista)->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Lista de Usuários</title>
    <meta charset="utf-8">
<!-- Link arquivos Bootstrap css -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<?php include "menu_adm.php"; ?>
<main>
    <h1>Lista de Usuários</h1>
    <table border="1">
        <thead><!-- cabeçalho da tabela -->
            <tr>
                <th>ID</th><!-- cabeça da coluna -->
                <th>LOGIN</th>
                <th>NÍVEL</th>
                <th>
                    <a href="usuarios_insere.php">
                        ADICIONAR
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
           <!-- estrutura de repetição -->
           <?php do { ?>
            <tr>
                <td><?php echo $row['id_usuario']; ?></td>
                <td><?php echo $row['login_usuario']; ?></td>
                <td><?php echo $row['nivel_usuario']; ?></td>
                <td>ALTERAR
                    <button class="btn btn-danger btn-block btn-xs delete" role="button" data-nome="<?php echo $row['login_usuario']; ?>" data-id="<?php echo $row['id_usuario']; ?>">
                        <span class="hidden-xs">EXCLUIR<br></span>
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </td>
            </tr>
            <?php } while ($row = $lista->fetch_assoc()); ?>
            <!-- fecha estrutura de repetição -->
        </tbody>
    </table>
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
        $('a.delete-yes').attr('href','usuarios_exclui.php?id_usuario='+id);
        // Enviar o id através do link do botão confirmar
        $('#myModal').modal('show'); //Abre o modal
    });
</script>

</body>
</html>
<?php mysqli_free_result($lista); ?>