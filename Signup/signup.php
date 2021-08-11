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

$firstName = !empty($_POST['first_name'])?$_POST['first_name']:null;
$lastName = !empty($_POST['last_name'])?$_POST['last_name']:null;
$email = !empty($_POST['email'])?$_POST['email']:null;
$directory = '../assets/img/';
$userImageName =  !empty($_POST['image'])?$_POST['image']:null;
$userImagePath = "$directory$userImageName";
$password = md5(!empty($_POST['password'])?$_POST['password']:null);

$role = "Admin";
$insertQuery = "INSERT INTO Admin (first_name, last_name, email, image, role,password) 
                    VALUES ('$firstName', '$lastName', '$email', '$userImagePath', '$role', '$password')";

if (mysqli_query($connection, $insertQuery)) {
    header("Location: http://localhost:8080/shopify-core/Admin/Login");
} else {
    echo "Error: " . $insertQuery . "<br>" . mysqli_error($connection);
}

?>