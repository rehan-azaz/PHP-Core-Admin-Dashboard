<?php

$con=mysqli_connect('localhost','root','','shopify');

if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    $sql="select * from Admin WHERE id=$id";
    $run_sql=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run_sql)){
        $user_id=$row[0];
        $first_name=$row[1];
        $last_name=$row[2];
        $email=$row[3];
        $image=$row[4];
    }
    ?>
    <form action="edit-user.php" class="form-horizontal" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <form action="edit-user.php" method="post" class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txt-id">ID</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txt-id" name="txt-id" value="<?php echo $user_id;?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txt-first-name">First Name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txt-first-name" name="txt-first-name" value="<?php echo $first_name;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txt-last-name">Last Name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txt-last-name" name="txt-last-name" value="<?php echo $last_name;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txt-email">Email</label>
                            <div class="col-sm-6">
                                <input type="email" class="form-control" id="txt-email" name="txt-email" value="<?php echo $email;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txt-email">Image</label>
                            <div class="col-sm-6">
                                <img src="<?php echo $image?>" width="50px" height="50px">
                                <input type="file" class="form-control" id="image" name="image" value="<?php echo $image;?>">
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


