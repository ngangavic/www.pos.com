<?php
include '../includes/connection.php'; 
session_start();
if (!isset($_SESSION['name'])&&!isset($_SESSION['employeeId'])&&!isset($_SESSION['category']))
	{
		header('location:../index.php');
		exit;
    }
    
$amount=$_POST['amount'];	
$x='';
//echo $amount;


$trans=mysqli_query($link,"SELECT * FROM tbl_product_his ")or die(mysqli_error());
$count=mysqli_num_rows($trans);
while($res=mysqli_fetch_array($trans)){
$cal = $res['transactionNo'];
}
if($count<=0){
	$transactionNo=1000;
}else{
$transactionNo=$cal+1;
}

//render the cart for the user to view
$cartOutput="";
$cartTotal=0;
$discount = 0;
$x='';
$customer ='';
$pp_checkout_btn="";
if(!isset($_SESSION["pos"])|| count($_SESSION["pos"])<1){
	$cartOutput="<h2 align='center'>Your shopping cart is empty</h2>";
	}else{
		//start paypal checkout button
		$pp_checkout_btn .='<form action="" method="post">';
		
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
				$taxcode = $row["taxcode"];	
                $Bprice = $row['buyingPrice'];				
				}
			$discGet=mysqli_query($link,"SELECT * FROM tbl_discount WHERE product='$product_name'")	or die(mysqli_error());
				$row=mysqli_fetch_array($discGet);
				$prodDisc=$row['percentage'];
				
			$d=(100-$prodDisc)/100;	
			$pricetotals=$price*$each_item['quantity'];
			$pricetotal = $price*$each_item['quantity']*$d;
			$cartTotal = $pricetotal+$cartTotal;
			$discount = number_format(($pricetotals-$pricetotal)+$discount,0);
			
			//$cost=$pricetotal+$cartTotal;
			//$cost1=($pricetotal+$cartTotal)-$pricetotal;
			$bal = number_format($amount-$cartTotal,0);
			$cb=$bal;
			$ct=$cartTotal;
			//dynamic checkout button assembly
			$x = $i + 1;
			$pp_checkout_btn .='
								<input type="hidden" name="rm" value="2">
								<input type="hidden" name="item_name_'.$x.'" value="'.$product_name.'">
								<input type="hidden" name="amount_'.$x.'" value="'.$price.'">
								<input type="hidden" name="quantity_'.$x.'" value="'.$each_item['quantity'].'">';
								
			//Dynamic table row assembly
			//$customer = 
			$cartOutput .="<tr>";
			$cartOutput .='<td>'.$product_name.'<br/></td>';
			$cartOutput .='<td>' . $product_id . '</td>';
			//$cartOutput .='<td>'.$details.'</td>';
			$cartOutput .='<td>KES '.$price.'</td>';
			$cartOutput .='<td>'.$each_item['quantity'].'</td>';
			$cartOutput .='<td>KES '.number_format($pricetotal,0).'</td>';
			$cartOutput .='</tr>';
			$i++;
			}
			//$cartBal="<div align='right'>Balance:KES ".$bal." /=</div>";
	        $cartBal=$bal;
	
			//$cb=$bal;
			//$cartTotal ="<div align='right'> Cart Total: KES ".$cartTotal." /= </div>";
			//$ct=$cartTotal;
			//Finish the paypal checkout button
			// $pp_checkout_btn .=' 
			// 	<input type="submit" value="Place an Order Instead" name="submit">
			// 	<a href="mpesa.php"><img src="pics/mpesa.jpg" width="100" height="50"></a>
	    	// 	<a href="airtel.php"><img src="pics/airtel.jpg" width="100" height="50"></a>
	 		// 	<a href="equitel.php"><img src="pics/equitel.jpg" width="100" height="50"></a>
				
			// </form>';
		}




