<?php
session_start();
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: index.php");
    exit();
}

require_once("conexao.php");

$acao = $_GET['acao'] ?? '';
$id = $_GET['id'] ?? '';

if ($acao && $id) {
    if ($acao === 'suspender') {
        $stmt = $conn->prepare("UPDATE codigos SET status = 'suspenso' WHERE id = ?");
        $stmt->execute([$id]);
    } elseif ($acao === 'excluir') {
        $stmt = $conn->prepare("DELETE FROM codigos WHERE id = ?");
        $stmt->execute([$id]);
    }
}

header("Location: painel.php");
exit;
?>