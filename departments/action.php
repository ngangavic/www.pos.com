<?php
include"../includes/connection.php";
$get_id=$_GET['id'];

$deleteDept=mysqli_query($link,"DELETE FROM tbl_department WHERE id='$get_id' ")or die (mysqli_error());
?>
<script>
window.location="index.php";
alert("Department deleted successfully.");
</script>