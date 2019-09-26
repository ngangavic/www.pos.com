<?php
$get_id=$_GET['id'];
//Database connection
include '../includes/connection.php'; 

$getProd=mysqli_query($link,"SELECT * FROM tbl_product_his WHERE transactionNo='$get_id' ")or die(mysqli_error());
while($row=mysqli_fetch_array($getProd)){
	$productCode=$row['productCode'];
	$description=$row['description'];
	$transactionNo=$row['transactionNo'];
	$quantity=$row['quantity'];
	$cost=$row['cost'];
	$salesValue=$row['salesValue'];
	$discount=$row['discount'];
	$year=$row['year'];
	$month=$row['month'];
	$day=$row['day'];
	$employee=$row['employeeId'];
$insertProd=mysqli_query($link,"INSERT INTO tbl_cancel(productCode,description,transactionNo,quantity,cost,salesValue,discount,year,month,day,employeeId,time)VALUES('$productCode','$description','$transactionNo','$quantity','$cost','$salesValue','$discount','$year','$month','$day','$employee',now())")or die(mysqli_error());
$sql = mysqli_query($link,"UPDATE tbl_products SET quantity=quantity+'$quantity' WHERE productCode='$productCode' ") or die (mysqli_error());
	
}

$delete=mysqli_query($link,"DELETE FROM tbl_product_his WHERE transactionNo='$get_id' ")or die (mysqli_error());
header("location: index.php?cmd=emptycart");

?>