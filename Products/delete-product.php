<?php


$con=mysqli_connect('localhost','root','','shopify')
or die("connection failed".mysqli_errno());


$id = $_REQUEST['txt-delete-product'];

$sql ="DELETE FROM Products where id=$id";
$query=mysqli_query($con,$sql);

if($query){
    header("Location: http://localhost:8080/shopify-core/Admin/Products");
}
else {
    echo "Error: " . $query . "<br>" . mysqli_error($con);
}

?>