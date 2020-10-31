<?php 
	session_start();
		$name='';$emp='';
	if(($_SESSION['name']==$name)&&($SESSION['employeeId']==$emp))
	{
		header('location:../index.php');
		exit;
	}
	

?>
<?php
include('../barcode/src/BarcodeGenerator.php');
include('../barcode/src/BarcodeGeneratorPNG.php');
include('../barcode/src/BarcodeGeneratorSVG.php');
include('../barcode/src/BarcodeGeneratorJPG.php');
include('../barcode/src/BarcodeGeneratorHTML.php');
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
        <li class="breadcrumb-item active">Stickers</li>
      </ol>
      <!-- Icon Cards-->
     
      <!-- Area Chart Example-->
      
     
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Product Stickers
		
		</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
				  <th>Product Code</th>
				  <th>Description</th>
				  <th>BarCode</th>
                  <th>Quantity</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Product Code</th>
				  <th>Description</th>
				  <th>BarCode</th>
                  <th>Quantity</th>
                  <th>Action</th>
                </tr>
              </tfoot>
<?php
$selectProd=mysqli_query($link,"SELECT * FROM tbl_products WHERE quantity>0 ")or die (mysqli_error());
while($row=mysqli_fetch_array($selectProd)){
	//$code=$row['productCode'];
?>			  
              <tbody>
                <tr>
                  <td><?php echo $row['productCode']; ?></td>
                  <td><?php echo $row['description']; ?></td>
				  <td>
				  <?php $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
				  echo $generator->getBarcode($row['productCode'],$generator::TYPE_CODE_128_A);

				  ?></td>
                  <td><?php echo $row['quantity']; ?></td>
                  <td>
				  <div class="btn-group">
				  <!--<a data-toggle="modal" data-target="#editModal" href="edit-product.php" class="btn btn-success">Return</a>-->
				  <!--<button class="btn btn-danger">Delete</button>-->
				  <a  href="print-stickers.php?code=<?php echo $row['productCode'];?>" class="btn btn-success">Print</a>
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
