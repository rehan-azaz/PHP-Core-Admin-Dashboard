<?php

$con=mysqli_connect('localhost','root','','shopify')
or die("connection failed".mysqli_errno());
var_dump($_REQUEST);

$id = $_REQUEST['txt-id'];
$first_name = $_REQUEST['txt-first-name'];
$last_name = $_REQUEST['txt-last-name'];
$email = $_REQUEST['txt-email'];
$directory = '../assets/img/';
$userImageName =  !empty($_REQUEST['image'])?$_REQUEST['image']:null;
$userImagePath = "$directory$userImageName";

$sql ="UPDATE Admin SET first_name='$first_name', last_name='$last_name', email='$email', image='$userImagePath' where id=$id";
$query=mysqli_query($con,$sql);
if($query){
    header("Location: http://localhost:8080/shopify-core/Admin/Users");
}
else {
    echo "Error: " . $query . "<br>" . mysqli_error($con);
}

?>