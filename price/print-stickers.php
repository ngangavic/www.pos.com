<?php
$get_code=$_GET['code'];
include"../includes/connection.php";
include('../barcode/src/BarcodeGenerator.php');
include('../barcode/src/BarcodeGeneratorPNG.php');
include('../barcode/src/BarcodeGeneratorSVG.php');
include('../barcode/src/BarcodeGeneratorJPG.php');
include('../barcode/src/BarcodeGeneratorHTML.php');

$generator = new Picqer\Barcode\BarcodeGeneratorHTML();

$getDet=mysqli_query($link,"SELECT * FROM tbl_products WHERE productCode='$get_code' ")or die(mysqli_error());
//$N=mysqli_num_rows($getDet);
$row=mysqli_fetch_array($getDet);
//echo $row['quantity'];
$N=$row['quantity'];
for($i=0;$i<=$N;$i++){
echo $generator->getBarcode($row['productCode'],$generator::TYPE_CODE_128_A);
	echo $row['productCode'],"\n",'</br></br></br>';
}
?>
<script>
window.print();
window.location="stickers.php";
</script>