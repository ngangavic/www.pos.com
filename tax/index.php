<?php 
	session_start();
if (!isset($_SESSION['name'])&&!isset($_SESSION['employeeId'])&&!isset($_SESSION['category']))
	{
		header('location:../index.php');
		exit;
	}
	

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
        <li class="breadcrumb-item active">Tax</li>
      </ol>
      <!-- Icon Cards-->
      
      <!-- Area Chart Example-->
      
      <?php include"add-tax.php";?>
	  <?php //include"edit-product.php";?>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tax
		<a data-toggle="modal" data-target="#addModal" class="btn btn-primary">Add Tax</a>  
		</div>
        <div class="card-body">
          <div class="table-responsive">
		    <form>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
				  <th>Name</th>
                  <th>Taxcode</th>
                  <th>Percentage</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Taxcode</th>
                  <th>Percentage</th>
                  <th>Action</th>
                </tr>
              </tfoot>
			  <?php 
			  $selectProducts=mysqli_query($link,"SELECT * FROM tbl_taxcode  ")or die (mysqli_error());
			  while($row=mysqli_fetch_array($selectProducts)){
			  
			  ?>
			  
              <tbody>
                <tr>
                  <td><?php echo $row['name'];?></td>
                  <td><?php echo $row['taxCode'];?></td>
                  <td><?php echo $row['percentage'];?>%</td>
                  <td>
				  <div class="btn-group">
				  <a href="edit-tax.php?id=<?php echo $row['id'];?>" class="btn btn-primary" data-toggle="tooltip" title="Edit tax" ><i class="fa fa-fw fa-edit"></i></a>
				  <a href="action.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete tax"><i class="fa fa-fw fa-trash"></i></a>
				  </div>
				  </td>
                </tr>
              </tbody>
			  <?php } ?>
            </table>
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
