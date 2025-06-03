<?php
/**
 * La entidad contiene los atributos de la mascota
 */
class MascotaEntidad{
  private $idmascota;
  private $idpropietario;
  private $tipo;
  private $nombre;
  private $color;
  private $genero;
  private $vive;

  //Métodos de acces

  public function __GET($atributo){
    return $this->$atributo;
  }

  public function __SET($atributo, $valor){
    $this->$atributo = $valor;
  }
}