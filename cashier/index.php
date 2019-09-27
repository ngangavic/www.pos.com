
<?php 
session_start();
		$name='';$emp='';
	if(($_SESSION['name']==$name)&&($_SESSION['employeeId']==$emp))
	{
		header('location:../index.php');
		exit;
	}
?>
<?php
//Database connection
include '../includes/connection.php'; 
?>
<?php
//session_start(); //start session
?>
<?php 
if(isset($_POST['productCode'])){
	$pid = $_POST['productCode'];
	$wasFound =false;
	$i = 0;
	//if the cart session variable is not set or cart array is empty
	if(!isset($_SESSION["pos"])||count($_SESSION["pos"])<1){
		//Run if the cart is empty or not set
		$_SESSION["pos"]=array(1=>array("item_id"=>$pid, "quantity" =>1));
		}else{
			//Run if the cart has atleast one item in it
			foreach($_SESSION["pos"]as $each_item){
				$i++;
				while(list($key, $value)=each($each_item)){
				if($key=="item_id" && $value==$pid){
					//That item ps in cart already so lets adjust its quantity using array_splice()
					array_splice($_SESSION["pos"], $i-1,1, array(array("item_id"=>$pid, "quantity"=>$each_item['quantity']+1)));
					$wasFound=true;
					}//close if condition
				}//close while loop
			
			}//close foreach loop
			if($wasFound==false){
				array_push($_SESSION["pos"], array("item_id" => $pid, "quantity"=>1));
				}
		}
		header("location: index.php");
		exit();
	}
?>
<?php
//if user chooses to empty their shopping cart
if(isset($_GET['cmd'])&& $_GET['cmd']=="emptycart"){
	unset($_SESSION["pos"]);
	}
?>
<?php
//if user chooses to adjust item quantity 
if(isset($_POST['item_to_adjust'])&& $_POST['item_to_adjust']!=""){
	
	$item_to_adjust=$_POST['item_to_adjust'];	
	$quantity=$_POST['quantity'];	
	$quantity = preg_replace('#[^0-9]#i','',$quantity);//filter everythn but numbers
	if($quantity>=100){
		$quantity = 99;
		
		if($quantity<1){
		$quantity = 1;
		}
		
		}
	$i=0;
	foreach($_SESSION["pos"]as $each_item){
				$i++;
				while(list($key, $value)=each($each_item)){
				if($key=="item_id" && $value==$item_to_adjust){
					//That item ps in cart already so lets adjust its quantity using array_splice()
					array_splice($_SESSION["pos"], $i-1,1, array(array("item_id"=>$item_to_adjust, "quantity"=>$quantity)));
					$wasFound=true;
					}//close if condition
				}//close while loop
			
			}//close foreach loop
	}
?>
<?php
//if user chooses to remove an item from the cart
if(isset($_POST['index_to_remove']) && $_POST['index_to_remove']!=""){
	//access the array and run code to remove that array index
	$key_to_remove = $_POST['index_to_remove'];
		if(count($_SESSION["pos"])<=1){
		unset($_SESSION["pos"]);
		
		}else{
			unset($_SESSION["pos"]["$key_to_remove"]);
			sort($_SESSION["pos"]);
			}
	}
