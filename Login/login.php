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
$email = $_POST['email'];
$password = md5($_POST['password']);
$sql = "SELECT * FROM Admin where email = '$email' and password = '$password'";
$result = mysqli_query($connection, $sql);
$check = mysqli_fetch_array($result);

if (isset($check)) {
    $_SESSION["email"] = $email;
    $_SESSION["logged_in"] = true;
    header("Location: http://localhost:8080/shopify-core/Admin");
}

?>