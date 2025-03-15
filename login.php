<?php 
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $senha = $_POST["senha"];

  $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
  $stmt->execute([$email]);
  $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($usuario && password_verify($senha, $usuario["senha"])) {
    $_SESSION["usuario_id"] = $usuario["id"];
    $_SESSION["usuario_nome"] = $usuario["nome"];
    header("Location: dashboard.php");
    exit;
  } else {
    echo "E-mail ou senha incorretos.";
  }
}
?>

<form method="POST">
  E-mail: <input type="email" name="email" required><br>
  Senha: <input type="password" name="senha" required><br>
  <button type="submit">Entrar</button>
</form>