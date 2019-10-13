<?php 
	session_start();
if (!isset($_SESSION['name'])&&!isset($_SESSION['employeeId'])&&!isset($_SESSION['category']))
	{
		header('location:../index.php');
		exit;
	}
	

?>
<?php $get_trans=$_GET['transaction'];?>
<?php include("../includes/connection.php");?>
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
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      
      <!-- Area Chart Example-->
  
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Return Transaction No <?php echo $get_trans;?>
		
		</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
				  <th>Product  #</th>
				  <th>Description</th>
				  <th>Quantity</th>
				  <th>Price</th>
				  <th>Total</th>
				  <th>Discount</th>
				  <th>Date</th>
				  <th>Time</th>
                  <th>Cus #</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Product#</th>
				  <th>Description</th>
				  <th>Quantity</th>
				  <th>Price</th>
				  <th>Total</th>
				  <th>Discount</th>
				  <th>Date</th>
				  <th>Time</th>
                  <th>Cus#</th>
                  <th>Action</th>
                </tr>
              </tfoot>
<?php
$selectProd=mysqli_query($link,"SELECT * FROM tbl_product_his WHERE transactionNo='$get_trans' ")or die (mysqli_error());
while($row=mysqli_fetch_array($selectProd)){
?>			  
              <tbody>
                <tr>
                  <td><?php echo $row['productCode']; ?></td>
                  <td><?php echo $row['description']; ?></td>
                  <td><?php echo $row['quantity']; ?></td>
                  <td><?php echo $row['cost']; ?></td>
                  <td><?php echo $row['salesValue']; ?></td>
                  <td><?php echo $row['discount']; ?></td>
				  <td><?php echo $row['transactionDate']; ?></td>
                  <td><?php echo $row['transactionTime']; ?></td>
                  <td><?php echo $row['customerCode']; ?></td>
                  <td>
				  
				  <!--<a data-toggle="modal" data-target="#editModal" href="edit-product.php" class="btn btn-success">Return</a>-->
				  
				  <form action="action.php" method="post">
				  <input name="transactionNo" type="hidden" class="form-control" value="<?php echo $row['transactionNo'];?>" >
				  	<input name="productCode" type="hidden" class="form-control" value="<?php echo $row['productCode'];?>" >
				  	<input name="description" type="hidden" class="form-control" value="<?php echo $row['description']; ?>" >
				  	<input name="quantity" type="hidden" class="form-control" value="<?php echo $row['quantity']; ?>" >
				  	<input name="cost" type="hidden" class="form-control" value="<?php echo $row['cost']; ?>" >
				  	<input name="salesValue" type="hidden" class="form-control" value="<?php echo $row['salesValue']; ?>" >
				  	<input name="discount" type="hidden" class="form-control" value="<?php echo $row['discount']; ?>" >
				  	<input name="customerCode" type="hidden" class="form-control" value="<?php echo $row['customerCode']; ?>" >
				  	<div class="btn-group">
				  	<a href="index.php" class="btn btn-warning">Back</a>
				  	<button name="return" class="btn btn-success">Return</button>
				  	 </div>
				  	
				  </form>
				  <!--<a href="action.php?delete=<?php //echo $row['productCode'];?>" class="btn btn-success">Return</a>-->
				  <!--<button class="btn btn-danger">Delete</button>-->
				 
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

