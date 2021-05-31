<?php

//ini_set("pcre.backtrack_limit", "5000000");

require_once base_path() . '/vendor/autoload.php';


$mpdf = new \Mpdf\Mpdf(['format' => [90, 200]]);

$html = ""; 

$html .= "<p class='text-center'>Recibo #" . $receipt->ID . "</p>";
$html .= "<p class='text-center'>" . $receipt->store . "</p>";

$html .= "<p class='text-left font-weight-bold mb-0'>Produtos</p>";
$html .= "<p class='mt-0'>------------------------------------- </p>";

foreach($items as $item){

    $html .= "<p class='text-left'>" . $item->product_name . "</p>";
    $html .= "<p><span class='text-left'>" . $item->product_price . " MT x " . $item->quantity . " un = ";
    $html .= $item->sub_total . "</span></p>";

}

$html .= "<p class='mt-0 mb-0'>------------------------------------- </p>";
$html .= "<p class='text-right font-weight-bold mb-0 mt-0'>Total</p>";
$html .= "<p class='mt-0 mb-0'>------------------------------------- </p>";
$html .= "<p class='text-right mt-0 mb-0'>" . $receipt->total . " MT</p>";
$html .= "<p class='mt-0 mb-0'>------------------------------------- </p>";

$html .= "<p> Endereco: " . $receipt->address . "</p>";
$html .= "<p> NUIT: " . $receipt->nuit ."</p>";
$html .= "<p> Contacto: " . $receipt->nuit ."</p>";




$stylesheet = file_get_contents(base_path() . '/public/src/css/receipt.css');

$filename = "SGV_RECIBO_" . $receipt->ID;

$mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);

$mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);

$mpdf->setTitle($filename);

ob_get_clean();

$mpdf->Output($filename . '.pdf', 'I');
