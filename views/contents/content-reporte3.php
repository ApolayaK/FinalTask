<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Reporte de Mascotas</title>
</head>
<body>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
    }

    thead th {
      background-color: aquamarine;
    }

    td, th {
      border: 2px solid black;
      padding: 5px;
      text-align: left;
    }

    h1 {
      text-align: center;
    }
  </style>

  <h1>REPORTE DE MASCOTAS</h1>
  <div>
    <table>
      <colgroup>
        <col style="width: 10%;">
        <col style="width: 30%;">
        <col style="width: 15%;">
        <col style="width: 15%;">
        <col style="width: 10%;">
        <col style="width: 20%;">
      </colgroup>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre mascota</th>
          <th>Tipo</th>
          <th>Color</th>
          <th>Género</th>
          <th>Propietario</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($listaMascotas as $mascota): ?>
        <tr>
          <td><?= $mascota['idmascota'] ?></td>
          <td><?= $mascota['nombre'] ?></td>
          <td><?= $mascota['tipo'] ?></td>
          <td><?= $mascota['color'] ?></td>
          <td><?= $mascota['genero'] ?></td>
          <td><?= $mascota['propietario'] ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
