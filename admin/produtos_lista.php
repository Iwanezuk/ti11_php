<?php
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_produtos.php");
// Selecionar os dados
$consulta   =   "SELECT *
                FROM tbprodutos
                ORDER BY descri_produto ASC
                ";
// Fazer a lista completa dos dados
$lista  = $conn_produtos->query($consulta);
// Separar os dados em linhas(row)
$row    = $lista->fetch_assoc();
// Contar o total de linhas
$totalRows  = ($lista)->num_rows;
?>
<!doctype html>
<!-- html>head>title -->
<html lang="pt-br">
<head>
<title>Produtos - Lista</title>
<meta charset="utf-8">
<!-- Depois vamos inserir aqui o Bootstrap -->
<!-- Link arquivos Bootstrap css -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../css/bootstrap.min.css" rel="stylesheet">

</head>
<!-- body>main>h1 -->
<body>
<main>
    <h1>Lista de Produtos</h1>
    <table border="1">
    <!-- thead>tr>th*8 -->
        <thead><!-- cabeçalho da tabela -->
            <tr>
                <th>ID</th><!-- cabeça da coluna -->
                <th>TIPO</th>
                <th>DESTAQUE</th>
                <th>DESCRIÇÃO</th>
                <th>RESUMO</th>
                <th>VALOR</th>
                <th>IMAGEM</th>
                <th>
                    <a href="produtos_insere.php" target="_self">
                        ADICIONAR
                    </a>
                </th>
            </tr>
        </thead>
        <!-- tbody>tr>td*8 -->    
        <tbody><!-- corpo da tabela -->
           <!-- Abre a Estrutura de repetição -->
           <?php do { ?>
            <tr><!-- linha da tabela -->
                <!-- Insira os dados determinando a linha e o campo -->
                <td><?php echo $row['id_produto']; ?></td>
                <td><?php echo $row['id_tipo_produto']; ?></td>
                <td><?php echo $row['destaque_produto']; ?></td>
                <td><?php echo $row['descri_produto']; ?></td>
                <td><?php echo $row['resumo_produto']; ?></td>
                <td><?php echo $row['valor_produto']; ?></td>
                <td>
                    <img src="../imagens/<?php echo $row['imagem_produto']; ?>" alt="" width="100px">
                </td>
                <td>ALTERAR|
                    <button class="btn btn-danger btn-block btn-xs delete" role="button" data-nome="<?php echo $row['descri_produto']; ?>" data-id="<?php echo $row['id_produto']; ?>">
                        <span class="hidden-xs">EXCLUIR<br></span>
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </td>
            </tr>
            <?php } while ($row = $lista->fetch_assoc()); ?>
            <!-- Fecha a estrutura de repetição -->
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
        $('a.delete-yes').attr('href','produtos_exclui.php?id_produto='+id);
        // Enviar o id através do link do botão confirmar
        $('#myModal').modal('show'); //Abre o modal
    });
</script>
</body>
</html>
<?php mysqli_free_result($lista); ?>