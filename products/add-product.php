<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="padding:10px;border-style:solid;border-width:5px;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ADD NEW PRODUCT</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form action="add-product-exec.php" method="POST" role="form" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-lg-6">
                            <label for="exampleInputPassword1">Product Code</label>
                            <input class="form-control" name="productCode" id="exampleInputPassword1" type="text"
                                   placeholder="Product Code" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="exampleInputPassword1">Description</label>
                            <input class="form-control" name="description" id="exampleInputPassword1" type="text"
                                   placeholder="Description" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="exampleInputPassword1">Selling price</label>
                            <input class="form-control" name="sellingPrice" id="exampleInputPassword1" type="text"
                                   placeholder="Selling price" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="exampleInputPassword1">Buying price</label>
                            <input class="form-control" name="buyingPrice" id="exampleInputPassword1" type="text"
                                   placeholder="Buying price" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="exampleInputPassword1">Quantity</label>
                            <input class="form-control" name="quantity" id="exampleInputPassword1" type="text"
                                   placeholder="Quantity" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="exampleInputPassword1">Taxcode</label>
                            <select class="form-control" name="taxCode">
                                <?php $taxSelect = mysqli_query($link, "SELECT * FROM tbl_taxcode  ") or die (mysqli_error());
                                while ($row = mysqli_fetch_array($taxSelect)) {
                                    $taxcode = $row['taxCode'];
                                    ?>
                                    <option value="<?php echo $taxcode; ?>"><?php echo $taxcode; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="exampleInputPassword1">Department</label>
                            <select class="form-control" name="department">
                                <?php $taxSelect = mysqli_query($link, "SELECT * FROM tbl_department  ") or die (mysqli_error());
                                while ($row = mysqli_fetch_array($taxSelect)) {
                                    $dept = $row['id'];
                                    $name = $row['name'];
                                    ?>
                                    <option value="<?php echo $dept; ?>"><?php echo $name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="exampleInputPassword1">Image</label>
                            <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">

                        </div>

                    </div>
                </div>


                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button name="add" type="submit" class="btn btn-primary">ADD</button>
                </div>
            </form>
        </div>
    </div>
</div>