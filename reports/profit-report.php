<?php
//include"../includes/connection.php";

$year=$_POST['year'];
$month=$_POST['month'];
$day=$_POST['day'];
//$day=02;

include"../includes/connection.php";
/**********************************************daily profit*************************************/
$DailysellingPrice=mysqli_query($link,"SELECT sum(cost) FROM tbl_product_his WHERE day='$day'")or die(mysqli_error());
while($row=mysqli_fetch_array($DailysellingPrice)){
	$dailysp=$row['sum(cost)'];	
}
$DailybuyingPrice=mysqli_query($link,"SELECT sum(buyingPrice) FROM tbl_product_his WHERE day='$day'")or die(mysqli_error());
while($row=mysqli_fetch_array($DailybuyingPrice)){
	$dailybp=$row['sum(buyingPrice)'];	
}
$dailyProfit=$dailysp-$dailybp;

/**********************************************monthly profit*************************************/
$MonthsellingPrice=mysqli_query($link,"SELECT sum(cost) FROM tbl_product_his WHERE month='$month'")or die(mysqli_error());
while($row=mysqli_fetch_array($MonthsellingPrice)){
	$monthsp=$row['sum(cost)'];	
}
$MonthbuyingPrice=mysqli_query($link,"SELECT sum(buyingPrice) FROM tbl_product_his WHERE month='$month'")or die(mysqli_error());
while($row=mysqli_fetch_array($MonthbuyingPrice)){
	$monthbp=$row['sum(buyingPrice)'];	
}
$monthlyProfit=$monthsp-$monthbp;

/**********************************************yearly profit*************************************/
$YearlysellingPrice=mysqli_query($link,"SELECT sum(cost) FROM tbl_product_his WHERE year='$year'")or die(mysqli_error());
while($row=mysqli_fetch_array($YearlysellingPrice)){
	$yearsp=$row['sum(cost)'];	
}
$YearlybuyingPrice=mysqli_query($link,"SELECT sum(buyingPrice) FROM tbl_product_his WHERE year='$year'")or die(mysqli_error());
while($row=mysqli_fetch_array($YearlybuyingPrice)){
	$yearbp=$row['sum(buyingPrice)'];	
}
$yearProfit=$yearsp-$yearbp;

include"../includes/connection.php";
//business details
$details=mysqli_query($link,"SELECT * FROM tbl_details WHERE id='1'")or die(mysqli_error());
$row=mysqli_fetch_array($details);
$name=$row['name'];
$address=$row['address'];
$code=$row['code'];
$city=$row['city'];
$phone=$row['phone'];

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
$pdf->Cell(0,0,'PROFIT REPORT',0,0,'C');
$pdf->Ln(8);
$pdf->SetFont('times',"BU",14);
$pdf->Cell(55,8,'', 0);
$pdf->Cell(35,8,'SALES',0);
$pdf->Cell(35,8,'COST',0);
$pdf->Cell(15,8,'PROFIT',0);
$pdf->Ln(4);
$pdf->SetFont('times',"BU",14);
//$pdf->Cell(12,8,'SALES REPORT',0);
$pdf->SetFont('times',"B",14);
$pdf->Ln(8);
$pdf->Cell(55,8,'Day totals:',0);
$pdf->Cell(35,8,$dailysp,0);
$pdf->Cell(35,8,$dailybp,0);
$pdf->Cell(12,8,$dailyProfit,0);
$pdf->Ln(8);
$pdf->Cell(55,8,'Month Total:',0);
$pdf->Cell(35,8,$monthsp,0);
$pdf->Cell(35,8,$monthbp,0);
$pdf->Cell(12,8,$monthlyProfit,0);
$pdf->Ln(8);
$pdf->Cell(55,8,'Year Total:',0);
$pdf->Cell(35,8,$yearsp,0);
$pdf->Cell(35,8,$yearbp,0);
$pdf->Cell(12,8,$yearProfit,0);
$pdf->Ln(16);





$pdf->Output();
?>