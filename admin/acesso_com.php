<?php
// Salvar como: admin/acesso_com.php
// A sessão precisar ser iniciada em cada página diferente
// Se a sessão não existir, iniciar um
// Determinar o nível de acesso, se necessário
session_name("chulettaaa");

if(!isset($_SESSION)){
    session_start();
};

// verificar se a usuário logado na sessão
// identifica o usuário
if(!isset($_SESSION['login_usuario'])){
    // se não existir, destruimos a sessão por segurança
    header("Location: login.php"); exit;
};

$nome_da_sessao = session_name();

// verificar o nome da sessão
if(!isset($_SESSION['nome_da_sessao']) OR ($_SESSION['nome_da_sessao']!=$nome_da_sessao)){
    // se não existir, destruimos a sessão por segurança
    session_destroy();
    header("Location: login.php"); exit;
};

// verificar se o login é valido
if(!isset($_SESSION['login_usuario'])){
    // se não existir, destruimos a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta para o login
    header("Location: login.php"); exit;
};
?>