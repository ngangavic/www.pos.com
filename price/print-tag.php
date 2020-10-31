<?php
$get_code=$_GET['code'];
include"../includes/connection.php";

$getDet=mysqli_query($link,"SELECT * FROM tbl_products WHERE productCode='$get_code' ")or die(mysqli_error());
$row=mysqli_fetch_array($getDet);
$code=$row['productCode'];
$description=$row['description'];

echo $code,'</br>';
echo $description;








/*if(isset($_POST['print'])){
$code=$_POST['prodCode'];
$description=$_POST['description'];
$number=$_POST['number'];
//$N=count($number);
echo $number;
for($i=0;$i<$number;$i++){
	
    echo $description,'</br>';
	echo $code,'</br></br>';
	
}
}*/
?>
<script>
window.print();
window.location="tags.php";
</script>