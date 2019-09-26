<?php
include"../includes/connection.php";
if(isset($_POST['edit'])){
	$id=filter_var($_POST['id'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
	$name=filter_var($_POST['name'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
	
	$updateDept=mysqli_query($link,"UPDATE tbl_department SET name='$name' WHERE id='$id' " )or die (mysqli_error());	
?>
<script>
window.location="index.php";
alert("Department name updated successfully.");
</script>
<?php
}else{
?>
<script>
window.location="index.php";
alert("An Error occurred while editting \n Please try again.");
</script>
<?php } ?>