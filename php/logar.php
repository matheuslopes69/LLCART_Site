<?php
include "database.php";
session_start();

if (!isset($_POST['login'], $_POST['senha'])) {
    header("Location: login.php");
    exit();
}

$login = $_POST['login'];
$senha = $_POST['senha'];

$stmt = $conn->prepare("
    SELECT id, nome, senha_hash, permissao, ativo 
    FROM usuarios 
    WHERE login = :login
");
$stmt->bindParam(':login', $login);
$stmt->execute();

if ($stmt->rowCount() !== 1) {
    echo "Login incorreto!";
    exit();
}

$user = $stmt->fetch(PDO::FETCH_OBJ);


if ($user->ativo == 0) {
    die("Usuário desativado!");
}


if (!password_verify($senha, $user->senha_hash)) {
    die("Senha incorreta!");
}

$_SESSION['usuario'] = [
    'id' => $user->id,
    'nome' => $user->nome,
    'permissao' => $user->permissao
];

header("Location: ../principal2.html");
exit();
