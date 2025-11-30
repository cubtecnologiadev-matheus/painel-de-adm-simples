<?php
session_start();
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: index.php");
    exit();
}

require_once("conexao.php");

function gerar_codigo($tamanho = 10) {
    $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
    $codigo = '';
    for ($i = 0; $i < $tamanho; $i++) {
        $codigo .= $chars[random_int(0, strlen($chars) - 1)];
    }
    return $codigo;
}

$codigo = gerar_codigo();
$stmt = $conn->prepare("INSERT INTO codigos (codigo) VALUES (?)");
$stmt->execute([$codigo]);

header("Location: painel.php");
exit;
?>