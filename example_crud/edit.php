<?php
require 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM Automoveis WHERE id = ?");
$stmt->execute([$id]);
$automovel = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$automovel) {
  die("Carro não encontrado.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $marca = $_POST['marca'];
  $modelo = $_POST['modelo'];
  $potencia = $_POST['potencia'];
  $ano = $_POST['ano'];

  $stmt = $pdo->prepare("UPDATE Automoveis SET marca = ?, modelo = ?, potencia = ?, ano = ? WHERE id = ?");
  $stmt->execute([$marca, $modelo, $potencia, $ano, $id]);

  header('Location: index.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Editar Automóvel</title>
  <link rel="stylesheet" href="css/edit.css">
</head>

<body>
  <div class="container">
    <h1>Editar Automóvel</h1>
    <form method="POST" action="">
      <label for="marca">Marca:</label>
      <input type="text" name="marca" id="marca" value="<?= $automovel['marca'] ?>" required><br>

      <label for="modelo">Modelo:</label>
      <input type="text" name="modelo" id="modelo" value="<?= $automovel['modelo'] ?>" required><br>

      <label for="potencia">Potência:</label>
      <input type="number" name="potencia" id="potencia" value="<?= $automovel['potencia'] ?>" required><br>

      <label for="ano">Ano:</label>
      <input type="number" name="ano" id="ano" value="<?= $automovel['ano'] ?>" required><br>

      <button type="submit">Atualizar</button>
    </form>
    <a href="index.php">Voltar</a>
  </div>
</body>

</html>
