<?php

$con=mysqli_connect('localhost','root','','shopify');

if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    $sql="select * from Products WHERE id=$id";
    $run_sql=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run_sql)){
        $product_id=$row[0];
        $product_name=$row[1];
        $product_info=$row[2];
        $product_price=$row[3];
        $product_image=$row[4];
        $product_category=$row[5];
    }
    ?>
    <form action="edit-product.php" class="form-horizontal" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Product</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <form action="edit-product-form.php" method="post" class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txt-id">ID</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txt-id" name="txt-id" value="<?php echo $product_id;?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txt-product-name">Product Name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txt-product-name" name="txt-product-name" value="<?php echo $product_name;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txt-product-info">Product Info</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txt-product-info" name="txt-product-info" value="<?php echo $product_info;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txt-product-price">Product Price</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txt-product-price" name="txt-product-price" value="<?php echo $product_price;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="product-image">Product Image</label>
                            <div class="col-sm-6">
                                <input type="file" accept="image/*" multiple="true" class="form-control" id="prodcut-image" name="product-image[]" value="<?php echo $product_image;?>" >
                            </div>
                        </div>
                        <?php
                            $query="select * from Category";
                            $run_query=mysqli_query($con,$query);
                        ?>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txt-product-category">Product Category</label>
                            <div class="col-sm-6">
                                <select  class="form-control" id="txt-product-category" name="txt-product-category" >
                                    <option>
                                        <?php echo $product_category?>
                                    </option>
                                    <?php
                                    while($row=mysqli_fetch_array($run_query)){
                                    ?>
                                        <option><?php echo $row[1]?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="submit" class="btn btn-warning" id="txt-update" name="txt-update" value="Update" style="float: right">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </form>
    <?php
} ?>


