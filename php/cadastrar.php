<?php
include "database.php";

if (!isset($_POST['nome'], $_POST['login'], $_POST['senha'])) {
    header("Location: register.php");
    die();
}

$nome  = $_POST['nome'];
$login = $_POST['login'];
$senha = $_POST['senha'];

$stmt = $conn->prepare("INSERT INTO usuario(nome_user, login_user, senha_user) VALUES (:nome, :login, :senha)");
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':login', $login);
$stmt->bindParam(':senha', $senha);

$stmt->execute();

header("Location: login.php");
