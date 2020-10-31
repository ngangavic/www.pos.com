<?php 
session_start();
		$name='';$emp='';
		$empid=$_SESSION['employeeId'];
	if(($_SESSION['name']==$name)&&($_SESSION['employeeId']==$emp))
	{
		header('location:../index.php');
		exit;
	}

?>
<?php 
$get_id=$_GET['id'];
$get_cash=$_GET['cash'];
$get_bal=$_GET['balance'];
$get_total=$_GET['total'];
$get_txcode=$_GET['txcode'];
$get_dis=$_GET['discount'];
//Database connection
include '../includes/connection.php';

?>
<?php
$exempt=mysqli_query($link,"SELECT sum(salesValue) FROM tbl_product_his WHERE taxcode='B' AND transactionNo='$get_id' ")or die(mysqli_error());
while($row=mysqli_fetch_array($exempt)){
$txexempt=$row['sum(salesValue)'];

}

?>

<?php
//vat calculations
$getCode=mysqli_query($link,"SELECT * FROM tbl_taxcode WHERE taxCode='A' ")or die(mysqli_error());
$row=mysqli_fetch_array($getCode);
$percent=$row['percentage'];
$taxCode=$row['taxCode'];

$vatTotal=$get_total-$txexempt;
$cal1=100-$percent;
$vatable=($cal1/100)*$vatTotal;
$vat=$vatTotal-$vatable;

?>

<?php
//tax exempt calculations
$getCode=mysqli_query($link,"SELECT * FROM tbl_taxcode WHERE taxCode='B' ")or die(mysqli_error());
$row=mysqli_fetch_array($getCode);
$percentB=$row['percentage'];
$taxCodeB=$row['taxCode'];
$vatB=0;

?>

<?php
$getDet=mysqli_query($link,"SELECT * FROM tbl_product_his WHERE transactionNo='$get_id' ")or die(mysqli_error());
$row=mysqli_fetch_array($getDet);
$productCode=$row['productCode'];
$description=$row['description'];
$transactionNo=$row['transactionNo'];
$quantity=$row['quantity'];
$cost=$row['cost'];
$salesValue=$row['salesValue'];
$paid=$row['paid'];
$balanace=$row['bal'];
$date=$row['transactionDate'];
$time=$row['transactionTime'];

?>
<?php
//count items
$getDet=mysqli_query($link,"SELECT quantity FROM tbl_product_his WHERE transactionNo='$get_id' ")or die(mysqli_error());
$qt=mysqli_num_rows($getDet);
?>

<?php 
$getHead=mysqli_query($link,"SELECT * FROM tbl_details WHERE id='1'")or die(mysqli_error());
$row=mysqli_fetch_array($getHead);
          $name=$row['name'];
		  $address=$row['address'];
		  $code=$row['code'];
		  $city=$row['city'];
		  $phone=$row['phone'];
		  $footer=$row['footer'];
?>

