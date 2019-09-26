<?php
$year=$_POST['year'];
$month=$_POST['month'];
$day=$_POST['day'];

include"../includes/connection.php";
//business details
$details=mysqli_query($link,"SELECT * FROM tbl_details WHERE id='1'")or die(mysqli_error());
$row=mysqli_fetch_array($details);
$name=$row['name'];
$address=$row['address'];
$code=$row['code'];
$city=$row['city'];
$phone=$row['phone'];
/***********************************************daily sales******************************************/
$dailySales=mysqli_query($link,"SELECT sum(productSales) FROM tbl_transaction WHERE day='$day'")or die(mysqli_error());
while($row=mysqli_fetch_array($dailySales)){
	$dailyTaxableSales=$row['sum(productSales)'];
}
$dailySales2=mysqli_query($link,"SELECT sum(taxExempt) FROM tbl_transaction WHERE day='$day'")or die (mysqli_error());
while($row=mysqli_fetch_array($dailySales2)){
	$dailyTaxExempt=$row['sum(taxExempt)'];
}
$todaySales=$dailyTaxableSales+$dailyTaxExempt;

$dailytax=mysqli_query($link,"SELECT sum(tax) FROM tbl_transaction WHERE day='$day'")or die (mysqli_error());	
while($row=mysqli_fetch_array($dailytax)){
	$dailyTaxCollected=$row['sum(tax)'];	
}

/***********************************************month sales*****************************************/
//productSales
$monthSales=mysqli_query($link,"SELECT sum(productSales) FROM tbl_transaction WHERE month='$month'")or die(mysqli_error());
while($row = mysqli_fetch_array($monthSales)){
	
	$taxableSales=$row['sum(productSales)'];
	}
//taxexempt
$monthSales2=mysqli_query($link,"SELECT sum(taxExempt) FROM tbl_transaction WHERE month='$month'")or die(mysqli_error());
while($row = mysqli_fetch_array($monthSales2)){
		
	$taxExempt=$row['sum(taxExempt)'];
	}	
	$Totalsales=$taxableSales+$taxExempt;
	
//tax collected
$tax=mysqli_query($link,"SELECT sum(tax) FROM tbl_transaction WHERE month='$month'")or die (mysqli_error());	
while($row=mysqli_fetch_array($tax)){
	$taxCollected=$row['sum(tax)'];	
}

/***********************************************year sales*****************************************/
//productSales
$yearSales=mysqli_query($link,"SELECT sum(productSales) FROM tbl_transaction WHERE year='$year'")or die(mysqli_error());
while($row = mysqli_fetch_array($yearSales)){
	
	$yeartaxableSales=$row['sum(productSales)'];
	}
//taxexempt
$yearSales2=mysqli_query($link,"SELECT sum(taxExempt) FROM tbl_transaction WHERE year='$year'")or die(mysqli_error());
while($row = mysqli_fetch_array($yearSales2)){
		
	$yeartaxExempt=$row['sum(taxExempt)'];
	}	
	$YearTotalsales=$yeartaxableSales+$yeartaxExempt;
	
//tax collected
$yeartax=mysqli_query($link,"SELECT sum(tax) FROM tbl_transaction WHERE year='$year'")or die (mysqli_error());	
while($row=mysqli_fetch_array($yeartax)){
	$yeartaxCollected=$row['sum(tax)'];	
}

/****************************************TOTALS****************************************/
$TOTALDAILYSALES=$todaySales+$dailyTaxCollected;
$TOTALMONTHLYSALES=$Totalsales+$taxCollected;
$TOTALYEARLYSALES=$YearTotalsales+$yeartaxCollected;

/******************************TOTAL TRANSACTIONS****************************************/
$dailyCount=mysqli_query($link,"SELECT * FROM tbl_transaction WHERE day='$day'")or die (mysqli_error());
$countDaily=mysqli_num_rows($dailyCount);

$monthlyCount=mysqli_query($link,"SELECT * FROM tbl_transaction WHERE month='$month'")or die(mysqli_error());
$countMonthly=mysqli_num_rows($monthlyCount);

