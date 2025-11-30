<?php
session_start();
$senha_correta = "admin123"; // você pode mudar essa senha

if ($_POST['senha'] === $senha_correta) {
    $_SESSION['logado'] = true;
    header("Location: painel.php");
} else {
    echo "Senha incorreta.";
}
?>
