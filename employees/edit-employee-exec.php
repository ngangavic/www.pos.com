<?php 
include"../includes/connection.php";

if(isset($_POST['edit'])){
	$Id=filter_var($_POST['Id'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
	$EmployeeId=filter_var($_POST['EmployeeId'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
	$Name=filter_var($_POST['Name'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
	$Phone=filter_var($_POST['Phone'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
	$Email=filter_var($_POST['Email'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
	$Idno=filter_var($_POST['Idno'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
	
$updateEmp=mysqli_query($link,"UPDATE tbl_employees SET empId='$EmployeeId',name='$Name',phone='$Phone',email='$Email',idNo='$Idno' WHERE id='$Id' " )or die (mysqli_error());		

?>
<script>
window.location="index.php";
alert="Employee details activated";
</script>
<?php 
}else{
?>
<script>
window.location="index.php";
alert="Error while updating details. \n Please try again...";
</script>
<?php
}
?>