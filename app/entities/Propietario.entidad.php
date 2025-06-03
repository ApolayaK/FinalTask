<?php
/**
 * La entidad contiene los atributos del propietario
 */
class PropietarioEntidad {
  private $idpropietario;
  private $apellidos;
  private $nombres;
  private $dni;
  private $telefono;
  private $direccion;

  // Métodos de acceso genéricos
  public function __GET($atributo) {
    return $this->$atributo;
  }

  public function __SET($atributo, $valor) {
    $this->$atributo = $valor;
  }
}
