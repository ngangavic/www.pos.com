<?php
include"../includes/connection.php";
if(isset($_POST['edit'])){
	$id=filter_var($_POST['id'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
	$department=filter_var($_POST['department'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$product=filter_var($_POST['product'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$percentage=filter_var($_POST['percentage'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	
	$updateDis=mysqli_query($link,"UPDATE tbl_discount SET department='$department',product='$product',percentage='$percentage' WHERE id='$id' ")or die(mysqli_error());	
?>
<script>
window.location="index.php";
alert("Discount Edit successful...");
</script>
<?php	
	}else{
?>
<script>
window.loaction="index.php";
alert("Error!Please try again to edit the Discount...");
</script>
<?php				
	}
?>