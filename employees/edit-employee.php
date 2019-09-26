<?php 
	session_start();
		$name='';$emp='';
	if(($_SESSION['name']==$name)&&($SESSION['employeeId']==$emp))
	{
		header('location:../index.php');
		exit;
	}
	

?>
<?php $get_id=$_GET['id'];?>
<?php 
include"../includes/connection.php";
//$get_id=$_GET['id']; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include"../includes/header-scripts.php";?>
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php include"../navigation.php";?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      
      <?php //include"add-employee.php";?>
	  <?php //include"edit-employee.php";?>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Edit Employee
		</div>
        <div class="card-body">
          <div class="table-responsive">
		  <?php
		   $selectEmp=mysqli_query($link,"SELECT * FROM tbl_employees WHERE id='$get_id' " )or die (mysqli_error());
           while($row=mysqli_fetch_array($selectEmp));
		   $id=$row['id'];
		   $empId=$row['empId'];
		   $name=$row['name'];
		   $password=$row['password'];
		   $phone=$row['phone'];
		   $email=$row['email'];
		   $idNo=$row['idNo'];
		  
?>
         <form method="POST" action="edit-employee-exec.php" >
		  <div class="form-group">
		  <div class="form-row">
		  <div class="col-lg-6">
            <label for="exampleInputPassword1">Employee Id</label>
			<input class="form-control" id="exampleInputPassword1" type="hidden" name="Id" value="<?php echo $id; ?>" >
            <input class="form-control" id="exampleInputPassword1" type="text" name="EmployeeId" value="<?php echo $empId; ?>" >
          </div>
		  <div class="col-lg-6">
            <label for="exampleInputPassword1">Name</label>
            <input class="form-control" id="exampleInputPassword1" type="text" name="Name" value="<?php echo $name; ?>" >
          </div>
		  <div class="col-lg-6">
            <label for="exampleInputPassword1">Phone</label>
            <input class="form-control" id="exampleInputPassword1" type="text" name="Phone" value="<?php echo $phone; ?>" >
          </div>
		  <div class="col-lg-6">
            <label for="exampleInputPassword1">Email</label>
            <input class="form-control" id="exampleInputPassword1" type="text" name="Email" value="<?php echo $email; ?>" >
          </div>
		  <div class="col-lg-6">
            <label for="exampleInputPassword1">Id no</label>
            <input class="form-control" id="exampleInputPassword1" type="text" name="Idno" value="<?php echo $idNo; ?>" >
          </div>
		  
		  </div>
		  </div>
		  
		  
          <div class="modal-footer">
            <a href="index.php" class="btn btn-secondary" type="button" >Cancel</a>
            <button name="edit" type="submit" class="btn btn-primary" >EDIT</button>
          </div>
		  </form>
          </div>
        </div>
        <!--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>-->
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include"../includes/footer.php"; ?>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <?php include"../logout-modal.php";?>
    <?php include"../includes/footer-scripts.php"?>
  </div>
</body>

</html>
