<?php



include 'vendor/autoload.php';
Mpdf\Mpdf::class;
use Mpdf\Mpdf;

$mpdf = new Mpdf();

$mpdf->Bookmark('Start of the document');
$mpdf->WriteHTML('<div>Section 1 text</div>');

$mpdf->Output();
