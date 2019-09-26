<?php 
include"../includes/connection.php";

if(isset($_POST['add'])){
	$customerCode=filter_var($_POST['customerCode'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
	$name=filter_var($_POST['name'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
	$address=filter_var($_POST['address'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
	$city=filter_var($_POST['city'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
	$state=filter_var($_POST['state'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
	$postalCode=filter_var($_POST['postalCode'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
	$phone=filter_var($_POST['phone'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
	$email=filter_var($_POST['email'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
	
//check if customer exist
$checkCustomer=mysqli_query($link,"SELECT * FROM tbl_customer WHERE customerCode='$customerCode' ")or die(mysqli_error());	
$countCustomer=mysqli_num_rows($checkCustomer);//count customers
if($countCustomer > 0){
?>
<script>
window.location="index.php";
alert("Customer already exists \n You can only add a new customer");
</script>
<?php	
}else{
	$insert=mysqli_query($link,"INSERT INTO tbl_customer(customerCode,name,company,address,city,state,postalCode,phone,email,dateadded,active)VALUES('".$customerCode."','".$name."','','".$address."','".$city."','".$state."','".$postalCode."','".$phone."','".$email."',now(),'yes')")or die (mysqli_error());
?>
<script>
window.location="index.php";
alert("Customer added successfully...");
</script>
<?php
	
	}
	
	
	
	
}

?>