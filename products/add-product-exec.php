<?php 
include"../includes/connection.php";

            /*$target_dir = "images/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);*/
if(isset($_POST['add'])){
    if(isset($_POST['productCode'])&&isset($_POST['description'])&&isset($_POST['sellingPrice'])
        &&isset($_POST['buyingPrice'])&&isset($_POST['quantity'])&&isset($_POST['taxCode'])&&isset($_POST['department'])){
	$productCode=filter_var($_POST['productCode'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$description=filter_var($_POST['description'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$sellingPrice=filter_var($_POST['sellingPrice'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$buyingPrice=filter_var($_POST['buyingPrice'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$quantity=filter_var($_POST['quantity'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$taxCode=filter_var($_POST['taxCode'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$department=filter_var($_POST['department'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	
	//check if the product exists
	$checkExist=mysqli_query($link,"SELECT * FROM tbl_products WHERE productCode='$productCode' ");
	$data_match=mysqli_num_rows($checkExist);//count the output
	if($data_match>0){
        header("location: index.php?message=exist");
?>
<!--		<script>-->
<!--		window.location="index.php";-->
<!--		alert("Product already exist. \n You can only add a new product");-->
<!--		</script>-->
		
<?php
		}else{
			
			/*$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                  if($check !== false) {
                   echo "File is an image - " . $check["mime"] . ".";
                   $uploadOk = 1;
                 } else {
                   echo "File is not an image.";
                   $uploadOk = 0;
                 }
	
	if($uploadOk = 1){
		move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
		$photo = "images/" . $_FILES["fileToUpload"]["name"];
		
			$insertInto=mysqli_query($link,"INSERT INTO tbl_products (productCode,description,quantity,sellingPrice,buyingPrice,taxCode,department,dateadded,image,delete) VALUES ('".$productCode."','".$description."','".$quantity."','".$sellingPrice."','".$buyingPrice."','".$taxCode."','".$department."','".$photo."',now(),'no')")or die (mysqli_error());	
           // $insertInto=mysqli_query($link,"INSERT INTO tbl_products (productCode,description,quantity,sellingPrice,buyingPrice,taxCode,department,dateadded,image,delete) VALUES ('".$productCode."','".$description."','".$quantity."','".$sellingPrice."','".$buyingPrice."','','','".$photo."',now(),'no')")or die (mysqli_error());		
			//$sql = mysqli_query($link,"INSERT INTO tbl_parent(firstname,lastname,phonenumber,admnumber,password,reg_date) VALUES ('".$firstname."','".$lastname."','".$phonenumber."','".$admnumber."','".$password."',now())") or die (mysqli_error());
				
		}*/
			//$insertInto=mysqli_query($link,"INSERT INTO tbl_products(productCode)VALUES('".$productCode."')")or die (mysqli_error());
            //$insertInto=mysqli_query($link,"INSERT INTO tbl_products(description)VALUES('".$description."')")or die (mysqli_error());
             // $insertInto=mysqli_query($link,"INSERT INTO tbl_products(quantity)VALUES('".$quantity."')")or die (mysqli_error());
             // $insertInto=mysqli_query($link,"INSERT INTO tbl_products(sellingPrice,buyingPrice,taxcode,department,dateadded,image,action)VALUES('".$sellingPrice."','".$buyingPrice."','".$taxCode."','".$department."',now(),'not available','present')")or die (mysqli_error());			  
          $insertInto=mysqli_query($link,"INSERT INTO tbl_products(productCode,description,quantity,sellingPrice,buyingPrice,taxcode,department,dateadded,image,action)VALUES('".$productCode."','".$description."','".$quantity."','".$sellingPrice."','".$buyingPrice."','".$taxCode."','".$department."',now(),'not available','present')")or die (mysqli_error());

        header("location: index.php?message=success");
		
		}

?>
<!--        <script>-->
<!--		window.location="index.php";-->
<!--		alert("Product added successfully");-->
<!--		</script>-->
<?php		

}else{
        header("location: index.php?message=error");
        ?>
<!--        <script>-->
<!--            window.location="index.php";-->
<!--            alert(":-( An error occurred. Please try again.");-->
<!--        </script>-->
<?php
    }
}
?>