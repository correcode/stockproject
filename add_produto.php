<?php
session_start();
require 'config.php';

if (!isset($_SESSION["usuario_id"])) {
  header("Location: login.php");
  exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $descricao = $_POST["descricao"];
  $precco = $_POST["preco"];
  $quantidade = $_POST["quantidade"];

  $stmt = $pdo->prepare("INSERT INTO produtos(nome, descricao, preco, quantidade) VALUES (?, ?, ?, ?)");
  if ($stmt->execute([$nome, $descricao, $preco, $quantidade])) {
    echo "Produtodo cadastrado com sucesso! <a href='produtos.php'>Ver produtos</a>";
  } else {
    echo "Erro ao cadastrar produto.";
  }
}
?>

<form method="POST">
  Nome: <input type="text" name="nome" required><br>
  Descricao: <textarea name="descricao"></textarea><br>
  Preco: <input type="number" step="0,01" name="preco" required><br>
  Quantidade: <input type="number" name="quantidade" required><br>
  <button type="submit">Cadastrar Produto</button>
</form>
<a href="dashboard.php">Voltar</a>