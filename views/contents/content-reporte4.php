<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Reporte de Propietarios</title>
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
</head>
<body>

  <h1>REPORTE DE PROPIETARIOS</h1>
  <div>
    <table>
      <colgroup>
        <col style="width: 10%;">
        <col style="width: 25%;">
        <col style="width: 25%;">
        <col style="width: 15%;">
        <col style="width: 15%;">
        <col style="width: 10%;">
      </colgroup>
      <thead>
        <tr>
          <th>ID</th>
          <th>Apellidos</th>
          <th>Nombres</th>
          <th>DNI</th>
          <th>Teléfono</th>
          <th>Dirección</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($listaPropietarios as $propietario): ?>
            <tr>
                <td><?= $propietario['idpropietario'] ?></td>
                <td><?= $propietario['apellidos'] ?></td>
                <td><?= $propietario['nombres'] ?></td>
                <td><?= $propietario['dni'] ?></td>
                <td><?= $propietario['telefono'] ?></td>
                <td><?= $propietario['direccion'] ?></td>
            </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</body>
</html>
