<?php



require 'vendor/autoload.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml(" 
ALIREZA KOHANDANI<br>
SOFTWARE ENGINEER<br>
Experienced Web Developer with a demonstrated history of working in the computer software industry. Skilled in PHP, jQuery, Bootstrap, and Cascading Style Sheets (CSS).");

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();