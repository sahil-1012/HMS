<?php

$servername = "localhost";
$username = "root";
$password = "admin";
$database = "hms";
$conn = mysqli_connect($servername, $username, $password, $database);

$branchId = $_GET['branchId'];

$query = "SELECT b.b_name, CONCAT_WS(', ', b.street) AS address, b.city AS city, CONCAT_WS(' ', e.F_name, e.L_name) AS manager_name, e.phone_no
          FROM branch b
          JOIN EMPLOYEE e ON b.Mgr_id = e.E_ID
          WHERE b.B_id = $branchId";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);
} else {
    echo json_encode([]);
}

mysqli_close($conn);

?>
