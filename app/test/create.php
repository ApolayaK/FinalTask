<?php

require_once '../entities/Mascota.entidad.php';
require_once '../models/Mascota.php';

//Entidad = CONTENEDOR DE DATOS
$entidad = new MascotaEntidad();
$entidad->__SET('idpropietario', 1);
$entidad->__SET('tipo', 'Gato');
$entidad->__SET('nombre', 'Bills');
$entidad->__SET('color', 'Gris');
$entidad->__SET('genero', 'macho');

//Modelo = accion/logica backend
$mascotas = new Mascota();
$idgenerado = $mascotas->create($entidad);
var_dump($idgenerado);