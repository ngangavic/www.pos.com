<?php
$year=$_POST['year'];
$month=$_POST['month'];
$day=$_POST['day'];
$Eday="";$Emonth="";$Eyear="";

if($day==$Eday){
	'<script>alert("day cannot be empty");window.location="index.php";</script>';
}elseif($month==$Emonth){	
	'<script>alert("month cannot be empty");window.location="index.php";</script>';
}elseif($year==$Eyear){
    '<script>alert("year cannot be empty");window.location="index.php";</script>';
}elseif($day==$Eday&&$month==$Emonth){
    '<script>alert("day and month cannot be empty");window.location="index.php";</script>';
}elseif($day==$Eday&&$year==$Eyear){
    '<script>alert("day and year cannot be empty");window.location="index.php";</script>';
}elseif($month==$Emonth&&$year==$Eyear){	
    '<script>alert("month and year  cannot be empty");window.location="index.php";</script>';
}elseif($day==$Eday&&$month==$Emonth&&$year==$Eyear){
	'<script>alert("day, month and year cannot be empty");window.location="index.php";</script>';
}else{
include"../includes/connection.php";
//business details
$details=mysqli_query($link,"SELECT * FROM tbl_details WHERE id='1'")or die(mysqli_error());
$row=mysqli_fetch_array($details);
$name=$row['name'];
$address=$row['address'];
$code=$row['code'];
$city=$row['city'];
$phone=$row['phone'];

//cancelation totals
$total=mysqli_query($link,"SELECT sum(salesValue) FROM tbl_cancel WHERE day='$day' AND month='$month' AND year='$year' ")or die(mysqli_error());
while($row=mysqli_fetch_array($total)){
	$tt=$row['sum(salesValue)'];	
}
//cancelation discount total
$totalDis=mysqli_query($link,"SELECT sum(discount) FROM tbl_cancel WHERE day='$day' AND month='$month' AND year='$year' ")or die(mysqli_error());
while($row=mysqli_fetch_array($total)){
	$discount=$row['sum(discount)'];	
}
//number of products cancelled
$totalProds=mysqli_query($link,"SELECT * FROM tbl_cancel WHERE day='$day' AND month='$month' AND year='$year' ")or die(mysqli_error());
$numProducts=mysqli_num_rows($totalProds);
//total quantity
$totalQuant=mysqli_query($link,"SELECT sum(quantity) FROM tbl_cancel WHERE day='$day' AND month='$month' AND year='$year' ")or die(mysqli_error());
while($row=mysqli_fetch_array($totalQuant)){
	$quant=$row['sum(quantity)'];	
}

require"../pdf/fpdf.php";

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('times',"B",14);
$pdf->Cell(0,0,$name,0,0,'C');
$pdf->Ln(8);
$pdf->Cell(0,0,'P.O BOX: '.$address.'-'.$code.','.$city,0,0,'C');
$pdf->Ln(8);
$pdf->Cell(0,0,'PHONE: '.$phone,0,0,'C');
$pdf->Ln(8);
$pdf->Cell(0,0,'CANCELLED SALES REPORT',0,0,'C');
$pdf->Ln(8);
$pdf->SetFont('times',"BU",10);
$pdf->Cell(5,8,'', 0);
$pdf->Cell(30,8,'Product#',0);
$pdf->Cell(30,8,'Name',0);
$pdf->Cell(15,8,'Trans#',0);
$pdf->Cell(17,8,'Quantity',0);
$pdf->Cell(15,8,'Cost',0);
$pdf->Cell(15,8,'Total',0);
$pdf->Cell(30,8,'Discount',0);
$pdf->Cell(19,8,'Time',0);
$pdf->Cell(15,8,'EmpId',0);
$pdf->Ln(8);
$det=mysqli_query($link,"SELECT * FROM tbl_cancel WHERE year='$year' AND month='$month' AND day='$day' ")or die(mysqli_error());
while($row=mysqli_fetch_array($det)){
	$productCode=$row['productCode'];
	$description=$row['description'];
	$transNo=$row['transactionNo'];
	$quantity=$row['quantity'];
	$cost=$row['cost'];
	$salesValue=$row['salesValue'];
	$discount=$row['discount'];
	$time=$row['time'];
	$employeee=$row['employeeId'];
	
$pdf->SetFont('times','',10);
$pdf->Cell(5,8,'', 0);
$pdf->Cell(30,8,$productCode,0);
$pdf->Cell(30,8,$description,0);
$pdf->Cell(20,8,$transNo,0);
$pdf->Cell(15,8,$quantity,0);
$pdf->Cell(15,8,$cost,0);
$pdf->Cell(15,8,$salesValue,0);
$pdf->Cell(15,8,$discount,0);
$pdf->Cell(35,8,$time,0);
$pdf->Cell(15,8,$employeee,0);
$pdf->Ln(8);

//$tt=$salesValue+$salesValue;
}
$pdf->Ln(8);
$pdf->SetFont('times','B',10);
$pdf->Cell(15,8,'Total Sales Cost: '.$tt,0);$pdf->Ln(8);
$pdf->Cell(15,8,'Total Discount: '.$discount,0);$pdf->Ln(8);
$pdf->Cell(15,8,'Total Products: '.$numProducts,0);$pdf->Ln(8);
$pdf->Cell(15,8,'Total Quantity: '.$quant,0);$pdf->Ln(8);
$pdf->Output();
}
?>