<?php


$con=mysqli_connect('localhost','root','','shopify')
or die("connection failed".mysqli_errno());


$id = $_REQUEST['txt-delete-user'];

$sql ="DELETE FROM Admin where id=$id";
$query=mysqli_query($con,$sql);

if($query){
    header("Location: http://localhost:8080/shopify-core/Admin/Users");
}
else {
    echo "Error: " . $query . "<br>" . mysqli_error($con);
}

?>