<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopify";

$connection= mysqli_connect($servername, $username, $password, $dbname);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
foreach ($_REQUEST['product-image'] as $key => &$value) {
    $value = '../assets/img/' . $value;
}

$productName = !empty($_REQUEST['txt-product-name'])?$_REQUEST['txt-product-name']:null;
$productInfo = !empty($_REQUEST['txt-product-info'])?$_REQUEST['txt-product-info']:null;
$productPrice = !empty($_REQUEST['txt-product-price'])?$_REQUEST['txt-product-price']:null;
$productImageName =  !empty($_REQUEST['product-image'])?serialize($_REQUEST['product-image']):null;
$productCategory = !empty($_REQUEST['txt-product-category'])?$_REQUEST['txt-product-category']:null;


$insertQuery = "INSERT INTO Products (product_name, product_info, product_price,product_image, product_category ) 
                    VALUES ('$productName', '$productInfo', '$productPrice', '$productImageName', '$productCategory')";

if (mysqli_query($connection, $insertQuery)) {
    header("Location: http://localhost:8080/shopify-core/Admin/Products");
} else {
    echo "Error: " . $insertQuery . "<br>" . mysqli_error($connection);
}

?>