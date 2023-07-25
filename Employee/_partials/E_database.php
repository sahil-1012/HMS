<?php
include '_partials\server.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header('location: /login.PHP');
    exit;
}

$loggedin = false;
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 'true') {
    $loggedin = true;
    $E_id =  $_SESSION['E_id'];

    $query = 'SELECT * FROM Employee WHERE E_id = ' . $E_id;
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $B_id = $row['B_no'];

    $query = 'SELECT * FROM E_dependents WHERE E_no = ' . $E_id;
    $result = mysqli_query($conn, $query);
    $row_dep = mysqli_fetch_assoc($result);

    $query = 'SELECT * FROM works_for WHERE E_no = ' . $E_id;
    $result = mysqli_query($conn, $query);
    $row_works_for = mysqli_fetch_assoc($result);

    $query = "SELECT * FROM wage WHERE B_no = $B_id AND designation = '{$row['Designation']}'";
    $result = mysqli_query($conn, $query);
    $row_wage = mysqli_fetch_assoc($result);

    $query = "SELECT * FROM Branch WHERE B_id = $B_id";
    $result = mysqli_query($conn, $query);
    $row_branch = mysqli_fetch_assoc($result);
    
}
?>
