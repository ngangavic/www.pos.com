
<?php 
include"../includes/connection.php";
$get_id=$_GET['id'];

$deleteProd=mysqli_query($link,"UPDATE tbl_products SET action='absent' WHERE id='$get_id' ")or die (mysqli_error());
?>
<script>
window.location="index.php";
alert("Product status changed successfully..");
</script>
<?php
$get_pr=$_GET['pr'];

$presentDel=mysqli_query($link,"UPDATE tbl_products SET action='present' WHERE id='$get_pr' ")or die (mysqli_error());
?>
<script>
window.location="index.php";
alert("Product status changed successfully..");
</script>