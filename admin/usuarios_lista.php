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
                    <td>ALTERAR|EXCLUIR</td>
                </tr>
                <?php } while ($row = $lista->fetch_assoc()); ?>
                <!-- fecha estrutura de repetição -->
            </tbody>
        </table>
    </main>
</body>
</html>
<?php mysqli_free_result($lista); ?>