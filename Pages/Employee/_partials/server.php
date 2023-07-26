<?php
$servername = "localhost";
$username = "root";
$password = "admin";
$database = "hms";
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Sorry We failed to connect" . mysqli_connect_error());
}
session_start();
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">