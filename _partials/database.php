<?php
include '_partials\server.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header('location: /login.PHP');
    exit;
}

$loggedin = false;
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 'true') {
    $loggedin = true;
    $H_id =  $_SESSION['H_id'];
    $H_id = 3;

    $query = 'SELECT * FROM hostelites WHERE H_id = ' . $H_id;
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    

    $query = 'SELECT * FROM h_dependents WHERE H_no = ' . $H_id;
    $result = mysqli_query($conn, $query);
    $row_dep = mysqli_fetch_assoc($result);

    $query = 'SELECT * FROM belongs_to WHERE H_no = ' . $H_id;
    $result = mysqli_query($conn, $query);
    $row_bel = mysqli_fetch_assoc($result);

    $query = 'SELECT * FROM belongs_to WHERE H_no = ' . $H_id;
    $result = mysqli_query($conn, $query);
    $row_belongs_to = mysqli_fetch_assoc($result);
    $H_id=2;
    $B_id = 1;   
    // $B_id = 1$row_belongs_to['B_no'];   
    
    $query = "SELECT B_name FROM BRANCH WHERE B_id = (SELECT B_no FROM belongs_to WHERE H_no = $H_id)";
    $result = mysqli_query($conn, $query);
    $bname = mysqli_fetch_assoc($result);
}
