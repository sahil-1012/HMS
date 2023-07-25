







<?php

$servername = "localhost";
$username = "root";
$password = "admin";
$database = "hms";
$conn = mysqli_connect($servername, $username, $password, $database);

$room_id = $_GET['room_id'];
$B_id = $_GET['B_no'];

$query = "SELECT Bed_no FROM ROOMS WHERE R_ID = $room_id AND BED_STATUS = 'FREE' AND B_no = $B_id;";


$result = mysqli_query($conn, $query);

?>

<select name="bed_no" style="cursor: pointer;">
    <option value=0 disabled style="display: none;" selected>Select the Bed no</option>
    <?php while ($row_bed = mysqli_fetch_assoc($result)) { ?>
        <option value="<?php echo $row_bed['Bed_no']; ?>"><?php echo "Bed - " . $row_bed['Bed_no']; ?></option>
    <?php } ?>
</select>

