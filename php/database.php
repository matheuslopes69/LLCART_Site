<?php
$host = "localhost";
$port = "3306";
$user = "root";
$senha = "";
$banco = "restaurante";

try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$banco;charset=utf8", $user, $senha);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("ERRO: " . $e->getMessage());
}
?>
