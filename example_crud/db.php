<?php
$host = 'localhost';  // Endereço do servidor
$dbname = 'teste';  // Nome do banco de dados
$username = 'root';  // Usuário do banco de dados
$password = '12341234';  // Senha do banco de dados

try {
  // String de conexão para PostgreSQL
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Erro ao conectar com o banco de dados: " . $e->getMessage());
}
