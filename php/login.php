<?php
session_start();
if (isset($_SESSION['usuario'])) {
    header('Location: ../principal2.html');
    die();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<form action="logar.php" method="post">
    <label>Login:</label>
    <input type="text" name="login" required><br>

    <label>Senha:</label>
    <input type="password" name="senha" required><br>

    <button type="submit">Entrar</button>
</form>

<a href="register.php">Criar conta</a>

</body>
</html>