$yearlyCount=mysqli_query($link,"SELECT * FROM tbl_transaction WHERE year='$year'")or die(mysqli_error());
$countYearly=mysqli_num_rows($yearlyCount);

/*********************COUNT TRANSACTIONS WITH DISCOUNT****************************/
$dis=0;
$dailyCount=mysqli_query($link,"SELECT * FROM tbl_transaction WHERE discount >'$dis' AND day='$day' ")or die (mysqli_error());
$totalDailyCount=mysqli_num_rows($dailyCount);

$monthlyCount=mysqli_query($link,"SELECT * FROM tbl_transaction WHERE discount >'$dis' AND month='$month' ")or die (mysqli_error());
$totalMonthCount=mysqli_num_rows($monthlyCount);

$yearlyCount=mysqli_query($link,"SELECT * FROM tbl_transaction WHERE discount >'$dis' AND year='$year' ")or die (mysqli_error());
$totalYearlyCount=mysqli_num_rows($yearlyCount);

/**********************************TOTAL DISCOUNTS GIVEN*************************/
$dis=0;
$dailyDiscount=mysqli_query($link,"SELECT sum(discount) FROM tbl_transaction WHERE day='$day' ")or die (mysqli_error());
while($row=mysqli_fetch_array($dailyDiscount)){
$dailyTotalDiscount=$row['sum(discount)'];
}

$monthlyDiscount=mysqli_query($link,"SELECT sum(discount) FROM tbl_transaction WHERE month='$month' ")or die (mysqli_error());
while($row=mysqli_fetch_array($monthlyDiscount)){
	$monthlyTotalDiscount=$row['sum(discount)'];
}

$yearDiscount=mysqli_query($link,"SELECT sum(discount) FROM tbl_transaction WHERE year='$year' ")or die (mysqli_error());
while($row=mysqli_fetch_array($yearDiscount)){
	$yearlyTotalDiscount=$row['sum(discount)'];
}

/**************************COUNT OF RETURN TRANSACTIONS*****************************/
$dailyReturnCount=mysqli_query($link,"SELECT * FROM tbl_return WHERE day='$day' ")or die (mysqli_error());
$totalReturnDailyCount=mysqli_num_rows($dailyReturnCount);

$monthlyReturnCount=mysqli_query($link,"SELECT * FROM tbl_return WHERE month='$month' ")or die (mysqli_error());
$totalReturnMonthCount=mysqli_num_rows($monthlyReturnCount);

$yearlyReturnCount=mysqli_query($link,"SELECT * FROM tbl_return WHERE year='$year' ")or die (mysqli_error());
$totalReturnYearlyCount=mysqli_num_rows($yearlyReturnCount);

/*****************************SUM OF RETURN TRANSACTION****************************/
$dailyReturn=mysqli_query($link,"SELECT sum(salesValue) FROM tbl_return WHERE day='$day' ")or die (mysqli_error());
while($row=mysqli_fetch_array($dailyReturn)){
$dailyTotalReturn=$row['sum(salesValue)'];
}

$monthlyReturn=mysqli_query($link,"SELECT sum(salesValue) FROM tbl_return WHERE month='$month' ")or die (mysqli_error());
while($row=mysqli_fetch_array($monthlyReturn)){
	$monthlyTotalReturn=$row['sum(salesValue)'];
}

$yearReturn=mysqli_query($link,"SELECT sum(salesValue) FROM tbl_return WHERE year='$year' ")or die (mysqli_error());
while($row=mysqli_fetch_array($yearReturn)){
	$yearlyTotalReturn=$row['sum(salesValue)'];
}


