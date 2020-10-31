<?php
session_start();
if (!isset($_SESSION['name']) && !isset($_SESSION['employeeId']) && !isset($_SESSION['category'])) {
    header('location:../index.php');
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../includes/header-scripts.php"; ?>

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<?php include "../navigation.php"; ?>

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Products</li>
        </ol>
        <!-- Icon Cards-->

        <!-- Area Chart Example-->

        <?php include "add-product.php"; ?>
        <?php //include"edit-product.php";?>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Products
                <a data-toggle="modal" data-target="#addModal" class="btn btn-primary" style="color: #ffffff">Add
                    Product</a>
                <?php
                if (isset($_GET['message'])) {
                    if ($_GET['message'] == 'success') {
                        ?>
                        <div class="alert alert-success" id="success"
                             onclick="document.getElementById('success').style.display='none'">
                            <strong>Success!</strong> Product added.
                        </div>
                    <?php } elseif ($_GET['message'] == 'error') {
                        ?>
                        <div class="alert alert-warning" id="error"
                             onclick="document.getElementById('error').style.display='none'">
                            <strong>Failed!</strong> An error occurred.
                        </div>
                        <?php
                    } elseif ($_GET['message'] == 'exist') {
                        ?>
                        <div class="alert alert-danger" id="exists"
                             onclick="document.getElementById('exists').style.display='none'">
                            <strong>Failed!</strong> Product already exists.
                        </div>
                        <?php
                    } elseif ($_GET['message'] == 'deactivate') {
                        ?>
                        <div class="alert alert-success" id="deactivate"
                             onclick="document.getElementById('deactivate').style.display='none'">
                            <strong>Product deactivated</strong>
                        </div>
                        <?php
                    } elseif ($_GET['message'] == 'activated') {
                        ?>
                        <div class="alert alert-success" id="activate"
                             onclick="document.getElementById('activate').style.display='none'">
                            <strong>Product activated</strong>
                        </div>
                        <?php
                    }elseif ($_GET['message']=='edits'){
                        ?>
                        <div class="alert alert-success" id="edits"
                             onclick="document.getElementById('edits').style.display='none'">
                            <strong>Product edit successful</strong>
                        </div>
                        <?php
                    }elseif ($_GET['message']=='editf'){
                        ?>
                        <div class="alert alert-danger" id="editf"
                             onclick="document.getElementById('editf').style.display='none'">
                            <strong>Product edit failed</strong>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Prod Code</th>
                                <th>Description</th>
                                <th>Selling Price</th>
                                <th>Buying price</th>
                                <th>Quantity</th>
                                <th>Taxcode</th>
                                <th>Department</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Prod Code</th>
                                <th>Description</th>
                                <th>Selling Price</th>
                                <th>Buying price</th>
                                <th>Quantity</th>
                                <th>Taxcode</th>
                                <th>Department</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <?php
                            $selectProducts = mysqli_query($link, "SELECT * FROM tbl_products ORDER BY dateadded DESC ") or die (mysqli_error());
                            while ($row = mysqli_fetch_array($selectProducts)) {

                                ?>

                                <tbody>
                                <tr>
                                    <td><?php echo $row['productCode']; ?></td>
                                    <td><?php echo $row['description']; ?></td>
                                    <td><?php echo $row['sellingPrice']; ?></td>
                                    <td><?php echo $row['buyingPrice']; ?></td>
                                    <td><?php echo $row['quantity']; ?></td>
                                    <td><?php echo $row['taxcode']; ?></td>
                                    <td><?php echo $row['department']; ?></td>
                                    <td><?php echo $row['action']; ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="edit-product.php?id=<?php echo $row['id']; ?>"
                                               class="btn btn-primary" data-toggle="tooltip" title="Edit product"><i
                                                        class="fa fa-fw fa-edit"></i></a>
                                            <?php if ($row['action'] == 'present') { ?>
                                                <a href="action.php?deactivate=<?php echo $row['id']; ?>"
                                                   class="btn btn-warning" data-toggle="tooltip"
                                                   title="Deactivate product"><i class="fa fa-fw fa-remove"></i></a>
                                            <?php } else { ?>
                                                <a href="action.php?activate=<?php echo $row['id']; ?>"
                                                   class="btn btn-success" data-toggle="tooltip"
                                                   title="Activate product"><i class="fa fa-fw fa-check"></i></a>
                                            <?php } ?>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            <?php } ?>
                        </table>
                    </form>
                </div>
            </div>
            <!--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>-->
        </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include "../includes/footer.php"; ?>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <?php include "../logout-modal.php"; ?>
    <?php include "../includes/footer-scripts.php" ?>
</div>
</body>

</html>
