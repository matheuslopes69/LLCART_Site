<?php
include "database.php";
session_start();

if (!isset($_POST['login'], $_POST['senha'])) {
    header('Location: login.php');
    die();
}

$login = $_POST['login'];
$senha = $_POST['senha'];

$consulta = $conn->prepare("SELECT id_user, nome_user FROM usuario WHERE login_user = :login AND senha_user = :senha");
$consulta->bindParam(':login', $login);
$consulta->bindParam(':senha', $senha);
$consulta->execute();

if ($consulta->rowCount() != 1) {
    echo "Login ou senha incorretos!";
    die();
}

$data = $consulta->fetch(PDO::FETCH_OBJ);

$_SESSION['usuario'] = [
    'id' => $data->id_user,
    'nome' => $data->nome_user
];

header("Location: ../principal2.html");
