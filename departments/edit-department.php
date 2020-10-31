<?php 
	session_start();
if (!isset($_SESSION['name'])&&!isset($_SESSION['employeeId'])&&!isset($_SESSION['category']))
	{
		header('location:../index.php');
		exit;
	}
	

?>
<?php $get_id=$_GET['id']; ?>
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
      <!-- Icon Cards-->
      
      <!-- Area Chart Example-->
      
      <?php include"add-department.php";?>
	  <?php //include"edit-department.php";?>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Edit Departments
		<a data-toggle="modal" data-target="#addModal" class="btn btn-primary">Add Department</a>  
		</div>
        <div class="card-body">
          <div class="table-responsive">
		  <?php $selectDept=mysqli_query($link,"SELECT * FROM tbl_department WHERE id='$get_id' " )or die (mysqli_error()); 
		                    $row=mysqli_fetch_array($selectDept);
							$id=$row['id'];
							$name=$row['name'];
		  ?>
            <form method="POST" action="edit-department-exec.php" >
		  <div class="form-group">
		  <div class="form-row">
		    <div class="col-lg-12">
            <label for="exampleInputPassword1">Name</label>
			<input name="id" class="form-control" id="exampleInputPassword1" type="hidden" value="<?php echo $id; ?>" required>
            <input name="name" class="form-control" id="exampleInputPassword1" type="text" value="<?php echo $name; ?>" required>
          </div>
		  </div>
		  </div>
		  
          <div class="modal-footer">
            <a href="index.php" class="btn btn-secondary" type="button" >Cancel</a>
            <button name="edit" type="submit" class="btn btn-primary" >EDIT</button>
          </div>
		  </form>  
            </table>
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
