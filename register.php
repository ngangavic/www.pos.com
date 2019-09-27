<?php
require "includes/connection.php";
if(isset($_POST['register'])){
    //get previous employee id
    $stmt=$link->prepare("SELECT empId FROM tbl_employees ORDER BY empId DESC LIMIT 1 ");
    $stmt->execute();
    $stmt->bind_result($empId);
    $stmt->fetch();
    $empId=$empId+1;
$stmt->close();

//insert to database
$name=$_POST['name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$idno=$_POST['idno'];
$password=password_hash($_POST['password'], PASSWORD_DEFAULT);

$stmt=$link->prepare("INSERT INTO tbl_employees(empId,name,password,phone,email,idNo)VALUES(?,?,?,?,?,?)");
$stmt->bind_param("ssssss",$empId,$name,$password,$phone,$email,$idno);
if(!$stmt->execute()){
header("location:register.php?info=error");
}else{
  header("location: register.php?info=success ");
}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "includes/header-scripts.php";?>
  <script src="js/validate.js"></script>
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
      
      <?php  if(isset($_GET['info'])){
        $info=$_GET['info'];
        if($info=='error'){
        ?>
      <div class="alert-danger">
      <strong>Error!</strong>Registration failed.
      </div>
      <?php   }else if($info=='success'){ ?>
      <div class="alert-success">
      <strong>Success!</strong>Registration succesful.
      </div>

      <?php }}?>
        <form action="" method="post" role="form" >
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Name</label>
                <input class="form-control" name="name" type="text" placeholder="Enter first and second name">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Phone</label>
                <input class="form-control" name="phone" type="text" placeholder="Enter phone number">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Email</label>
                <input class="form-control" name="email" type="email" placeholder="Enter email">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">ID No.</label>
                <input class="form-control" name="idno" type="text" placeholder="Enter ID No.">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Password</label>
                <input class="form-control" name="password" type="password"  placeholder="Password" id="pass1">
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Confirm password</label>
                <input class="form-control" type="password"  placeholder="Confirm password" id="pass2" onKeyUp="checkPass(); return false;">
              </div>
            </div>
			<span id="confirmMessage" class="alert alert-danger"></span>
          </div>
          <button type="submit" class="btn btn-primary btn-block" name="register" >Register</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="index.php">Login</a>
          <a class="d-block small" href="reset-password.php">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
  <?php include "includes/footer-scripts.php"?>
</body>

</html>
