<?php
session_start();
require_once 'config/db.php';

$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username && $password) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['username'];
            header('Location: dashboard.php');
            exit;
        } else {
            $msg = "Credenciais inválidas.";
        }
    } else {
        $msg = "Preencha todos os campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Painel de Supervisão - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f3f3f3;
        }
        .login-box {
            margin-top: 100px;
        }
    </style>
</head>
<body>
<div class="position-absolute top-0 end-0 p-3">
    <button id="testDbBtn" class="btn btn-outline-secondary btn-sm">DB Test</button>
</div>

<div class="container login-box">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h3 class="text-center mb-4">🔐 Login - Supervisão</h3>
            <?php if ($msg): ?>
                <div class="alert alert-danger"><?= $msg ?></div>
            <?php endif; ?>
            <form method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Utilizador</label>
                    <input type="text" id="username"  name="username" class="form-control" required autofocus autocomplete="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Palavra-passe</label>
                    <input type="password" id="password"  name="password" class="form-control" required autocomplete="current-password">
                </div>
                <button type="submit" class="btn btn-primary w-100">Entrar</button>
            </form>
        </div>
    </div>
</div>
<script>
document.getElementById('testDbBtn').addEventListener('click', () => {
    fetch('test_db.php')
        .then(response => response.json())
        .then(data => {
            alert(data.message);
        })
        .catch(error => {
            alert("Erro inesperado: " + error);
        });
});
</script>

</body>
</html>

