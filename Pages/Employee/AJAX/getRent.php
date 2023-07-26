<?php
$servername = "localhost";
$username = "root";
$password = "admin";
$database = "hms";
$conn = mysqli_connect($servername, $username, $password, $database);

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $B_id = $_GET['B_no'];
    $room_id = $_GET['room_id'];

    $query = "SELECT DISTINCT RENT FROM ROOMS WHERE B_no = $B_id AND R_ID = $room_id;";

    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $rent = $row['RENT'];

    $calculated_rent = 2 * $rent / 3;
    $two_third = number_format($calculated_rent, 2);

    $calculated_rent =  $rent / 3;
    $one_third = number_format($calculated_rent, 2);
}
?>

<select name="room_no" style="cursor: pointer;">
    <option value=0 disabled style="display: none;" selected>Rent</option>
    <option value="<?php echo $rent; ?>"><?php echo $rent; ?></option>
    <option value="<?php echo $two_third; ?>"><?php echo $two_third; ?></option>
    <option value="<?php echo $one_third; ?>"><?php echo $one_third; ?></option>
</select>