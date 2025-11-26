<?php
include "database.php";

if (!isset($_POST['nome'], $_POST['login'], $_POST['senha'])) {
    header("Location: register.php");
    exit();
}

$nome  = $_POST['nome'];
$login = $_POST['login'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // senha segura

$stmt = $conn->prepare("
    INSERT INTO usuarios (nome, login, senha_hash)
    VALUES (:nome, :login, :senha)
");

$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':login', $login);
$stmt->bindParam(':senha', $senha);

$stmt->execute();

header("Location: login.php");
