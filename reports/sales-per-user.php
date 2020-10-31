<?php
include"../includes/connection.php";
// post details
$userId=$_POST['userId'];
$eu="";
$eu2=0;
$day=$_POST['day'];
$month=$_POST['month'];
$year=$_POST['year'];
if($userId==$eu2){
?>
<script>
window.location="index.php";
alert("YOU MUST SELECT A USER");
</script>
<?php
}
else
{
//user select query
$userSelect=mysqli_query($link,"SELECT * FROM tbl_employees WHERE empId='$userId' ")or die(mysqli_error());
while($row=mysqli_fetch_array($userSelect)){
	$Uname=$row['name'];
}
//business details
$details=mysqli_query($link,"SELECT * FROM tbl_details WHERE id='1'")or die(mysqli_error());
$row=mysqli_fetch_array($details);
$name=$row['name'];
$address=$row['address'];
$code=$row['code'];
$city=$row['city'];
$phone=$row['phone']; 
/********************** TRANSACTIONS ***********************/
//total transactions year
$totalTrans=mysqli_query($link,"SELECT * FROM tbl_product_his WHERE year='$year' AND employeeId='$userId' ")or die(mysqli_error());
$countYearTrans=mysqli_num_rows($totalTrans);
//total transactions monthly
$totalTrans=mysqli_query($link,"SELECT * FROM tbl_product_his WHERE month='$month' AND employeeId='$userId' ")or die(mysqli_error());
$countMonthTrans=mysqli_num_rows($totalTrans);
//total transactions daily
$totalTrans=mysqli_query($link,"SELECT * FROM tbl_product_his WHERE day='$day' AND employeeId='$userId' ")or die(mysqli_error());
$countDayTrans=mysqli_num_rows($totalTrans);
$TransTotal=$countYearTrans+$countMonthTrans+$countDayTrans;

/************************* QUANTITY **************************/
//total quantity per year
$totalQuantity=mysqli_query($link,"SELECT sum(quantity) FROM tbl_product_his WHERE year='$year' AND employeeId='$userId' ")or die(mysqli_error());
while($row=mysqli_fetch_array($totalQuantity)){$yearQuantity=$row['sum(quantity)'];}
//total quantity per month
$totalQuantity=mysqli_query($link,"SELECT sum(quantity) FROM tbl_product_his WHERE month='$month' AND employeeId='$userId' ")or die(mysqli_error());
while($row=mysqli_fetch_array($totalQuantity)){$monthQuantity=$row['sum(quantity)'];}
//total quantity per day
$totalQuantity=mysqli_query($link,"SELECT sum(quantity) FROM tbl_product_his WHERE day='$day' AND employeeId='$userId' ")or die(mysqli_error());
while($row=mysqli_fetch_array($totalQuantity)){$dayQuantity=$row['sum(quantity)'];}
$QuantityTotal=$yearQuantity+$monthQuantity+$dayQuantity;
/*********************** SALES VALUE ***********************/
//total sales per year
$totalQuantity=mysqli_query($link,"SELECT sum(salesValue) FROM tbl_product_his WHERE year='$year' AND employeeId='$userId' ")or die(mysqli_error());
while($row=mysqli_fetch_array($totalQuantity)){$yearSales=$row['sum(salesValue)'];}
//total sales per month
$totalQuantity=mysqli_query($link,"SELECT sum(salesValue) FROM tbl_product_his WHERE month='$month' AND employeeId='$userId' ")or die(mysqli_error());
while($row=mysqli_fetch_array($totalQuantity)){$monthSales=$row['sum(salesValue)'];}
//total sales per day
$totalQuantity=mysqli_query($link,"SELECT sum(salesValue) FROM tbl_product_his WHERE day='$day' AND employeeId='$userId' ")or die(mysqli_error());
while($row=mysqli_fetch_array($totalQuantity)){$daySales=$row['sum(salesValue)'];}
$SalesTotal=$yearSales+$monthSales+$daySales;

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
$pdf->Cell(0,0,'SALES PER USER REPORT',0,0,'C');
$pdf->Ln(8);
$pdf->SetFont('times',"BU",10);
$pdf->Cell(5,8,'', 0);
$pdf->Cell(30,8,'USER DETAILS:',0);
$pdf->SetFont('times',"",10);
$pdf->Cell(50,8,$userId."".$Uname,0);
$pdf->SetFont('times',"BU",10);
$pdf->Cell(15,8,'DATE:',0);
$pdf->SetFont('times',"",10);
$pdf->Cell(19,8,$year.'/'.$month.'/'.$day,0);
$pdf->Ln(8);
$pdf->SetFont('times',"BU",10);
$pdf->Cell(30,8,'TRANSACTIONS',0);
$pdf->Cell(40,8,'PRODUCT QUANTITY',0);
$pdf->Cell(17,8,'TOTAL SALES',0);
$pdf->Ln(8);
$pdf->SetFont('times','',15);
$pdf->Cell(10,8,'', 0);
$pdf->Cell(40,8,$TransTotal,0);
$pdf->Cell(30,8,$QuantityTotal,0);
$pdf->Cell(20,8,$SalesTotal,0);
$pdf->Ln(8);
$pdf->Output();
}
?>