<?php

//require __DIR__.'/vendor/autoload.php'; // ABSOLUTO 
require_once '../../vendor/autoload.php'; // RELATIVO 
use Spipu\Html2Pdf\Html2Pdf; // name space for Html2Pdf que signica que es una clase dentro de un espacio de nombres

$html2pdf = new Html2Pdf();
$html2pdf->writeHTML('<h1>HelloWorld</h1>This is my first test');
$html2pdf->output();