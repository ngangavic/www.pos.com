<?php 
	session_start();
		$name='';$emp='';
	if(($_SESSION['name']==$name)&&($SESSION['employeeId']==$emp))
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
        <li class="breadcrumb-item active">Customer</li>
      </ol>
      <!-- Icon Cards-->
      
      <!-- Area Chart Example-->
      
      <?php include"add-customer.php";?>
	  <?php //include"edit-customer.php";?>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Customers
		<a data-toggle="modal" data-target="#addModal" class="btn btn-primary">Add Customer</a>  
		</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
				  <th>Code</th>
				  <th>Name</th>
                  <th>Address</th>
                  <th>Town</th>
                  <th>County</th>
                  <th>Postal Code</th>
                  <th>Phone</th>
                  <th>Email</th>
				  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Cust Code</th>
				  <th>Name</th>
                  <th>Address</th>
                  <th>Town</th>
                  <th>County</th>
                  <th>PostalCode</th>
                  <th>Phone</th>
                  <th>Email</th>
				  <th>Action</th>
                </tr>
              </tfoot>
<?php 
$selectCustomer=mysqli_query($link,"SELECT * FROM tbl_customer ")or die (mysqli_error());
while($row=mysqli_fetch_array($selectCustomer)){
?>			  		  
              <tbody style="font-size:13px;">
                <tr>
                  <td><?php echo $row['customerCode'];?></td>
                  <td><?php echo $row['name'];?></td>
                  <td><?php echo $row['address'];?></td>
                  <td><?php echo $row['city'];?></td>
                  <td><?php echo $row['state'];?></td>
                  <td><?php echo $row['postalCode'];?></td>
				  <td><?php echo $row['phone'];?></td>
                  <td><?php echo $row['email'];?></td>
                  <td>
				  <div class="btn-group">
				  <a  href="edit-customer.php?id=<?php echo $row['id']; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit customer" ><i class="fa fa-fw fa-edit"></i></a>
				  <?php if($row['active']=='yes'){?>
				  <a href="action.php?deactivate=<?php echo $row['id']?>" class="btn btn-warning" data-toggle="tooltip" title="Deactivate customer" ><i class="fa fa-fw fa-remove"></i></a>
				  <?php }else{ ?>
				  <a href="action.php?activate=<?php echo $row['id']?>" class="btn btn-success" data-toggle="tooltip" title="Activate  customer" ><i class="fa fa-fw fa-check"></i></a>
				  <?php } ?>
				  <a href="action.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete customer"><i class="fa fa-fw fa-trash"></i></a>
				  <a href="action.php?inbox=<?php echo $row['id']; ?>" class="btn btn-info" data-toggle="tooltip" title="Message customer"><i class="fa fa-fw fa-inbox"></i></a>
				  </div>
				  </td>
                </tr>
                
              </tbody>
<?php } ?>			  
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
