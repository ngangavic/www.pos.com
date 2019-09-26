<?php 
include"../includes/connection.php";

if(isset($_POST['add'])){
	$empId=filter_var($_POST['empId'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
	$name=filter_var($_POST['name'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
	$phone=filter_var($_POST['phone'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
	$email=filter_var($_POST['email'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
	$idNo=filter_var($_POST['idNo'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
	
$checkEmp=mysqli_query($link,"SELECT * FROM tbl_employees WHERE empId='$empId' ")or die (mysqli_error());
$countEmp=mysqli_num_rows($checkEmp);
if($countEmp > 0){
?>
<script>
window.location="index.php";
alert("Employee already exists \n You can only add a new employee...");
</script>
<?php	
}else{
	$insertEmp=mysqli_query($link,"INSERT INTO tbl_employees(empId,name,password,phone,email,idNo,dateAdded)VALUES('".$empId."','".$name."','0000','".$phone."','".$email."','".$idNo."',now())")or die (mysqli_error());
?>
<script>
window.location="index.php";
alert("Employee added successfully");
</script>
<?php	
}	
	
	
	
	
	
}



?>