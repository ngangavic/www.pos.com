<?php 
function getProducts() {
include"../includes/connection.php";
$countTotalproducts=mysqli_query($link,"SELECT * FROM tbl_products ")or die(mysqli_error());
while($row=mysqli_fetch_array($countTotalproducts)){
  $prodCode=$row['productCode'];
  $ids=$row['id'];
  $each=mysqli_query($link,"SELECT * FROM tbl_products WHERE productCode='$prodCode' ")or die(mysqli_error());
	while($row2=mysqli_fetch_array($each)){
	$name=$row2['description'];
	$quantity=$row2['quantity'];
	if($quantity <= 5){
		//echo " danger " , $name , $quantity , '</br>';
		echo 
		'<script> 
		var r = confirm("Some products quantity are getting low. \n Do you want to continue ?");
       if (r == true) {
           window.location="#";

        } else {
          // window.location="../cashier/action.php?=";
		  window.location="../logout.php";
        }
		</script>';
	}
}
}
}
?>