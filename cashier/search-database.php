<!doctype html>
<html>
<head>
<?php include"../includes/header-scripts.php";?>
<meta charset="utf-8">
<title>AJAX SEARCH</title>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>

<body>

<?php
$q = $_GET['q'];

$con = mysqli_connect('localhost','root','','pos');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM tbl_products WHERE productCode = '".$q."'";
$result = mysqli_query($con,$sql);
$table="";
echo "<table >
<tr>
<th>Product Code</th>
<th>Description</th>
<th>Price</th>
<th>Tax code</th>
<th>Tender</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo $table .='<tr>
    <td>' . $row['productCode'] . '</td>
    <td>' . $row['description'] . '</td>
    <td>' . $row['sellingPrice'] . '</td>
    <td>' . $row['taxcode'] . '</td>
	<td><form action="" method="POST">
	<input type="hidden" name="productCode" value="'.$row['productCode'].'">
	<button class="btn btn-success" >Tender</button> 
	</form></td>
	</tr>';
}
echo "</table>";
mysqli_close($con);
?>
<?php include"../includes/footer-scripts.php"?>
</body>
</html>
<!--<a class="btn btn-success" href="index.php?id='. $row['productCode'] .'">Tender</a> -->
