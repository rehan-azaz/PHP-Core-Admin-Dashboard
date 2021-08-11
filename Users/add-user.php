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

$firstName = !empty($_REQUEST['txt-first-name'])?$_REQUEST['txt-first-name']:null;
$lastName = !empty($_REQUEST['txt-last-name'])?$_REQUEST['txt-last-name']:null;
$email = !empty($_REQUEST['txt-email'])?$_REQUEST['txt-email']:null;
$directory = '../assets/img/';
$userImageName =  !empty($_REQUEST['image'])?$_REQUEST['image']:null;
$userImagePath = "$directory$userImageName";
$password = md5(!empty($_REQUEST['txt-password'])?$_REQUEST['txt-password']:null);
$role = "Admin";
$insertQuery = "INSERT INTO Admin (first_name, last_name, email, image, role, password) 
                    VALUES ('$firstName', '$lastName', '$email', '$userImagePath', '$role', '$password')";

if (mysqli_query($connection, $insertQuery)) {
    header("Location: http://localhost:8080/shopify-core/Admin/Users");
} else {
    echo "Error: " . $insertQuery . "<br>" . mysqli_error($connection);
}

?>