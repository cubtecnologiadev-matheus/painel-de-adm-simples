<?php
session_start();
if (isset($_SESSION['logado'])) {
    header("Location: painel.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Painel de Login</title>
</head>
<body>
    <h2>Login do Administrador</h2>
    <form method="POST" action="login.php">
        <input type="password" name="senha" placeholder="Senha do painel" required>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
