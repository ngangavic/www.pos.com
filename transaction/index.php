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
  <?php include "../includes/header-scripts.php";?>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php include "../navigation.php";?>
  
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Transactions</li>
      </ol>
      <!-- Icon Cards-->
     
      <!-- Area Chart Example-->
      
     
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Transaction
		
		</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
				  <th>Transaction #</th>
				  <th>Date</th>
				  <th>Time</th>
                  <th>Total</th>
                  <th>Prod sales</th>
                  <th>Tax</th>
                  <th>Payment type</th>
                  <th>Emp name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Transaction #</th>
				  <th>Date</th>
				  <th>Time</th>
                  <th>Total</th>
                  <th>Prod sales</th>
                  <th>Tax</th>
                  <th>Payment type</th>
                  <th>Emp name</th>
                  <th>Action</th>
                </tr>
              </tfoot>
<?php
$selectTrans=mysqli_query($link,"SELECT * FROM tbl_transaction ORDER BY transactionNo DESC ")or die (mysqli_error());
while($row=mysqli_fetch_array($selectTrans)){
?>			  
              <tbody>
                <tr>
                  <td><?php echo $row['transactionNo']; ?></td>
                  <td><?php echo $row['year']; ?>/<?php echo $row['month'];?>/<?php echo $row['day'];?></td>
                  <td><?php echo $row['time']; ?></td>
                  <td><?php echo $row['total']; ?></td>
                  <td><?php echo $row['productSales']; ?></td>
                  <td><?php echo $row['tax']; ?></td>
				  <td><?php echo $row['paymentType']; ?></td>
                  <td><?php echo $row['customerCode']; ?></td>
                  <td>
				  <div class="btn-group">
				  <!--<a data-toggle="modal" data-target="#editModal" href="edit-product.php" class="btn btn-success">Return</a>-->
				  <!--<button class="btn btn-danger">Delete</button>-->
				  <a  href="return.php?transaction=<?php echo $row['transactionNo'];?>" class="btn btn-success">Return</a>
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
    <?php include "../includes/footer.php"; ?>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <?php include "../logout-modal.php";?>
    <?php include "../includes/footer-scripts.php"?>
  </div>
</body>

</html>
