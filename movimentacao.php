<?php
session_start();
require 'config.php';

if (!isset($_SESSION["usuario_id"])) {
  header("Location: login.php");
  exit();
}

//Buscar produtos disponiveis
$stmt = $pdo->query("SELECT * FROM produtos");
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $produto_id = $_POST["produto_id"];
  $tipo = $_POST["tipo"];
  $quantidade = intval($_POST["quantidade"]);

  //Buscar o produto selecionado
  $stmt =  $pdo->prepare("SELECT quantidade FROM produtos WHERE id = ?");
  $stmt->execute([$produto_id]);
  $produto = $stmt->fetch(PDO::FETCH_ASSOC);

  if (!$produto) {
    echo "Produto nao encontrado!";
    exit();
  }

  if ($tipo == "entrada") {
    $nova_quantidade = $produto["quantidade"] + $quantidade;
  } elseif ($tipo == "saida") {
    if ($produto["quantidade"] < $quantidade) {
      echo "Erro: Estoque insuficiente!";
      exit;
    }
    $nova_quantidade = $produto["quantidade"] - $quantidade;
  } else {
    echo "Tipo invalido!";
    exit;
  }

  //Atualizar o estoque
  $stmt = $pdo->prepare("UPDATE produtos SET quantidade = ? WHERE id = ?");
  $stmt->execute([$produto_id, $tipo, $quantidade]);

  echo "Movimentacao registrada com sucesso! <a href='movimentacoes.php'>Ver historico</a>";
}
?>

<h2>Movimentacao de Estoque</h2>
<form method="POST">
  Produto:
  <select name="produto_id" required>
    <?php foreach ($produtos as $produto): ?>
      <option value="<?= $produto['id'] ?>"><?= $produto['nome']?></option>
    <?php  endforeach; ?>
  </select><br>

      Quantidade: <input type="number" name="quantidade" required><br>
      <button type="submit">Registrar Movimentacao</button>
</form>

<a href="dashboard.php">Voltar</a>