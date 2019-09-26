<?php
include("../includes/connection.php");

if(isset($_POST['return'])){
	$transactionNo=$_POST['transactionNo'];
	$productCode=$_POST['productCode'];
    $description=$_POST['description'];
    $quantity=$_POST['quantity'];
    $cost=$_POST['cost']; 
    $salesValue=$_POST['salesValue']; 
    $discount=$_POST['discount'];
    $customerCode=$_POST['customerCode'];
	$month=date('m');
    $day=date('d');
	
	$pasteGroup=mysqli_query($link,"INSERT INTO tbl_return(productCode,description,transactionNo,quantity,cost,salesValue,discount,transactionDate,transactionTime,customerCode,year,month,day)VALUES('$productCode','$description','$transactionNo','$quantity','$cost','$salesValue','$discount',now(),now(),'$customerCode',now(),'$month','$day')");
	
	$delete=mysqli_query($link,"DELETE FROM tbl_product_his WHERE productCode='$productCode' AND transactionNo='$transactionNo'");
}

?>
<script>
alert("Item returned successsfully");
window.location="../cashier/";
</script>