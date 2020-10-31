<?php 
include"../includes/connection.php";

if(isset($_POST['add'])){
	$department=filter_var($_POST['department'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$product=filter_var($_POST['product'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$percentage=filter_var($_POST['percentage'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	
	//check if the tax exists
	$checkExist=mysqli_query($link,"SELECT * FROM tbl_discount WHERE department='$department' AND product='$product' ");
	$data_match=mysqli_num_rows($checkExist);//count the output
	if($data_match>0){
?>
		<script>
		window.location="index.php";
		alert("Discount on this product already exist. \n Try edit the existing discount on this product");
		</script>
		
<?php
		}else{
			
          $insertInto=mysqli_query($link,"INSERT INTO tbl_discount(department,product,percentage,date_added)VALUES('".$department."','".$product."','".$percentage."',now())")or die (mysqli_error());	
          
		}
?>
        <script>
		window.location="index.php";
		alert("Discount added successfully");
		</script>
<?php		

}

?>