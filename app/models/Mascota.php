<?php

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../entities/Mascota.entidad.php';

/**
 * Esta clase contiene la lógica para interactuar con la BD
 */
class Mascota {

  private $pdo = null;

  public function __construct() {
    $this->pdo = Database::getConexion();
  }

  public function create(MascotaEntidad $entidad): int {
    $sql = "INSERT INTO mascotas (idpropietario, tipo, nombre, color, genero) VALUES (?, ?, ?, ?, ?)";
    $query = $this->pdo->prepare($sql);
    $query->execute([
      $entidad->__GET('idpropietario'),
      $entidad->__GET('tipo'),
      $entidad->__GET('nombre'),
      $entidad->__GET('color'),
      $entidad->__GET('genero')
    ]);
    return $this->pdo->lastInsertId(); // Obtenemos el último ID
  }

  public function getAll(): array {
    $sql = "
      SELECT 
        MA.idmascota,
        MA.nombre,
        MA.tipo,
        MA.color,
        MA.genero,
        CONCAT(PR.apellidos, ' ', PR.nombres) AS propietario
      FROM mascotas MA 
      INNER JOIN propietarios PR ON MA.idpropietario = PR.idpropietario
      ORDER BY MA.nombre;
    ";
    $query = $this->pdo->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getById(): array {
    return [];
  }

  public function delete(): int {
    return 0;
  }

  /**
   * Actualiza los datos de la mascota
   * @param mixed Arreglo que contiene los campos requeridos
   * @return int Número de filas afectadas por la actualización
   */
  public function update($params = []): int {
    $sql = "
      UPDATE mascotas SET 
        idpropietario = ?, 
        tipo = ?, 
        nombre = ?,   
        color = ?, 
        genero = ? 
      WHERE idmascota = ?
    ";

    $query = $this->pdo->prepare($sql);
    $query->execute([
      $params['idpropietario'],
      $params['tipo'],
      $params['nombre'],
      $params['color'],
      $params['genero'],
      $params['idmascota']
    ]);

    return $query->rowCount();
  }
}
