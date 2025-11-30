<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: index.php");
    exit();
}

require_once("conexao.php");

$sql = "SELECT * FROM codigos ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Painel de Ativação</title>
    <meta charset="UTF-8">
    <style>
        body { font-family: sans-serif; background-color: #f4f4f4; padding: 20px; }
        h2 { color: #333; }
        table { border-collapse: collapse; width: 100%%; }
        th, td { padding: 8px; border: 1px solid #aaa; text-align: center; }
        th { background-color: #555; color: #fff; }
        tr:nth-child(even) { background-color: #eee; }
        .botoes { margin-top: 20px; }
        .botoes a {
            text-decoration: none; padding: 10px 15px; background-color: #0066cc;
            color: #fff; border-radius: 5px; margin-right: 10px;
        }
        .botoes a:hover { background-color: #004999; }
    </style>
</head>
<body>

<h2>🔐 Painel de Administração</h2>

<div class="botoes">
    <a href="gerar.php">➕ Gerar Código</a>
    <a href="logout.php">🚪 Sair</a>
</div>

<br>
<table>
    <tr>
        <th>ID</th>
        <th>Código</th>
        <th>ID da Máquina</th>
        <th>Data Ativação</th>
        <th>Status</th>
        <th>Ação</th>
    </tr>
    <?php while($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['codigo']; ?></td>
        <td><?php echo $row['id_maquina'] ?? '---'; ?></td>
        <td><?php echo $row['data_ativacao'] ?? '---'; ?></td>
        <td><?php echo $row['status']; ?></td>
        <td>
            <a href="acao.php?acao=suspender&id=<?php echo $row['id']; ?>">Suspender</a> |
            <a href="acao.php?acao=excluir&id=<?php echo $row['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

</body>
</html>