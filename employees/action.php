
<?php 
include"../includes/connection.php";
$get_id=$_GET['id'];

$deleteProd=mysqli_query($link,"DELETE FROM tbl_employees WHERE id='$get_id' ")or die (mysqli_error());
?>
<script>
window.location="index.php";
alert("Employee deleted successfully..");
</script>