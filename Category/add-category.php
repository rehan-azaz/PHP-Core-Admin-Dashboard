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




$categoryName = !empty($_REQUEST['txt-category-name'])?$_REQUEST['txt-category-name']:null;
$directory = '../assets/img/';
$categoryImageName =  !empty($_POST['category-image'])?$_POST['category-image']:null;
$categoryImagePath = "$directory$categoryImageName";
$categoryDescription = !empty($_REQUEST['txt-category-description'])?$_REQUEST['txt-category-description']:null;

$insertQuery = "INSERT INTO Category (name, image, description ) 
                    VALUES ('$categoryName', '$categoryImagePath', '$categoryDescription')";

if (mysqli_query($connection, $insertQuery)) {
    header("Location: http://localhost:8080/shopify-core/Admin/Category");
} else {
    echo "Error: " . $insertQuery . "<br>" . mysqli_error($connection);
}

?>