?>
<?php 
//render the cart for the user to view
$cartOutput="";
//$cartTotal="";
$cartTotal=0;
$totalCost = 0;
$discount = 0;
$x='';
$customer ='';
$pp_checkout_btn="";
if(!isset($_SESSION["pos"])|| count($_SESSION["pos"])<1){
	$cartOutput="<h2 align='center'>The shopping cart is empty</h2>";
	}else{
		//start paypal checkout button
		/*$pp_checkout_btn .='<form action="http://www.paypal.com/cgi-bin/webscr" method="post">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="upload" value="1">
							<input type="hidden" name="business" value="skaveke@gmail.com">	';*/
							
		//start for each loop
		$i=0;
		foreach($_SESSION["pos"] as $each_item){
			//$i++;
			$item_id=$each_item['item_id'];
			$sql = mysqli_query($link,"SELECT * FROM tbl_products WHERE productCode='$item_id' AND action='present'");
			$count=mysqli_num_rows($sql);
			if($count > 0){
			$sql = mysqli_query($link,"SELECT * FROM tbl_products WHERE productCode='$item_id' ");
			while($row=mysqli_fetch_array($sql)){
				$product_id = $row["productCode"];
				$product_name = $row["description"];
				$price = $row["sellingPrice"];
				//$details = $row["details"];				
				}
			$discGet=mysqli_query($link,"SELECT * FROM tbl_discount WHERE product='$product_name'")	or die(mysqli_error());
				$row=mysqli_fetch_array($discGet);
				$prodDisc=$row['percentage'];
				
			$d=(100-$prodDisc)/100;	
			$pricetotals=$price*$each_item['quantity'];	
			$pricetotal = $price*$each_item['quantity']*$d;
				$discount = number_format(($pricetotals-$pricetotal)+$discount,0);
				
			//$cartTotal = $pricetotal+$cartTotal;
			$cartTotal = $pricetotal + $cartTotal;
			//$cost=$pricetotal+$cartTotal;
			//$totalCost = $pricetotal + $totalCost;
			//dynamic checkout button assembly
			$x = $i + 1;
			$pp_checkout_btn .='<input type="hidden" name="item_name_'.$x.'" value="'.$product_name.'">
								<input type="hidden" name="amount_'.$x.'" value="'.$price.'">
								<input type="hidden" name="quantity_'.$x.'" value="'.$each_item['quantity'].'">'; 	
										
			//Dynamic table row assembly
			//$customer = 
			$cartOutput .="<tr>";
			$cartOutput .='<td>'.$product_id.'</td>';
			$cartOutput .='<td>'.$product_name.'</td>';
			$cartOutput .='<td>KES '.$price.'</td>';
			$cartOutput .='<td><form action="" method="post">
			<input name="quantity" type="text" value="'.$each_item['quantity'].'" size="1" maxlength="2"/>
			<input class="btn btn-primary" type="submit" value="change" name="adjustBtn'.$item_id.'" />
			<input type="hidden" name="item_to_adjust" value="'.$item_id.'" />
			</form></td>';
			//$cartOutput .='<td>'.$each_item['quantity'].'</td>';
			$cartOutput .='<td>KES '.number_format($pricetotal,0).'</td>';
			$cartOutput .='<td><form action="" method="post">
			<input class="btn btn-danger" type="submit" value="X" name="deleteBtn'.$item_id.'" />
			<input type="hidden" name="index_to_remove" value="'.$i.'" />
			</form></td>';
			$cartOutput .='</tr>';
			$i++;
		        }else{
				
				
				$cartOutput="<h2 align='center'>The Item is locked</h2>";
				header("location: index.php?cmd=emptycart");
				?>
				<script>
				alert("The Item is locked");
				</script>
				<?php
				
			}
			}
			//$cartTotal ="<div align='right'> Cart Total: KES ".$cartTotal." /= </div>";
			//$cartTotal ="<div align='left'> KES ".$cartTotal." /= </div>";
			//Finish the paypal checkout button
// 			$pp_checkout_btn .='
// 			<!--<input type="hidden" name="notify_url" value="www.ishop.com/storesrcipts/my_ipn.php">
// 			<input type="hidden" name="return" value="https://www.yoursite.com/checkout_complete.php">
// 			<input type="hidden" name="rm" value="2">
// 			<input type="hidden" name="cbt" value="Return to the Store">
// 			<input type="hidden" name="cancel_return" value="https://www.ishop.com/paypal_cancel.com">
// 			<input type="hidden" name="lc" value="US">
// 			<input type="hidden" name="currency_code" value="USD">
			
// 			<input type="image" src="http://www.paypal.com/en_US/i/btn/x-click-but01.gif" name="submit" alt="Make 
// Payments with Paypal - its free and secure">-->
		
// 			</form>';
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
        <li class="breadcrumb-item active">Cashier</li>
      </ol>
      <!-- Icon Cards-->
      
	  
      <!-- Area Chart Example-->
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Cashier
		  <?php include"search.php"; ?>
		<button class="btn btn-primary"  data-toggle="modal" data-target="#myModal" >Search</button>
		</div>
		<div class="row">
        <div class="card-body col-lg-8">
          <div class="table-responsive ">
            <table class="table table-bordered"  width="100%" cellspacing="0">
			<form action="" method="POST" >
			<label>Product Code</label>
			<input name="productCode" class="form-control" id="exampleInputPassword1" type="text" placeholder="Product Code" required></br>
			<input name="quantity" class="form-control" id="exampleInputPassword1" type="hidden" value="2" placeholder="Quantity" required></br>
			</form>
              <thead>
                <tr>
				  <th>Product Code</th>
				  <th>Description</th>
				  <th>Price</th>
				  <th>Quantity</th>
				  <th>Unit price</th>
                  <th>Remove</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Product Code</th>
				  <th>Description</th>
				  <th>Price</th>
				  <th>Quantity</th>
				  <th>Unit price</th>
                  <th>Remove</th>
                </tr>
              </tfoot>
              <tbody>
                <tr>
				  <?php echo $cartOutput; ?>
                </tr>
              </tbody>		  
            </table>
          </div>
        </div>
		<div class="card-body col-lg-4">
		<div class="card-header">
          <i class="fa fa-table"></i>Transaction details
		</div>
		<h3>TOTAL</h3> 
		<h4><?php echo number_format($cartTotal,0); ?></h4>
		<h3>PAID</h3> 
		<form action="complete.php" method="POST">
		<input name="amount" class="form-control"  min="<?php echo number_format($cartTotal,0);?>" type="number" placeholder="AMOUNT" required></br>
		<input name="cartTotal" class="form-control"  type="hidden" value="<?php echo number_format($cartTotal,0); ?>" required></br>
		<?php echo $pp_checkout_btn;?>
		</form>
		<h3>DISCOUNT= KES <?php echo $discount;?>/=</h3>
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
<?php include '../quantity/index.php'; getProducts();?>
</html>
<?php //include '../quantity/index.php'; getProducts();?>
