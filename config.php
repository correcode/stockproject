<?php 

$host = "localhost";
$dbname = "estoque_db";
$username = "root";
$password = "";

try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
  $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  var_dump($host, $dbname, $username, $password);
} catch (PDOException $e) {
     die("Erro de conexao: " . $e->getMessage());
}

?>