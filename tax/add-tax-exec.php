<?php 
include"../includes/connection.php";

if(isset($_POST['add'])){
	$name=filter_var($_POST['name'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$taxcode=filter_var($_POST['taxcode'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$percentage=filter_var($_POST['percentage'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	
	//check if the tax exists
	$checkExist=mysqli_query($link,"SELECT * FROM tbl_taxcode WHERE taxCode='$taxcode' ");
	$data_match=mysqli_num_rows($checkExist);//count the output
	if($data_match>0){
?>
		<script>
		window.location="index.php";
		alert("Tax code already exist. \n You can only add a new taxcode");
		</script>
		
<?php
		}else{
			
          $insertInto=mysqli_query($link,"INSERT INTO tbl_taxcode(name,taxCode,percentage,dateAdded)VALUES('".$name."','".$taxcode."','".$percentage."','now()')")or die (mysqli_error());	
          
		}
?>
        <script>
		window.location="index.php";
		alert("Taxcode added successfully");
		</script>
<?php		

}

?>