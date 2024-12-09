<?php
session_start();
include 'db.php';

$action = $_POST['action'] ?? '';

if ($action === 'register') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare('INSERT INTO usuarios (user_name, user_password) VALUES (?, ?)');
    try {
        $stmt->execute([$username, $password]);
        header('Location: index.php');
    } catch (PDOException $e) {
        echo "Erro ao cadastrar usuário: " . $e->getMessage();
    }
} elseif ($action === 'login') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE user_name = ?');
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['user_password'])) {
        $_SESSION['username'] = $user['user_name'];
        $_SESSION['user_id'] = $user['id_user'];
        header('Location: dashboard.php');
    } else {
        echo "Login inválido!";
    }
} elseif ($action === 'add_password') {
    $description = $_POST['description'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare('INSERT INTO senhas (user_id, password, password_coment) VALUES (?, ?, ?)');
    $stmt->execute([$_SESSION['user_id'], $password, $description]);
    header('Location: dashboard.php');
} elseif ($action === 'logout') {
    session_destroy();
    header('Location: index.php');
}
?>
