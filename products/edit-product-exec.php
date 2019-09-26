<?php
include"../includes/connection.php";
if(isset($_POST['edit'])){
	$id=filter_var($_POST['id'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
	$productCode=filter_var($_POST['productCode'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$description=filter_var($_POST['description'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$sellingPrice=filter_var($_POST['sellingPrice'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$buyingPrice=filter_var($_POST['buyingPrice'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$quantity=filter_var($_POST['quantity'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$taxCode=filter_var($_POST['taxCode'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$department=filter_var($_POST['department'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	
	$updateProd=mysqli_query($link,"UPDATE tbl_products SET productCode='$productCode',description='$description',quantity='$quantity',sellingPrice='$sellingPrice',buyingPrice='$buyingPrice',taxCode='$taxCode',department='$department' WHERE id='$id' ")or die(mysqli_error());	
?>
<script>
window.location="index.php";
alert("Product Edit successful...");
</script>
<?php	
	}else{
?>
<script>
window.loaction="index.php";
alert("Error!Please try again to edit the product...");
</script>
<?php				
	}
?>