<?php
$month=date('m');
$day=date('d');
$method='cash';
$customer='1';
//$insert=mysqli_query($link,"INSERT INTO tbl_transaction(transactionNo,year,month,day,time,total,productSales,taxExempt,tax,discount,paymentType,customerCode,employeeId)VALUES('$get_id',now(),'$month','$day',now(),'$get_total','$vatTotal','$txexempt','$vat','$get_dis','cash','1','$empid')")or die (mysqli_error());
$stmt=$link->prepare("INSERT INTO `tbl_transaction`( `transactionNo`,`month`,`day`, `total`, `productSales`, `taxExempt`, `tax`, `discount`, `paymentType`, `customerCode`, `employeeId`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("sssssssssss",$transactionNo,$month,$day,$get_total,$vatTotal,$txexempt,$vat,$get_dis,$method,$customer,$empid);
$stmt->execute()or die(mysqli_error($link));
?>

<!-- 
<html>
<head>

<title>Receipt <?php //echo $get_id; ?></title>
</head>
<body onload="myFunction()" style="font-size:7px;">
<div class="title" style="text-align:center;">
<p><?php // echo $name; ?></br>
P.O BOX <?php //echo $address?>-<?php //echo $code;?> <?php //echo $city; ?></br>
TEL: <?php //echo $phone; ?></p>
</div>
Date time: <?php //echo $date; ?> <?php //echo $time; ?></br>
Receipt No:<?php //echo $get_id; ?> -->

<?php
require "../pdf/fpdf.php";

$pdf = new FPDF('P','mm',array(80,1000));
$pdf->AddPage();
$pdf->SetFont('times',"B",12);
$pdf->Cell(0,0,$name,0,0,'C');
$pdf->Ln(8);
$pdf->Cell(0,0,'P.O BOX: '.$address.'-'.$code.','.$city,0,0,'C');
$pdf->Ln(8);
$pdf->Cell(0,0,'PHONE: '.$phone,0,0,'C');
$pdf->Ln(8);
$pdf->Cell(0,0,'Sales Receipt',0,0,'C');
$pdf->Ln(8);
$pdf->SetFont('times',"BU",10);
$pdf->Cell(55,8,'Date time:'.$date, 0);
$pdf->Cell(55,8,'Receipt No'.$get_id, 0);
$pdf->Line(20,45,210-20,45);
$pdf->SetFont('times',"B",10);
$pdf->Ln(8);
$pdf->Cell(55,8,'Item',0);
$pdf->Cell(20,8,'Price',0);
$pdf->Cell(23,8,'Amount',0);
$pdf->Ln(8);
$getDet=mysqli_query($link,"SELECT * FROM tbl_product_his WHERE transactionNo='$get_id' ")or die(mysqli_error());
while($row=mysqli_fetch_array($getDet)){
$productCode=$row['productCode'];
$description=$row['description'];
$transactionNo=$row['transactionNo'];
$quantity=$row['quantity'];
$cost=$row['cost'];
$salesValue=$row['salesValue'];
$paid=$row['paid'];
$balanace=$row['bal'];
$date=$row['transactionDate'];
$time=$row['transactionTime'];
$pdf->Cell(55,8,$productCode.' '.$description.' '.$quantity.'X',0);
$pdf->Cell(20,8,$cost,0);
$pdf->Cell(23,8,$salesValue,0);
}
$pdf->Line(20,45,210-20,45);

$pdf->SetFont('times',"",10);
$pdf->Ln(8);
$pdf->Cell(20,8,'DISCOUNT...'.$get_dis,0);
$pdf->Cell(23,8,'TOTAL......'.$get_total,0);
$pdf->Cell(12,8,'CASH.......'.$get_cash,0);
$pdf->Cell(12,8,'BALANCE....'.$get_bal,0);

$pdf->Cell(12,8,'TOTAL ITEMS....'.$qt,0);


$pdf->Output();
?>

<!-- <table style="font-size:7px;">
<tr>
<th>Item</th>
<th>Price</th>
<th>Amount</th>
</tr> -->

<?php
// $getDet=mysqli_query($link,"SELECT * FROM tbl_product_his WHERE transactionNo='$get_id' ")or die(mysqli_error());
// while($row=mysqli_fetch_array($getDet)){
// $productCode=$row['productCode'];
// $description=$row['description'];
// $transactionNo=$row['transactionNo'];
// $quantity=$row['quantity'];
// $cost=$row['cost'];
// $salesValue=$row['salesValue'];
// $paid=$row['paid'];
// $balanace=$row['bal'];
// $date=$row['transactionDate'];
// $time=$row['transactionTime'];

?>
<!-- <tr>
<td><?php //echo $productCode; ?></br><?php //echo $description; ?></td>
 <td><?php //echo $quantity; ?> X <?php //echo $cost; ?></td> 
<td><?php //echo $salesValue; ?> <?php  //echo $get_txcode;?></td>
</tr>
<?php //} ?>
</table>-->
<!-- ____________________________</br>
DISCOUNT-----------------<?php //echo $get_dis; ?></br>
TOTAL-----------------------<?php //echo $get_total; ?></br>
CASH------------------------<?php //echo $get_cash; ?></br>
CHANGE---------------------<?php //echo $get_bal; ?></br>
***************************</br>
TOTAL ITEMS: 2 <?php //echo $qt; ?>
</br>
<table style="font-size:7px;">
<tr>
<th>Code</th>
<th>Rate</th>
<th>Vatable Amt</th>
<th>VAT Amt</th>
</tr>
<tr>
<td><?php //echo $taxCode; ?></td>
<td><?php //echo $percent; ?>.00%</td>
<td><?php //echo $vatable; ?></td>
<td><?php //echo $vat; ?></td>
</tr>
<tr>
<td><?php //echo $taxCodeB; ?></td>
<td><?php //echo $percentB; ?>.00%</td>
<td><?php //echo $txexempt; ?></td>
<td><?php //echo $vatB; ?></td>
</tr>
</table>

You were served by: Blablabla</br>
<?php //echo $footer; ?></br>

<script>
function myFunction(){
window.print();
window.location="../cashier/index.php?cmd=emptycart";
}
</script>
</body>
</html> -->

