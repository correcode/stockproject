<?php 
session_start();
require 'config.php';

if(!isset($_SESSION["usuario_id"])) {
  header("Location: login.php");
  exit();
}

if(!isset($_GET["id"])) {
  header("Location: produtos.php");
  exit();
}

$id = $_GET["id"];
$stmt = $pdo->prepare("DELETE FROM produtos WHERE id = ?");
$stmt->execute([$id]);

header("Lotacion: produtos.php");
exit();
?>