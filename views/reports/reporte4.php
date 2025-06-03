<?php

require_once '../../vendor/autoload.php';
require_once '../../app/models/Propietario.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
    $propietarios = new Propietario();
    $listaPropietarios = $propietarios->getAll();

    ob_start();
    include_once '../contents/content-reporte4.php'; 
    $content = ob_get_clean();

    $html2pdf = new Html2Pdf('L', 'A4', 'es', true, 'UTF-8', array(20, 10, 10, 20));
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content);
    $html2pdf->output('reporte4.pdf');
} catch (Html2PdfException $e) {
    $html2pdf->clean();
    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}
