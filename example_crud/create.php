<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $marca = $_POST['marca'];
  $modelo = $_POST['modelo'];
  $potencia = $_POST['potencia'];
  $ano = $_POST['ano'];

  $stmt = $pdo->prepare("INSERT INTO Automoveis (marca, modelo, potencia, ano) VALUES (?, ?, ?, ?)");
  $stmt->execute([$marca, $modelo, $potencia, $ano]);

  header('Location: index.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Adicionar Automóvel</title>
  <link rel="stylesheet" href="css/create.css">
</head>

<body>
  <div class="container">
    <h1>Adicionar Automóvel</h1>
    <form method="POST" action="">
      <label for="marca">Marca:</label>
      <input type="text" name="marca" id="marca" required><br>

      <label for="modelo">Modelo:</label>
      <input type="text" name="modelo" id="modelo" required><br>

      <label for="potencia">Potência:</label>
      <input type="number" name="potencia" id="potencia" required><br>

      <label for="ano">Ano:</label>
      <input type="number" name="ano" id="ano" required><br>

      <button type="submit">Adicionar</button>
    </form>
    <a href="index.php">Voltar</a>
  </div>
</body>

</html>
