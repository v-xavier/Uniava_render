<?php
session_start();
if (isset($_SESSION['username'])) {
    header('Location: dashboard.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Senhas - Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Gerenciador de Senhas</h1>
        <form action="process.php" method="POST">
            <input type="hidden" name="action" value="login">
            <div class="form-group">
                <label for="username">Usuário:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Entrar</button>
        </form>
        <p><a href="register.php">Cadastrar-se</a></p>
    </div>
</body>
</html>
