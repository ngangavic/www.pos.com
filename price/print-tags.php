<?php
include"../includes/connection.php";

if(isset($_POST['printAll'])){
$id=$_POST['id'];
$code=$_POST['prodCode'];
$description=$_POST['description'];
$number=$_POST['number'];
$N = count($id);
//echo $N;
for($i=0;$i<$N;$i++){
	
    echo $description[$i],'</br>';
	echo $code[$i],'</br></br>';
	
}
}else{
	header("location:print-tag.php");
}
?>
<script>
window.print();
window.location="stickers.php";
</script>