<?php
include"../includes/connection.php";

if(isset($_POST['add'])){
	$name=filter_var($_POST['name'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
	
$checkExist=mysqli_query($link,"SELECT * FROM tbl_department WHERE name='$name' ");
	$data_match=mysqli_num_rows($checkExist);//count the output
	if($data_match>0){
?>
		<script>
		window.location="index.php";
		alert("Department already exist. \n You can only add a new department");
		</script>
		
<?php
		}else{
			
			 $insertInto=mysqli_query($link,"INSERT INTO tbl_department(name,dateAdded)VALUES('".$name."',now())")or die (mysqli_error());	
         
		}
?>
        <script>
		window.location="index.php";
		alert("Department added successfully");
		</script>
<?php		

}

?>	
	