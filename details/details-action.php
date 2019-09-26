<?php
include"../includes/connection.php";
//$get_id=$_GET['id'];
if(isset($_POST['update'])){

          $name=filter_var($_POST['name'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
		  $address=filter_var($_POST['address'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
		  $code=filter_var($_POST['code'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
		  $city=filter_var($_POST['city'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
		  $phone=filter_var($_POST['phone'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
		  $footer=filter_var($_POST['footer'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
		  

$editDet=mysqli_query($link,"UPDATE tbl_details SET name='$name',address='$address',code='$code',city='$city',phone='$phone',footer='$footer' WHERE id='1' ")or die (mysqli_error());
?>
<script>
window.location="index.php";
alert("Business details updated successfully.");
</script>
<?php }else{ ?>
<script>
window.location="index.php";
alert("Error! While updating business detials. \n Please try again...");
</script>
<?php } ?>