<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Reporte de Mascotas</title>
</head>
<body>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 20px;
    color: #222;
  }

  h1 {
    text-align: center;
    color: #00796b; 
    margin-bottom: 20px;
  }

  table {
    width: 100%;
    border-collapse: collapse;
  }

  thead th {
    background-color: #80cbc4; 
    color: #004d40; 
    border: 1.5px solid #004d40;
    padding: 8px 10px;
    font-weight: bold;
  }

  tbody td {
    border: 1.5px solid #004d40;
    padding: 8px 10px;
    text-align: left;
  }

  tbody tr:nth-child(even) {
    background-color: #e0f2f1; 
  }

  tbody tr:hover {
    background-color: #b2dfdb;
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
