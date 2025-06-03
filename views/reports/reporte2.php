<?php

require_once '../../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf; //Core = nucleo de la libreria 
use Spipu\Html2Pdf\Exception\Html2PdfException; //Identificacion errores 
use Spipu\Html2Pdf\Exception\ExceptionFormatter; //Formatear PDF

try {
    ob_start();
    include_once '../../public/css/estilos-reporte.html'; 
    include_once '../contents/content-reporte2.php'; 
    
    $content = ob_get_clean();
    // El ultimo valor son los margenes del PDF: izquierda, derecha, arriba, abajo
    $html2pdf = new Html2Pdf('P', 'A4', 'es', true, 'UTF-8', array(15, 5, 15, 5));
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content);
    $html2pdf->output('reporte2.pdf');
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}