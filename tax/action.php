
<?php 
include"../includes/connection.php";
?>
<?php
$get_id=$_GET['id'];
$deleteTax=mysqli_query($link,"DELETE FROM tbl_taxcode WHERE id='$get_id' ")or die (mysqli_error());

?>
<script>
window.location="index.php";
alert("Taxcode deleted successfully...");
</script>