<?php
$con=mysqli_connect('localhost','root','','shopify');  // this one in error
if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    $sql="select * from Category WHERE id=$id";
    $run_sql=mysqli_query($con,$sql);
    ?>
    <form action="delete-category.php" class="form-horizontal" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Confirm Delete</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="delete-category.php" method="post" class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <p class="col-sm-4 control-label">Are you sure?</p>
                        </div>
                        <div class="form-group d-block justify-content-center">
                            <div class="col-sm-12">
                                <button class="btn btn-danger" type="submit" name="txt-delete-category" value=<?php echo $id?>>
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </form>
    <?php
} ?>


