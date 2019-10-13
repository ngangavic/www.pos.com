<?php
include "../includes/connection.php";
?>
<?php
if (isset($_GET['deactivate'])) {
    $deactive = $_GET['deactivate'];

    $deleteProd = mysqli_query($link, "UPDATE tbl_products SET action='absent' WHERE id='" . $deactive . "' ") or die (mysqli_error());
    header("location: index.php?message=deactivate");
}
?>


<?php
if (isset($_GET['activate'])) {
    $active = $_GET['activate'];

    $presentDel = mysqli_query($link, "UPDATE tbl_products SET action='present' WHERE id='" . $active . "' ") or die (mysqli_error());
    header("location: index.php?message=activated");
} ?>