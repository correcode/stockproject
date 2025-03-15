<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);

  $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
  if ($stmt->execute([$nome, $email, $senha])) {
    echo "Cadastro realizado com sucesso! <a href='login.php'> Faca login</a>";
  } else {
    echo "Erro ao cadastrar.";
  }
}
?>

<form method="POST">
  Nome: <input type="text" name="nome" required><br>
  E-mail: <input type="email" name="email" reuired><br>
  Senha: <input type="password" name="senha" required><br>
  <button type="submit">Cadastrar</button>
</form>