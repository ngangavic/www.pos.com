<?php
include"../includes/connection.php";
//$get_id=$_GET['id'];
if(isset($_POST['edit'])){

          $id=filter_var($_POST['id'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
		  $customerCode=filter_var($_POST['customerCode'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
		  $name=filter_var($_POST['name'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
		  $address=filter_var($_POST['address'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
		  $city=filter_var($_POST['city'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
		  $state=filter_var($_POST['state'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
		  $postalCode=filter_var($_POST['postalCode'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
		  $phone=filter_var($_POST['phone'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
		  $email=filter_var($_POST['email'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);

$editCust=mysqli_query($link,"UPDATE tbl_customer SET customerCode='$customerCode',name='$name',address='$address',city='$city',state='$state',postalCode='$postalCode',phone='$phone',email='$email' WHERE id='$id' ")or die (mysqli_error());
?>
<script>
window.location="index.php";
alert("Customer details updated successfully.");
</script>
<?php }else{ ?>
<script>
window.location="index.php";
alert("Error! While updating customer detials. \n Please try again...");
</script>
<?php } ?>