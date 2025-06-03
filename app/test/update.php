<?php

require_once '../models/Mascota.php';

$mascotas = new Mascota();

$parametros = [
  "idpropietario" => 2,
  "tipo"          => "Gato",
  "nombre"        => "Chifu",
  "color"         => "gris con blanco",
  "genero"        => "macho",
  "idmascota"     => 5
];

$num = $mascotas->update($parametros);
var_dump($num);