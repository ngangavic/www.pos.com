
<?php 
include"../includes/connection.php";
//$get_id=$_GET['id'];

//$deleteProd=mysqli_query($link,"UPDATE tbl_products SET action='absent' WHERE id='$get_id' ")or die (mysqli_error());
?>
<?php
if(isset($_GET['deactivate'])){
	$deactive = $_GET['deactivate'];
	//$sql = mysqli_query($link,"UPDATE  tbl_customer set active='no' WHERE id='".$deactive."' " );	
	$deleteProd=mysqli_query($link,"UPDATE tbl_products SET action='absent' WHERE id='".$deactive."' ")or die (mysqli_error());
		//header("location: index.php");	
?>
<script>
window.location="index.php";
alert("Product status changed successfully..");
</script>
<?php
}
//$get_pr=$_GET['pr'];

//$presentDel=mysqli_query($link,"UPDATE tbl_products SET action='present' WHERE id='$get_pr' ")or die (mysqli_error());
?>
<?php 
if(isset($_GET['activate'])){
	$active = $_GET['activate'];
	//$sql = mysqli_query($link,"UPDATE  tbl_customer set active='yes' WHERE id='".$active."' " );
$presentDel=mysqli_query($link,"UPDATE tbl_products SET action='present' WHERE id='".$active."' ")or die (mysqli_error());	
		//header("location: index.php");	
?>	
<script>
window.location="index.php";
alert("Product status changed successfully..");
</script>
<?php } ?>