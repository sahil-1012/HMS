<?php
include '_partials\E_database.php';

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <link rel="stylesheet" href="./global.css" />
  <link rel="stylesheet" href="./E_home.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;600;700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Work Sans:wght@600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto Mono:wght@700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source Sans Pro:wght@400&display=swap" />


</head>

<body>
  <div class="emphome">
    <img class="emphome-child" alt="" src="./public/rectangle-12.svg" />

    <div class="guardian-emp">
      <div class="instance-parent">
        <div class="name-parent">
          <label class="name">Name</label>
          <span class="tomiwa-oyeledu-dolapo"><?php echo $row_dep['F_name'] .  " " . $row_dep['M_name'] . " " . $row_dep['L_name'] ?></span>
        </div>
        <div class="name-parent">
          <label class="name">Relationship</label>
          <span class="tomiwa-oyeledu-dolapo"><?php echo $row_dep['Relation']; ?></span>
        </div>
        <div class="name-parent">
          <label class="name">Phone no</label>
          <span class="tomiwa-oyeledu-dolapo"><?php echo $row_dep['phone_no']; ?></span>
        </div>
        <div class="name-parent">
          <label class="name">Address</label>
          <span class="tomiwa-oyeledu-dolapo"><?php echo $row_dep['city'] . " " . $row_dep['State']; ?></span>
        </div>
      </div>
      <label class="guardian-details">Guardian details</label>
    </div>
    <div class="salary-emp">
      <div class="instance-parent">
        <div class="name-parent">
          <label class="name">Monthly Salary</label>
          <span class="tomiwa-oyeledu-dolapo"><?php echo round(($row_wage['daily_wage'] * 30), -2); ?></span>
        </div>
        <div class="name-parent">
          <label class="name">Current Status</label>
          <span class="tomiwa-oyeledu-dolapo">WSCDZXPaid</span>
        </div>
      </div>
      <label class="guardian-details">Salary details</label>
    </div>
    <div class="add-emp">
      <div class="date-of-join-parent">
        <label class="date-of-join">Date Of Join</label>
        <span class="tomiwa-oyeledu-dolapo5"><?php echo $row_works_for['Date_of_Join'] ?></span>
        <!-- <label class="valid-till">Valid Till</label>
        <span class="tomiwa-oyeledu-dolapo6"></span> -->
      </div>
      <label class="guardian-details">Additional details</label>
    </div>


    <div class="contact-emp">
      <div class="name-parent2">
        <label class="name5">Phone Number</label>
        <span class="span"><?php echo $row['phone_no']; ?></span>
        <label class="name6">Email</label>
        <span class="tomiwa-oyeledu-dolapo7"><?php echo $row['emailid']; ?></span>
      </div>
      <label class="guardian-details">Contact Details</label>
    </div>
    <div class="address-emp">
      <div class="name-parent3">
        <label class="name">Address Line</label>
        <span class="tomiwa-oyeledu-dolapo"><?php echo $row['street']; ?></span>
        <div class="name-parent">
          <label class="name">City</label>
          <span class="tomiwa-oyeledu-dolapo"><?php echo $row['city']; ?></span>
        </div>
        <div class="name-parent">
          <label class="name">State</label>
          <span class="tomiwa-oyeledu-dolapo"><?php echo $row['State']; ?></span>
        </div>
        <div class="name-parent">
          <label class="name">Pincode</label>
          <span class="tomiwa-oyeledu-dolapo"><?php echo $row['Pincode']; ?></span>
        </div>
      </div>
      <label class="guardian-details">Address</label>
    </div>


    <div class="dask-info-emp">
      <div class="name-parent7">
        <label class="name">Branch Number</label>

        <?php
        $query = 'SELECT B_name FROM BRANCH WHERE B_id =' . $B_id;
        $result = mysqli_query($conn, $query);
        $bname = mysqli_fetch_assoc($result);
        ?>

        <span class="tomiwa-oyeledu-dolapo"><?php echo $B_id;  ?></span>
      </div>
      <div class="name-parent8">
        <label class="name5">Branch</label>
        <span class="tomiwa-oyeledu-dolapo13"><?php echo $bname['B_name']  ?></span>
      </div>
      <label class="guardian-details">DASK Info</label>
    </div>
    <div class="personal-details-emp">
      <img class="personal-details-emp-child" alt="" src="./public/rectangle-11.svg" />

      <div class="instance-group">
        <div class="name-parent">
          <label class="name">Name</label>
          <span class="tomiwa-oyeledu-dolapo"><?php echo $row['F_name'] . " " . $row['M_name']  . " " . $row['L_name']; ?></span>
        </div>
        <div class="name-parent">
          <label class="name">Employee ID</label>
          <span class="tomiwa-oyeledu-dolapo"><?php echo $E_id  ?></span>
        </div>
        <div class="name-parent">
          <label class="name">Date of Birth</label>
          <span class="tomiwa-oyeledu-dolapo"><?php echo $row['DOB']  ?></span>
        </div>
        <div class="name-parent">
          <label class="name">Gender</label>
          <span class="tomiwa-oyeledu-dolapo"><?php echo $row['gender']  ?></span>
        </div>
      </div>
      <label class="guardian-details">Personal Details</label>
    </div>

    <?php include '../../Components/Navbar.php'; ?>



  </div>


  <script>
    // var popupframeButton1 = document.getElementById("popupframeButton1");
    // if (popupframeButton1) {
    //   popupframeButton1.addEventListener("click", function(e) {
    //     window.location.href = "/logout.php";
    //   });
    // }

    // var notifications = document.getElementById("notifications");
    // if (notifications) {
    //   notifications.addEventListener("click", function(e) {
    //     window.location.href = "./empnoti.html";
    //   });
    // }

    // var attendance = document.getElementById("attendance");
    // if (attendance) {
    //   attendance.addEventListener("click", function(e) {
    //     window.location.href = "./empattendance.html";
    //   });
    // }

    // var finances = document.getElementById("finances");
    // if (finances) {
    //   finances.addEventListener("click", function(e) {
    //     window.location.href = "./employeefin.html";
    //   });
    // }

    // var empEnroll = document.getElementById("empEnroll");
    // if (empEnroll) {
    //   empEnroll.addEventListener("click", function(e) {
    //     window.location.href = "./emp_enrl.php";
    //   });
    // }

    // var employee = document.getElementById("employee");
    // if (employee) {
    //   employee.addEventListener("click", function(e) {
    //     window.location.href = "./Employee.php";
    //   });
    // }

    // var rooms = document.getElementById("rooms");
    // if (rooms) {
    //   rooms.addEventListener("click", function(e) {
    //     window.location.href = "./Rooms.php";
    //   });
    // }

    // var hosteliteEnroll = document.getElementById("hosteliteEnroll");
    // if (hosteliteEnroll) {
    //   hosteliteEnroll.addEventListener("click", function(e) {
    //     window.location.href = "./Host_enrl.php";
    //   });
    // }

    // var hostelite = document.getElementById("hostelite");
    // if (hostelite) {
    //   hostelite.addEventListener("click", function(e) {
    //     window.location.href = "./Hostellite.php";
    //   });
    // }

    // var requests = document.getElementById("requests");
    // if (requests) {
    //   requests.addEventListener("click", function(e) {
    //     window.location.href = "./Request.php";
    //   });
    // }

    // var logout = document.getElementById("logout");
    // if (logout) {
    //   logout.addEventListener("click", function() {
    //     var popup = document.getElementById("logoutPopup");
    //     if (!popup) return;
    //     var popupStyle = popup.style;
    //     if (popupStyle) {
    //       popupStyle.display = "flex";
    //       popupStyle.zIndex = 100;
    //       popupStyle.backgroundColor = "rgba(113, 113, 113, 0.3)";
    //       popupStyle.alignItems = "center";
    //       popupStyle.justifyContent = "center";
    //     }
    //     popup.setAttribute("closable", "");

    //     var onClick =
    //       popup.onClick ||
    //       function(e) {
    //         if (e.target === popup && popup.hasAttribute("closable")) {
    //           popupStyle.display = "none";
    //         }
    //       };
    //     popup.addEventListener("click", onClick);
    //   });
    // }
  </script>
</body>

</html>