<?php
include"../includes/connection.php";
if(isset($_POST['edit'])){
	$id=filter_var($_POST['id'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
	$name=filter_var($_POST['name'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$taxcode=filter_var($_POST['taxcode'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$percentage=filter_var($_POST['percentage'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	
	$updateProd=mysqli_query($link,"UPDATE tbl_taxcode SET name='$name',taxCode='$taxcode',percentage='$percentage' WHERE id='$id' ")or die(mysqli_error());	
?>
<script>
window.location="index.php";
alert("Taxcode Edit successful...");
</script>
<?php	
	}else{
?>
<script>
window.loaction="index.php";
alert("Error!Please try again to edit the taxCode...");
</script>
<?php				
	}
?>