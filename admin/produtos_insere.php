<?php
// Incluir o arquivo e fazer a conexão com o banco
include("../Connections/conn_produtos.php");

if($_POST){
    // Definindo o USE do banco de dados
    mysqli_select_db($conn_produtos,$database_conn);
        
    // Variáveis para acrescentar dados ao banco
    $tabela_insert  =   "tbprodutos";
    $campos_insert  =   "id_tipo_produto, destaque_produto, descri_produto, resumo_produto, valor_produto, imagem_produto";
    
    // Guardo o nome da imagem no banco e o arquivo no diretório
    if(isset($_POST['enviar'])){
        $nome_img   =   $_FILES['imagem_produto']['name'];
        $tmp_img    =   $_FILES['imagem_produto']['tmp_name'];
        $dir_img    =   "../imagens/".$nome_img;
        move_uploaded_file($tmp_img,$dir_img);
    };
    
    // Receber os dados do formulário
    // Organize os campos na mesma ordem
    $id_tipo_produto    =   $_POST['id_tipo_produto'];
    $destaque_produto   =   $_POST['destaque_produto'];
    $descri_produto     =   $_POST['descri_produto'];
    $resumo_produto     =   $_POST['resumo_produto'];
    $valor_produto      =   $_POST['valor_produto'];
    $imagem_produto     =   $_FILES['imagem_produto']['name'];
    
    // Reunir os valores a serem inseridos
    $valores_insert     =   "'$id_tipo_produto','$destaque_produto','$descri_produto','$resumo_produto','$valor_produto','$imagem_produto'";
    
    // Consulta SQL para inserção dos dados
    $insertSQL  =   "INSERT INTO ".$tabela_insert."
                        (".$campos_insert.")
                    VALUES
                        (".$valores_insert.")
                    ";
    $resultado  =   $conn_produtos->query($insertSQL);
    
    // Após a ação a página será redirecionada
    $destino    =   "produtos_lista.php";
    if(mysqli_insert_id($conn_produtos)){
        header("Location: $destino");
    }else{
        header("Location: $destino");
    };    
};

// Definindo o USE do banco de dados
mysqli_select_db($conn_produtos,$database_conn);
// Selecionar os dados da chave estrangeira
$tabela_fk      =   "tbtipos";
$ordenar_por_fk =   "rotulo_tipo ASC";
$consulta_fk    =   "SELECT *
                    FROM ".$tabela_fk."
                    ORDER BY ".$ordenar_por_fk."
                    ";
