<?php
session_start();
require 'config.php';

if (!isset($_SESSION["usuario_id"])) {
  header("Location: login.php");
  exit();
}

$stmt = $pdo->query("SELECT * FROM produtos");
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Lista de Produtos</h2>
<a href="add_produto.php">Adiciona Produto</a> |  <a href="dashboard.php">Voltar</a>
<table border="1">
  <tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Descricao</th>
    <th>Preco</th>
    <th>Quantidade</th>
    <th>Acoes</th>
  </tr>
  <?php foreach ($produtos as $produto): ?>
    <tr>
        <td><?= $produto ["id"] ?></td>
        <td><?= $produto ["nome"] ?></td>
        <td><?= $produto ["descricao"] ?></td>
        <td><?= number_format($produto["preco"], 2, ',', ',') ?></td>
        <td><?= $produto["quantidade"] ?></td>
        <td>
          <a href="edit_produto.php?id=<?= $produto["id"] ?>">Editar</a> |
          <a href="delete_produto.php?id=<?= $produto["id"] ?>" onclick="return confirm('Tem certeza?')">Excluir</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>