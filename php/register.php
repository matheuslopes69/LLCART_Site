<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Criar Conta</title>
</head>
<body>

<form action="cadastrar.php" method="post">

    <label>Nome:</label>
    <input type="text" name="nome" required><br>

    <label>Login:</label>
    <input type="text" name="login" required><br>

    <label>Senha:</label>
    <input type="password" name="senha" required><br>

    <button type="submit">Cadastrar</button>
</form>

<a href="login.php">Voltar ao login</a>

</body>
</html>
