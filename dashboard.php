<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Senhas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Bem-vindo, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <h2>Suas Senhas</h2>
        <ul>
            <?php
            $stmt = $pdo->prepare('SELECT password_coment, password FROM senhas WHERE user_id = ?');
            $stmt->execute([$_SESSION['user_id']]);
            while ($row = $stmt->fetch()) {
                echo '<li>' . htmlspecialchars($row['password_coment']) . ': ' . str_repeat('*', strlen($row['password'])) . '</li>';
            }
            ?>
        </ul>
        <form action="process.php" method="POST">
            <input type="hidden" name="action" value="add_password">
            <div class="form-group">
                <label for="description">Descrição:</label>
                <input type="text" id="description" name="description" required>
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Adicionar</button>
        </form>
        <form action="process.php" method="POST">
            <input type="hidden" name="action" value="logout">
            <button type="submit">Sair</button>
        </form>
    </div>
</body>
</html>
