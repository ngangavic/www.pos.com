<?php 
	session_start();
		$name='';$emp='';
	if(($_SESSION['name']==$name)&&($SESSION['employeeId']==$emp))
	{
		header('location:../index.php');
		exit;
	}
	

?>
<?php include"../includes/connection.php";?>
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
        <li class="breadcrumb-item active">Reports</li>
      </ol>
      <!-- Icon Cards-->
      
      <!-- Area Chart Example-->
      
      <?php //include"add-product.php";?>
	  <?php //include"edit-product.php";?>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Reports
		<!--<a data-toggle="modal" data-target="#addModal" class="btn btn-primary">Add Product</a>-->  
		</div>
        <div class="card-body">
          <div class="table-responsive">
		    
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			 <div class="card-header">
			 SALES REPORT
			 <div class="form-group ">
            <form action="sales-report.php" method="post">
             <?php $day=date('d'); ?>
             <input type="hidden" name="day" value="<?php echo $day; ?>">
             <input type="hidden" name="month" value="0">
             <input type="hidden" name="year" value="0">
             <button value="today" type="submit" class="btn btn-primary">TODAY</button>
             </form>
             </br>
			 </div>
			  
			  <?php include"calendar.php";?>
			  
			 </div>
          <div class="dropdown-divider"></div>
           
           <div class="card-header">
			 PROFIT REPORT
			 <div class="form-group ">
            <form action="profit-report.php" method="post">
             <?php $day=date('d'); ?>
             <input type="hidden" name="day" value="<?php echo $day; ?>">
             <input type="hidden" name="month" value="0">
             <input type="hidden" name="year" value="0">
             <button value="today" type="submit" class="btn btn-primary">TODAY</button>
             </form>
             </br>
			 </div>
			  
			  <?php include"calender-profit.php";?>
			  
			 </div>
			 <div class="dropdown-divider"></div>
           
           <div class="card-header">
			 CANCELLED SALES
			 <div class="form-group ">
            <form action="cancelled-sales.php" method="post">
             <?php $day=date('d'); ?>
             <input type="hidden" name="day" value="<?php echo $day; ?>">
             <input type="hidden" name="month" value="0">
             <input type="hidden" name="year" value="0">
             <button value="today" type="submit" class="btn btn-primary">TODAY</button>
             </form>
             </br>
			 </div>
			  
			  <?php include"calender-cancel.php";?>
			  
			 </div>
			 <div class="dropdown-divider"></div>
           
           <div class="card-header">
			 SALES PER USER
			 <div class="form-group ">
			 <div class="form-row">
            
             </br>
			 </div>
			 </div>
			  
			  <?php include"calender-sales.php";?>
			  
			 </div>
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
