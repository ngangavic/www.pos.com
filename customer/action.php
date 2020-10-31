<?php
include"../includes/connection.php";
?>
<?php 
if(isset($_GET['activate'])){
	$active = $_GET['activate'];
	$sql = mysqli_query($link,"UPDATE  tbl_customer set active='yes' WHERE id='".$active."' " );	
		//header("location: index.php");	
?>	
<script>
window.location="index.php";
alert("Customer activated successfully.");
</script>	
<?php	
}else{
header("location: index.php");	
?>
<script>
alert("Error while activating customer. \n Try again...");
</script>	
<?php	
}
?>


<?php
if(isset($_GET['deactivate'])){
	$deactive = $_GET['deactivate'];
	$sql = mysqli_query($link,"UPDATE  tbl_customer set active='no' WHERE id='".$deactive."' " );	
		header("location: index.php");	
?>
<script>
alert("Customer de-activated successfully.");
</script>
<?php	
}else{
header("location: index.php");	
?>
<script>
alert("Error while de-activating customer. \n Try again...");
</script>	
<?php	
}
?>



<?php
if(isset($_GET['delete'])){
	$delete = $_GET['delete'];
	$deleteCust=mysqli_query($link,"DELETE FROM tbl_customer WHERE id='".$delete."' ")or die (mysqli_error());
	//$sql = mysqli_query($link,"UPDATE  tbl_customer set active='no' WHERE id='".$deactive."' " );	
		header("location: index.php");
?>
<script>
alert("Customer deleted successfully.");
</script>
<?php	
}else{
header("location: index.php");	
?>
<script>
alert("Error while deleting customer. \n Try again...");
</script>	
<?php	
}
?>