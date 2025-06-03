<?php

require_once '../config/Database.php';
require_once '../entities/Mascota.entidad.php';

/**
 * Esta clase contiene la logica para interactuar con la BD
 */
class Mascota {

  private $pdo = null;
  public function __construct() {$this->pdo = Database::getConexion();}

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
    return $this->pdo->lastInsertId(); //Obtenemos el ultimo ID
  }

  public function getAll():array {
    $sql = "
      SELECT 
      MA.idmascota,
      CONCAT(PR.apellidos,' ', PR.nombres) 'propietario'
      FROM mascotas MA 
      INNER JOIN propietarios PR ON ma.idpropietario = PR.idpropietario
      ORDER BY MA.nombre;
    ";
    $query = $this->pdo->prepare($sql);
    $query->execute();
    //FECH_CLASS (Coleccion de Objetos)
    //FETCH_ASSOC (Coleccion de Arreglos asociativos)
    //FETCH_OBJ (Coleccion de Objetos)
    //FETCH_COLUMN (Coleccion de una sola columna)
    //FETCH_NUM (Coleccion de arreglos indexados)
    //FETCH_BOTH (Coleccion de arreglos asociativos e indexados)
    //FETCH_KEY_PAIR (Coleccion de arreglos asociativos con clave y valor)
    //FETCH_UNIQUE (Coleccion de arreglos asociativos con clave unica)
    //FETCH_GROUP (Coleccion de arreglos asociativos agrupados por clave)
    //FETCH_FUNC (Coleccion de arreglos asociativos con una funcion de callback)
    return $query->fetchAll(PDO::FETCH_COLUMN);  
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
   * @return int Numero de filas afectadas por la actualizacion
   */
  public function update($params =[]): int {
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
    
    return $query->rowCount(); //Retorna la cantidad de filas afectadas
  }
}



