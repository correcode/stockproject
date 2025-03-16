<?php
session_start();
require 'config.php';

if (!isset($_SESSION["usuario_id"])) {
  header("Location: login.php"); 
  exit();
}

if (!isset($_GET["id"])) {
  header("Location: produtos.php");
  exit();
}

$id = $_GET["id"];
$stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = ?");
$stmt->execute(["id"]);
$produtos = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $descricao = $_POST["descricao"];
  $preco = $_POST["preco"];
  $quantidade = $_POST["quantidade"];

  $stmt = $pdo->prepare("UPDATE produtos SET nome = ?, descricao = ?, preco = ?, quantidade = ? WHERE id= ?");
  if($stmt->execute([$nome, $descricao, $preco, $quantidade, $id])) {
    header( "Location : produtos.php");
    exit();
  } else {
    echo "Erro ao atualizar produto.";
  }
}
?>

<form method="POST">
  Nome: <input type="text" name="nome" value="<?= $produto["nome"] ?>" required><br>
  Descricao: <textarea name="descricao"><?= $produto["descricao"] ?></textarea><br>
  Preco: <input type="number" step="0.01" name="preco" value="<?= $produto["preco"] ?>" required><br>
  <button type="submit">Salvar Alteracoes</button>
</form>
<a href="produtos.php">Voltar</a>