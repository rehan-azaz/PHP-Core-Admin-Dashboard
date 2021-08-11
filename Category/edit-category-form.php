<?php

$con=mysqli_connect('localhost','root','','shopify');

if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    $sql="select * from Category WHERE id=$id";
    $run_sql=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run_sql)){
        $category_id=$row[0];
        $category_name=$row[1];
        $category_image=$row[2];
        $category_description=$row[3];
    }
    ?>
    <form action="edit-category.php" class="form-horizontal" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Category</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <form action="edit-category-form.php" method="post" class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txt-id">ID</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txt-id" name="txt-id" value="<?php echo $category_id;?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txt-category-name">Category Name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txt-category-name" name="txt-category-name" value="<?php echo $category_name;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="category-image">Category Image</label>
                            <div class="col-sm-6">
                                <input type="file" class="form-control" id="category-image" name="category-image" value="<?php echo $category_image;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txt-category-description">Category Description</label>
                            <div class="col-sm-6">
                                <textarea type="text" rows="5" class="form-control" name="txt-category-description" value="<?php echo $category_description;?>"><?php echo $category_description;?></textarea>
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