require "../pdf/fpdf.php";

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('times',"B",14);
$pdf->Cell(0,0,$name,0,0,'C');
$pdf->Ln(8);
$pdf->Cell(0,0,'P.O BOX: '.$address.'-'.$code.','.$city,0,0,'C');
$pdf->Ln(8);
$pdf->Cell(0,0,'PHONE: '.$phone,0,0,'C');
$pdf->Ln(8);
$pdf->Cell(0,0,'BUSINESS REPORT',0,0,'C');
$pdf->Ln(8);
$pdf->SetFont('times',"BU",14);
$pdf->Cell(55,8,'', 0);
$pdf->Cell(20,8,'Day',0);
$pdf->Cell(25,8,'Month',0);
$pdf->Cell(15,8,'Year',0);
$pdf->Ln(8);
$pdf->SetFont('times',"BU",14);
$pdf->Cell(12,8,'SALES REPORT',0);
$pdf->SetFont('times',"B",14);
$pdf->Ln(8);
$pdf->Cell(55,8,'Total sales:',0);
$pdf->Cell(20,8,number_format($todaySales,0),0);
$pdf->Cell(23,8,number_format($Totalsales,0),0);
$pdf->Cell(12,8,number_format($YearTotalsales,0),0);
$pdf->Ln(8);
$pdf->Cell(55,8,'Tax collected:',0);
$pdf->Cell(20,8,number_format($dailyTaxCollected,0),0);
$pdf->Cell(23,8,number_format($taxCollected,0),0);
$pdf->Cell(12,8,number_format($yeartaxCollected,0),0);
$pdf->Ln(8);
$pdf->Cell(55,8,'Total sales & tax:',0);
$pdf->Cell(20,8,number_format($TOTALDAILYSALES,0),0);
$pdf->Cell(23,8,number_format($TOTALMONTHLYSALES,0),0);
$pdf->Cell(12,8,number_format($TOTALYEARLYSALES,0),0);
$pdf->Ln(16);
$pdf->SetFont('times',"BU",14);
$pdf->Cell(12,8,'TAX REPORT',0);
$pdf->SetFont('times',"B",14);
$pdf->Ln(8);
$pdf->Cell(55,8,'Taxable sales:',0);
$pdf->Cell(20,8,number_format($dailyTaxableSales,0),0);
$pdf->Cell(23,8,number_format($taxableSales,0),0);
$pdf->Cell(12,8,number_format($yeartaxableSales,0),0);
$pdf->Ln(8);
$pdf->Cell(55,8,'Tax exempt:',0);
$pdf->Cell(20,8,number_format($dailyTaxExempt,0),0);
$pdf->Cell(23,8,number_format($taxExempt,0),0);
$pdf->Cell(12,8,number_format($yeartaxExempt,0),0);
$pdf->Ln(8);
$pdf->SetFont('times',"BU",14);
$pdf->Cell(55,8,'MISCELLANEOUS INFORMATION:',0);
$pdf->SetFont('times',"B",14);
$pdf->Ln(8);
$pdf->Cell(55,8,'Total Transactions:',0);
$pdf->Cell(20,8,$countDaily,0);
$pdf->Cell(23,8,$countMonthly,0);
$pdf->Cell(12,8,$countYearly,0);
$pdf->Ln(8);
$pdf->Cell(55,8,'Return Transactions:',0);
$pdf->Cell(20,8,$totalReturnDailyCount,0);
$pdf->Cell(23,8,$totalReturnMonthCount,0);
$pdf->Cell(12,8,$totalReturnYearlyCount,0);
$pdf->Ln(8);
$pdf->Cell(55,8,'Cost Return Trans:',0);
$pdf->Cell(20,8,number_format($dailyTotalReturn,0),0);
$pdf->Cell(23,8,number_format($monthlyTotalReturn,0),0);
$pdf->Cell(12,8,number_format($yearlyTotalReturn,0),0);
$pdf->Ln(8);
$pdf->Cell(55,8,'Cash Paid Out:',0);
$pdf->Ln(8);
$pdf->Cell(55,8,'Transactions Discounts:',0);
$pdf->Cell(20,8,$dailyTotalDiscount,0);
$pdf->Cell(23,8,$monthlyTotalDiscount,0);
$pdf->Cell(12,8,$yearlyTotalDiscount,0);
$pdf->Ln(8);
$pdf->Cell(55,8,'Quantity Discounts:',0);
$pdf->Cell(20,8,$totalDailyCount,0);
$pdf->Cell(23,8,$totalMonthCount,0);
$pdf->Cell(12,8,$totalYearlyCount,0);
$pdf->Ln(8);

$pdf->Output();
?>