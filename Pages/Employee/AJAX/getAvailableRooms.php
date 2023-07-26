<?php
$servername = "localhost";
$username = "root";
$password = "admin";
$database = "hms";
$conn = mysqli_connect($servername, $username, $password, $database);

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $room_type = $_GET["room_type"];
    $B_no = $_GET["B_no"];

    $query = "SELECT DISTINCT R_ID FROM ROOMS WHERE BED_STATUS = 'FREE' AND B_no = $B_no AND R_Type = '$room_type';";

    $result = mysqli_query($conn, $query);

}
?>

<select name="room_no" style="cursor: pointer;">
    <option value=0 disabled style="display: none;" selected>Select the Room no</option>
    <?php while ($row_room = mysqli_fetch_assoc($result)) { ?>
        <option value="<?php echo $row_room['R_ID']; ?>"><?php echo "Room - " . $row_room['R_ID']; ?></option>
    <?php } ?>
</select>