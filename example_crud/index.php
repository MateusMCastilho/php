<?php
require 'db.php';

$stmt = $pdo->query("SELECT * FROM automoveis");
$automoveis = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Listar Modelos</title>
  <link rel="stylesheet" href="css/index.css">
</head>

<body>
  <div class="container">
    <h1>Modelos</h1>
    <a href="create.php" class="btn">Adicionar Novo Modelo</a>
    <table border="1">
      <tr>
        <th>ID</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Potência</th>
        <th>Ano</th>
        <th>Ações</th>
      </tr>
      <?php foreach ($automoveis as $automovel): ?>
        <tr>
          <td><?= $automovel['id'] ?></td>
          <td><?= $automovel['marca'] ?></td>
          <td><?= $automovel['modelo'] ?></td>
          <td><?= $automovel['potencia'] ?></td>
          <td><?= $automovel['ano'] ?></td>
          <td>
            <a href="edit.php?id=<?= $automovel['id'] ?>">Editar</a>
            <a href="delete.php?id=<?= $automovel['id'] ?>" onclick="return confirm('Tem certeza que deseja deletar este modelo de carro?')">Deletar</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
</body>

</html>
