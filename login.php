<?php
include "includes/connection.php";



if(isset($_POST['login'])){
	$empId=filter_var($_POST['empId'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$password=filter_var($_POST['password'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
	//$remme=$_POST['remme'];
	
	
	$checkEmp=mysqli_query($link,"SELECT * FROM tbl_employees WHERE empId='".$empId."' ")or die(mysqli_error());
	$count=mysqli_num_rows($checkEmp);
	if($count==1){
		$verifyUser=mysqli_query($link,"SELECT * FROM tbl_employees WHERE empId='$empId' AND password='$password' ")or die(mysqli_error());
		$countUser=mysqli_num_rows($verifyUser);
		if($countUser > 0){
			if(isset($_POST['remme'])){
	            //setcookie('login',$empId,time()+60*60*24*365,'/');
	            setcookie('user',$empId,time()+60*60*24*365,'/');
	            setcookie('pass',md5($password),time()+60*60*24*365,'/');
	            echo $empId;
	            echo md5($password);
			}	
		}else{
			echo "You are lying to me...Mannerless";
		}
	}elseif($count > 1){
		echo "kindly see the admin for error rectification";
	}else{
		echo "you are not allowed to use this system.";
	}
	
	
	
}
/***

1.check if user exist
2.verify the details
3.create a cookie
***/

?>