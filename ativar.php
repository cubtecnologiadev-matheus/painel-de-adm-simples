<?php
include "conexao.php";
header("Content-Type: application/json");

// Capturar dados tanto de application/x-www-form-urlencoded quanto JSON
$data = $_POST;
if (empty($data)) {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
}

// Log para debug
file_put_contents("log.txt", print_r($data, true), FILE_APPEND);

$codigo = $data['codigo'] ?? null;
$id = $data['id'] ?? null;

if (!$id) {
    echo json_encode(["status" => "erro", "mensagem" => "ID da máquina não recebido"]);
    exit;
}

if ($codigo) {
    $stmt = $conn->prepare("SELECT * FROM codigos WHERE codigo = ?");
    $stmt->execute([$codigo]);
    $row = $stmt->fetch();

    if ($row) {
        if ($row['status'] === 'suspenso') {
            echo json_encode(["status" => "suspenso"]);
        } else {
            $stmt2 = $conn->prepare("UPDATE codigos SET id_maquina = ?, data_ativacao = NOW() WHERE codigo = ?");
            $stmt2->execute([$id, $codigo]);
            echo json_encode(["status" => "ativo"]);
        }
    } else {
        echo json_encode(["status" => "erro", "mensagem" => "Código inválido"]);
    }
} else {
    $stmt = $conn->prepare("SELECT * FROM codigos WHERE id_maquina = ?");
    $stmt->execute([$id]);
    $row = $stmt->fetch();

    if ($row) {
        if ($row['status'] === 'ativo') {
            echo json_encode(["status" => "ativo"]);
        } else {
            echo json_encode(["status" => "suspenso"]);
        }
    } else {
        echo json_encode(["status" => "erro", "mensagem" => "ID não ativado"]);
    }
}
?>
