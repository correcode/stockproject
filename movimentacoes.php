<?php
session_start();
require 'config.php';

if (!isset($_SESSION["usuario_id"])) {
  header("Location: login.php");
  exit;
}

//Buscar historico de movimentacoes
$stmt = $pdo->query("
  SELECT movimentacoes.*, produtos.nome
  FROM movimentacoes
  JOIN produtos ON movimentacoes.produtos_id = produtos.id
  ORDER BY movimentacoes.data_movimentacao DESC
");
$movimentacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Historico de movimentacoes</h2>
<a href="movimentacao.php">Registrar Nova Movimentacao</a> | <a href="dashboard.php">Voltar</a>

<table border="1">
  <tr>
    <th>ID</th>
    <th>Produto</th>
    <th>Tipo</th>
    <th>Quantidade</th>
    <th>Data</th>
  </tr>
  <?php foreach ($movimentacoes as $mov): ?>
  <tr>
    <td><?= $mov["id"] ?></td>
    <td><?= $mov["nome"] ?></td>
    <td><?= ucfirst($mov["tipo"]) ?></td>
    <td><?= $mov["quantidade"] ?></td>
    <td><?= date("d/m/Y H:i", strtotime($mov["data_movimentacao"])) ?></td>
  </tr>
  <?php  endforeach; ?>
</table>