$lista_fk       =   $conn_produtos->query($consulta_fk);
$row_fk         =   $lista_fk->fetch_assoc();
$totalRows_fk   =   ($lista_fk)->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Produtos - Insere</title>
<meta charset="utf-8">
<!-- Link arquivos Bootstrap css -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../css/bootstrap.min.css" rel="stylesheet">
<!-- Link para CSS específico -->
<link rel="stylesheet" href="../css/meu_estilo.css" type="text/css">
</head>
<body class="fundofixo">
<?php include "menu_adm.php"; ?>
<main class="container">
<div class="row"><!-- Abre row -->
<div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-4"><!-- dimensionamento -->
    <h2 class="breadcrumb text-danger">
        <a href="produtos_lista.php">
            <button class="btn btn-danger">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </button>
        </a>
        Inserindo Produtos
    </h2>
    <!-- Abre thumbnail -->
    <div class="thumbnail">
       <div class="alert alert-danger" role="alert">
          <form action="produtos_insere.php" id="form_produto_insere" name="form_produto_insere" method="post" enctype="multipart/form-data">
          
           <!-- Select id_tipo_produto -->
            <label for="id_tipo_produto">Tipo:</label>
             <div class="input-group">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                </span> 
                <!-- select>option*2 -->
                <select name="id_tipo_produto" id="id_tipo_produto" class="form-control" required>
                   <!-- Abre estrutra de repetição -->
                   <?php do { ?>
                    <option value="<?php echo $row_fk['id_tipo']; ?>">
                        <?php echo $row_fk['rotulo_tipo']; ?>
                    </option>
                    <?php } while ($row_fk = $lista_fk->fetch_assoc()); 
                    $rows_fk = mysqli_num_rows($lista_fk);
                    if(rows_fk > 0){
                        mysqli_data_seek($lista_fk,0);
                        $rows_fk = $lista_fk->fetch_assoc();
                    };
                    ?>
                    <!-- Fecha estrutra de repetição -->
                </select>
             </div><!-- fecha input-group -->
             <br>
           <!-- FECHA Select id_tipo_produto -->
           
           <!-- radio destaque_produto -->
            <label for="destaque_produto">Destaque?</label>
             <div class="input-group">
                 <label for="destaque_produto_s" class="radio-inline">
                     <input type="radio" name="destaque_produto" id="destaque_produto" value="Sim">Sim
                 </label>
                 <label for="destaque_produto_n" class="radio-inline">
                     <input type="radio" name="destaque_produto" id="destaque_produto" value="Não" checked>Não
                 </label>
             </div><!-- fecha input-group -->
             <br>
           <!-- FECHA radio destaque_produto -->
           
           <!-- text descri_produto -->
            <label for="descri_produto">Descrição:</label>
             <div class="input-group">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                </span> 
                <input type="text" name="descri_produto" id="descri_produto" class="form-control" placeholder="Digite o título do produto." maxlength="100" required>
             </div><!-- fecha input-group -->
             <br>
           <!-- FECHA text descri_produto -->                                                         <!-- textarea resumo_produto -->
            <label for="resumo_produto">Resumo:</label>
             <div class="input-group">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                </span> 
                <textarea name="resumo_produto" id="resumo_produto" cols="30" rows="8" placeholder="Digite os detalhes do produto." class="form-control"></textarea>
             </div><!-- fecha input-group -->
             <br>
           <!-- FECHA textarea resumo_produto -->
                                         
           <!-- number valor_produto -->
            <label for="valor_produto">Valor:</label>
             <div class="input-group">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
                </span> 
                <input type="number" name="valor_produto" id="valor_produto" min="0" step="0.01" class="form-control">
             </div><!-- fecha input-group -->
             <br>
           <!-- FECHA number valor_produto -->   
                                         
           <!-- file imagem_produto -->
            <label for="imagem_produto">Imagem:</label>
             <div class="input-group">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
                </span>
                <img src="" alt="" name="imagem" id="imagem" class="img-responsive">
                <!-- Exibe a imagem a ser inserida --> 
                <input type="file" name="imagem_produto" id="imagem_produto" class="form-control" accept="image/*">
             </div><!-- fecha input-group -->
             <br>
           <!-- FECHA number valor_produto -->
                                        
            <!-- btn enviar -->
            <input type="submit" value="Cadastrar" name="enviar" id="enviar" class="btn btn-danger btn-block">
                                         
           </form>  
       </div><!-- fecha alert -->
    </div>
    <!-- fecha thumbnail -->
</div><!-- Fecha dimensionamento -->
</div><!-- Fecha row -->   
</main>

<!-- Script para a imagem -->   
<script>
document.getElementById("imagem_produto").onchange = function () {
    var reader = new FileReader();
    if(this.files[0].size>528385){
        alert("A imagem deve ter no máximo 500Kb");
        $("#imagem").attr("src","blank");
        $("#imagem").hide();
        $('#imagem_produto').wrap('<form>').closest('form').get(0).reset();
        $('#imagem_produto').unwrap();
        return false;
    }
    if(this.files[0].type.indexOf("image")==-1){
        alert("Formato inválido, escolha uma imagem!");
        $("#imagem").attr("src","blank");
        $("#imagem").hide();
        $('#imagem_produto').wrap('<form>').closest('form').get(0).reset();
        $('#imagem_produto').unwrap();
        return false;
    }
    reader.onload = function (e) {
        // obter dados carregados e renderizar miniatura.
        document.getElementById("imagem").src = e.target.result;
        $("#imagem").show();
    };  
    // leia o arquivo de imagem como um URL de dados.
    reader.readAsDataURL(this.files[0]);
};
</script>

<!-- Link arquivos Bootstrap js -->        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>