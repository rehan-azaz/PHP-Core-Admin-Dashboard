<?php

$con=mysqli_connect('localhost','root','','shopify')
or die("connection failed".mysqli_errno());
var_dump($_REQUEST);
foreach ($_REQUEST['product-image'] as $key => &$value){
    $value = '../assets/img/' . $value;
}
$id = $_REQUEST['txt-id'];
$product_name = $_REQUEST['txt-product-name'];
$product_info = $_REQUEST['txt-product-info'];
$product_price = $_REQUEST['txt-product-price'];
$productImageName =  !empty($_REQUEST['product-image'])?serialize($_REQUEST['product-image']):null;
$product_category = $_REQUEST['txt-product-category'];

$sql ="UPDATE Products SET product_name='$product_name', product_info='$product_info', product_price='$product_price', product_image='$productImageName', product_category='$product_category' where id=$id";
$query=mysqli_query($con,$sql);
if($query){
    header("Location: http://localhost:8080/shopify-core/Admin/Products");
}
else {
    echo "Error: " . $query . "<br>" . mysqli_error($con);
}

?>