<?php
include("../includes/connection.php");

if(isset($_POST['return'])){
    if(isset($_POST['transactionNo'])&&isset($_POST['productCode'])&&isset($_POST['description'])&&isset($_POST['quantity'])
        &&isset($_POST['cost'])&&isset($_POST['salesValue'])&isset($_POST['discount'])&&isset($_POST['customerCode'])){
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
header("location: return.php?message=returns&&transaction=".$transactionNo);
    }else{
        header("location: return.php?message=returnf");
    }
}else{
    header("location: return.php?message=returnf");
}
?>