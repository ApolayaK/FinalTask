<?php

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../entities/Propietario.entidad.php';

/**
 * Esta clase contiene la lógica para interactuar con la tabla propietarios
 */
class Propietario {

  private $pdo = null;

  public function __construct() {
    $this->pdo = Database::getConexion();
  }

  /**
   * Inserta un nuevo propietario
   * @param PropietarioEntidad $entidad
   * @return int ID del nuevo propietario
   */
  public function create(PropietarioEntidad $entidad): int {
    $sql = "INSERT INTO propietarios (apellidos, nombres, dni, telefono, direccion) VALUES (?, ?, ?, ?, ?)";
    $query = $this->pdo->prepare($sql);
    $query->execute([
      $entidad->__GET('apellidos'),
      $entidad->__GET('nombres'),
      $entidad->__GET('dni'),
      $entidad->__GET('telefono'),
      $entidad->__GET('direccion')
    ]);
    return $this->pdo->lastInsertId();
  }

  /**
   * Devuelve todos los propietarios
   * @return array
   */
  public function getAll(): array {
    $sql = "
      SELECT 
        idpropietario,
        apellidos,
        nombres,
        dni,
        telefono,
        direccion
      FROM propietarios
      ORDER BY apellidos, nombres
    ";
    $query = $this->pdo->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
   * Actualiza los datos del propietario
   * @param mixed Arreglo con los datos del propietario
   * @return int Número de filas afectadas
   */
  public function update($params = []): int {
    $sql = "
      UPDATE propietarios SET 
        apellidos = ?, 
        nombres = ?, 
        dni = ?, 
        telefono = ?, 
        direccion = ?
      WHERE idpropietario = ?
    ";
    $query = $this->pdo->prepare($sql);
    $query->execute([
      $params['apellidos'],
      $params['nombres'],
      $params['dni'],
      $params['telefono'],
      $params['direccion'],
      $params['idpropietario']
    ]);
    return $query->rowCount();
  }

  //No se usan pero igual las puse
  public function delete(): int {
    return 0; 
  }

  public function getById(): array {
    return []; 
  }
}