//Submit shopping cart
foreach($_SESSION["pos"] as $each_item){
	
	if(isset($_POST['item_name_'.$x.''])){
	    $id = $each_item['item_id'];
		$quantity = $each_item['quantity'];
		//$transaction_id=
		//$transaction_id = $_SESSION['TRN'];
		//$manager = $_SESSION["manager"];
		
		
		$run = mysqli_query($link,"SELECT * FROM tbl_products WHERE productCode ='$id'");
		//$run = mysqli_query($sql) or die(mysqli_error());
		$results = mysqli_fetch_assoc($run);
		$rows = mysqli_num_rows($run);
		
		if($rows > 0){
			$product_id = $results['productCode'] ;
			$product_name = $results['description'] ;
			$taxcode = $results['taxcode'];
			$price = $results['sellingPrice'];
			$Bprice = $results['buyingPrice'];
			$discGet=mysqli_query($link,"SELECT * FROM tbl_discount WHERE product='$product_name'")	or die(mysqli_error());
				$row=mysqli_fetch_array($discGet);
				$prodDisc=$row['percentage'];
				
			$d=(100-$prodDisc)/100;
			$cost = number_format($price*$d,0); 
 			
			$pricetotals=$price*$each_item['quantity'];
			$pricetotal = $price*$each_item['quantity']*$d;
			$prodtotal = number_format($pricetotal,0);
            $discount = number_format(($pricetotals-$pricetotal)+$discount,0);
            
		}
            //$cal = $row['transactionNo'];		
		
			//Submit the shopping cart
			$date=date('y-m-d');
			//$time=time('h:i:sa');
			$month=date('m');
            $day=date('d');
			//$transactionNo=$cal+3;
			$employeeId=$_SESSION['employeeId'];
            $customerCode='1';
            
            echo $product_id.$product_name.$taxcode.
            $transactionNo.$quantity.$cost.$prodtotal.$amount.$bal.$discount.
            $employeeId.$customerCode.$month.$day.$Bprice;
			//$sql = mysqli_query($link,"INSERT INTO tbl_product_his(productCode, description,transactionNo, quantity, salesValue, transactionDate, transactionTime, employeeId, customerCode) VALUES('$product_id', '$product_name', '1','$quantity', '$pricetotal', $date,now(),'1','1'") or die (mysqli_error());
			//$sql=mysqli_query($link,"INSERT INTO tbl_products_his(productCode,description,taxcode,transactionNo,quantity,cost,salesValue,paid,bal,discount,employeeId,customerCode,buyingPrice)VALUES('$product_id','$product_name','$taxcode','$transactionNo','$quantity','$cost','$prodtotal','$amount','$bal',$discount,'$employeeId','$customerCode',,'$Bprice')")or die(mysqli_error($link));
			$stmt=$link->prepare("INSERT INTO tbl_product_his
            (productCode,description,taxcode,transactionNo,quantity,
            cost,salesValue,paid,bal,discount,employeeId,customerCode,
            month,day,buyingPrice)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("sssssssssssssss",$product_id,$product_name,$taxcode,
            $transactionNo,$quantity,$cost,$prodtotal,$amount,$bal,$discount,
            $employeeId,$customerCode,$month,$day,$Bprice);
			$stmt->execute()or die(mysqli_error($link));
				
			//$del=mysqli_query($link,"UPDATE tbl_products SET quantity=''")or die(mysqli_error);
			$sql1 = mysqli_query($link,"UPDATE tbl_products SET quantity=quantity-'$quantity' WHERE productCode='$product_id' ") or die (mysqli_error());
						
	}
}
?>
<table class="table table-bordered"  width="100%" cellspacing="0">
              <thead>
                <tr>
				  <th>Product Code</th>
				  <th>Description</th>
				  <th>Price</th>
				  <th>Quantity</th>
				  <th>Unit price</th>
                  
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Product Code</th>
				  <th>Description</th>
				  <th>Price</th>
				  <th>Quantity</th>
				  <th>Unit price</th>
                  
                </tr>
              </tfoot>
			  
              <tbody>
                <tr>
				  <?php echo $cartOutput; ?>
                </tr>
                
              </tbody>		  
            </table>
