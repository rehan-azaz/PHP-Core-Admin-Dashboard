<?php

$con=mysqli_connect('localhost','root','','shopify')
or die("connection failed".mysqli_errno());
var_dump($_REQUEST);

$id = $_REQUEST['txt-id'];
$categoryName = $_REQUEST['txt-category-name'];
$directory = '../assets/img/';
$categoryImageName =  !empty($_POST['category-image'])?$_POST['category-image']:null;
$categoryImagePath = "$directory$categoryImageName";
$categoryDescription = $_REQUEST['txt-category-description'];


$sql ="UPDATE Category SET name='$categoryName', image='$categoryImagePath', description='$categoryDescription' where id=$id";
$query=mysqli_query($con,$sql);
if($query){
    header("Location: http://localhost:8080/shopify-core/Admin/Category");
}
else {
    echo "Error: " . $query . "<br>" . mysqli_error($con);
}

?>