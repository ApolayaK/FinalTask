<?php

require_once '../models/Mascota.php';
$mascotas = new Mascota();
var_dump($mascotas->getAll());