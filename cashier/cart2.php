<?php
//Database connection
include '../includes/connection.php'; 
?>
<?php 
session_start();
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
		header("location: cart2.php");
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
$x='';
$customer ='';
$pp_checkout_btn="";
if(!isset($_SESSION["pos"])|| count($_SESSION["pos"])<1){
	$cartOutput="<h2 align='center'>Your shopping cart is empty</h2>";
	}else{
		//start paypal checkout button
		$pp_checkout_btn .='<form action="http://www.paypal.com/cgi-bin/webscr" method="post">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="upload" value="1">
							<input type="hidden" name="business" value="skaveke@gmail.com">	';
							
		//start for each loop
		$i=0;
		foreach($_SESSION["pos"] as $each_item){
			//$i++;
			$item_id=$each_item['item_id'];
			$sql = mysqli_query($link,"SELECT * FROM tbl_products WHERE productCode='$item_id'");
			while($row=mysqli_fetch_array($sql)){
				$product_id = $row["productCode"];
				$product_name = $row["description"];
				$price = $row["sellingPrice"];
				//$details = $row["details"];				
				}
			$pricetotal = $price*$each_item['quantity'];
			//$cartTotal = $pricetotal+$cartTotal;
			$cartTotal = $pricetotal + $cartTotal;
			$cost=$pricetotal+$cartTotal;
			//dynamic checkout button assembly
			$x = $i + 1;
			$pp_checkout_btn .='<input type="hidden" name="item_name_'.$x.'" value="'.$product_name.'">
								<input type="hidden" name="amount_'.$x.'" value="'.$price.'">
								<input type="hidden" name="quantity_'.$x.'" value="'.$each_item['quantity'].'">'; 	
										
			//Dynamic table row assembly
			//$customer = 
			$cartOutput .="<tr>";
			$cartOutput .='<td><a href="product.php?id='.$item_id.'">'.$product_name.'</a><br/><img src="inventory_images/'.$item_id.'.jpg" alt="'.$product_name.'" width="80" height="70" border="1"/></td>';
			$cartOutput .='<td>'.$product_id.'</td>';
			$cartOutput .='<td>'.$product_name.'</td>';
			$cartOutput .='<td>KES '.$price.'</td>';
			$cartOutput .='<td><form action="cart2.php" method="post">
			<input name="quantity" type="text" value="'.$each_item['quantity'].'" size="1" maxlength="2"/>
			<input type="submit" value="change" name="adjustBtn'.$item_id.'" />
			<input type="hidden" name="item_to_adjust" value="'.$item_id.'" />
			</form></td>';
			//$cartOutput .='<td>'.$each_item['quantity'].'</td>';
			$cartOutput .='<td>KES '.$pricetotal.'</td>';
			$cartOutput .='<td><form action="cart2.php" method="post">
			<input type="submit" value="X" name="deleteBtn'.$item_id.'" />
			<input type="hidden" name="index_to_remove" value="'.$i.'" />
			</form></td>';
			$cartOutput .='</tr>';
			$i++;
			}
			$cartTotal ="<div align='right'> Cart Total: KES ".$cartTotal." /= </div>";
			//Finish the paypal checkout button
			$pp_checkout_btn .='
			<input type="hidden" name="notify_url" value="www.ishop.com/storesrcipts/my_ipn.php">
			<input type="hidden" name="return" value="https://www.yoursite.com/checkout_complete.php">
			<input type="hidden" name="rm" value="2">
			<input type="hidden" name="cbt" value="Return to the Store">
			<input type="hidden" name="cancel_return" value="https://www.ishop.com/paypal_cancel.com">
			<input type="hidden" name="lc" value="US">
			<input type="hidden" name="currency_code" value="USD">
			
			<input type="image" src="http://www.paypal.com/en_US/i/btn/x-click-but01.gif" name="submit" alt="Make 
Payments with Paypal - its free and secure">
		
			</form>';
		}
?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Shopping Cart</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link href="sodetso/style/css.css" rel="stylesheet" type="text/css">
</head>
<body>
<!-- Shell -->
<div class="shell">
  <!-- Header -->
  <div id="header">
    <h1 id="logo"><a href="index.php"></a></h1>
    <!-- Cart -->
    <div id="cart"> <a href="cart.php" class="cart-link">Your Shopping Cart</a>
      <div class="cl">&nbsp;</div>
    </div>
    <!-- End Cart -->
    <!-- Navigation -->
    <!--<div id="navigation">
      <ul>
       <li><a href="index.php">Home</a></li>
        <li><a href="products.php">Products</a></li>
		<li><a href="register.php">Register</a></li>
        <li><a href="customer_login.php">Customer Login</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
    </div>-->
    <!-- End Navigation -->
  </div>
  <!-- End Header -->
  <!-- Main -->
  <div id="main">
    <div class="cl">&nbsp;</div>
    <!-- Content -->
    <br/>
<table width="100%" style="font-size:16px">
  <tr bgcolor="#007FFF" height="30">
    <td width="169" style="color:#FFF;">Item Name</td>
    <td width="169" style="color:#FFF;">Product ID</td>
    <td width="180"  style="color:#FFF;">Item Description</td>
    <td width="85"  style="color:#FFF;">Unit Price</td>
    <td width="71"  style="color:#FFF;">Quantity</td>
    <td width="90"  style="color:#FFF;">Total</td>
    <td width="60"  style="color:#FFF;">Remove</td>
  </tr>
 <?php echo $cartOutput; ?>
</table>
<br/>
<a href="cart.php?cmd=emptycart">Click Here to Empty Your Shopping Cart</a>
</div>
<?php echo $cartTotal; ?>
<br/>
<br/>

      <br />
   <table width="400" border="0" cellspacing="2" cellpadding="2" align="right">
     <tr>
       <td> <?php echo $pp_checkout_btn;?></td>
     </tr>
   </table>   
      <a href="user_login.php">Buy with other Payment gateways</a>
   <br/><br/>
   
  
   <!-- End Main -->
    <!-- Footer -->

   <?php //include 'footer.php' ?>

  <!-- End Footer -->
</div>
<!-- End Shell -->
</body>
</html>
