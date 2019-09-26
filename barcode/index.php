<?php
include('src/BarcodeGenerator.php');
include('src/BarcodeGeneratorPNG.php');
include('src/BarcodeGeneratorSVG.php');
include('src/BarcodeGeneratorJPG.php');
include('src/BarcodeGeneratorHTML.php');

$generator = new Picqer\Barcode\BarcodeGeneratorHTML();
//$generator->widthFactor(10);
echo $generator->getBarcode('61600348',$generator::TYPE_CODE_128_A),"TYPE_CODE_128_A";
echo $generator->getBarcode('61600348', $generator::TYPE_CODE_128),"TYPE_CODE_128";
echo $generator->getBarcode('61600348', $generator::TYPE_EAN_13),"TYPE_EAN_13";
echo $generator->getBarcode('6161102120639', $generator::TYPE_EAN_13),"TYPE_EAN_13";

?>