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
    <div class="menu-emp">
      <button class="notifications" id="notifications">
        <img class="vector-icon2" alt="" src="./public/vector111.svg" />

        <label class="notifications1">Notifications</label>
      </button>
      <button class="attendance" id="attendance">
        <label class="notifications1">Attendance</label>
        <img class="vector-icon3" alt="" src="./public/vector1.svg" />
      </button>
      <button class="finances" id="finances">
        <label class="finances1">Finances</label>
        <img class="vector-icon4" alt="" src="./public/vector2.svg" />
      </button>
      <button class="emp-enroll" id="empEnroll">
        <label class="employee-enrollment">Employee Enrollment</label>
        <img class="vector-icon5" alt="" src="./public/vector3.svg" />
      </button>
      <button class="employee" id="employee">
        <label class="employee1">Employee</label>
        <img class="employee-child" alt="" src="./public/group-104.svg" />
      </button>
      <button class="rooms" id="rooms">
        <label class="rooms1">Rooms</label>
        <img class="rooms-child" alt="" src="./public/group-103.svg" />
      </button>
      <button class="hostelite-enroll" id="hosteliteEnroll">
        <label class="hostelite-enrollment">Hostelite Enrollment</label>
        <img class="vector-icon6" alt="" src="./public/vector4.svg" />
      </button>
      <button class="hostelite" id="hostelite">
        <label class="hostelite1">Hostelite</label>
        <img class="hostelite-child" alt="" src="./public/group-105.svg" />
      </button>
      <button class="requests" id="requests">
        <label class="requests1">Requests</label>
        <img class="icon-tasks" alt="" src="./public/icontasks.svg" />
      </button>
      <button class="home1">
        <div class="rectangle-div"></div>
        <img class="icon-home" alt="" src="./public/iconhome.svg" />

        <img class="vector-icon7" alt="" src="./public/vector51.svg" />

        <label class="home2">Home</label>
      </button>
      <div class="account-officer">
        <img class="account-officer-child" alt="" src="./public/ellipse-1.svg" data-animate-on-scroll />

        <div class="anna-george-parent">
          <h1 class="anna-george"><?php echo $row['F_name']  . " " . $row['L_name'] ?></h1>
          <?php $bname_fl = substr($row_branch['B_name'], 0, 1)  ?>
          <span class="customer-operations"><?php echo 'E' . $bname_fl . ' - ' . $E_id ?></span>
        </div>


      </div>
    </div>
    <button class="logout1" id="logout">
      <img class="vector-icon8" alt="" src="./public/vector11.svg" />

      <div class="logout2">Logout</div>
      <div class="logout-child"></div>
    </button>
  </div>
  </div>

  <div id="logoutPopup" class="popup-overlay" style="display: none">
    <div class="logout" data-animate-on-scroll>
      <div class="do-you-want-to-logout">
        <h1 class="do-you-want">Do you want to Logout?</h1>
      </div>
      <button class="make-payment-wrapper" id="popupframeButton">
        <h2 class="make-payment">NO</h2>
      </button>
      <button class="make-payment-container" id="popupframeButton1">
        <h2 class="make-payment1">Yes</h2>
      </button>
    </div>
  </div>

  <script>
    var popupframeButton = document.getElementById("popupframeButton");
    if (popupframeButton) {
      popupframeButton.addEventListener("click", function(e) {
        var popup = e.currentTarget.parentNode;

        function isOverlay(node) {
          return !!(
            node &&
            node.classList &&
            node.classList.contains("popup-overlay")
          );
        }
        while (popup && !isOverlay(popup)) {
          popup = popup.parentNode;
        }
        if (isOverlay(popup)) {
          popup.style.display = "none";
        }
      });
    }

    var popupframeButton1 = document.getElementById("popupframeButton1");
    if (popupframeButton1) {
      popupframeButton1.addEventListener("click", function(e) {
        window.location.href = "/logout.php";
      });
    }

    var notifications = document.getElementById("notifications");
    if (notifications) {
      notifications.addEventListener("click", function(e) {
        window.location.href = "./empnoti.html";
      });
    }

    var attendance = document.getElementById("attendance");
    if (attendance) {
      attendance.addEventListener("click", function(e) {
        window.location.href = "./empattendance.html";
      });
    }

    var finances = document.getElementById("finances");
    if (finances) {
      finances.addEventListener("click", function(e) {
        window.location.href = "./employeefin.html";
      });
    }

    var empEnroll = document.getElementById("empEnroll");
    if (empEnroll) {
      empEnroll.addEventListener("click", function(e) {
        window.location.href = "./emp_enrl.php";
      });
    }

    var employee = document.getElementById("employee");
    if (employee) {
      employee.addEventListener("click", function(e) {
        window.location.href = "./Employee.php";
      });
    }

    var rooms = document.getElementById("rooms");
    if (rooms) {
      rooms.addEventListener("click", function(e) {
        window.location.href = "./Rooms.php";
      });
    }

    var hosteliteEnroll = document.getElementById("hosteliteEnroll");
    if (hosteliteEnroll) {
      hosteliteEnroll.addEventListener("click", function(e) {
        window.location.href = "./Host_enrl.php";
      });
    }

    var hostelite = document.getElementById("hostelite");
    if (hostelite) {
      hostelite.addEventListener("click", function(e) {
        window.location.href = "./Hostellite.php";
      });
    }

    var requests = document.getElementById("requests");
    if (requests) {
      requests.addEventListener("click", function(e) {
        window.location.href = "./Request.php";
      });
    }

    var logout = document.getElementById("logout");
    if (logout) {
      logout.addEventListener("click", function() {
        var popup = document.getElementById("logoutPopup");
        if (!popup) return;
        var popupStyle = popup.style;
        if (popupStyle) {
          popupStyle.display = "flex";
          popupStyle.zIndex = 100;
          popupStyle.backgroundColor = "rgba(113, 113, 113, 0.3)";
          popupStyle.alignItems = "center";
          popupStyle.justifyContent = "center";
        }
        popup.setAttribute("closable", "");

        var onClick =
          popup.onClick ||
          function(e) {
            if (e.target === popup && popup.hasAttribute("closable")) {
              popupStyle.display = "none";
            }
          };
        popup.addEventListener("click", onClick);
      });
    }
    var scrollAnimElements = document.querySelectorAll("[data-animate-on-scroll]");
    var observer = new IntersectionObserver(
      (entries) => {
        for (const entry of entries) {
          if (entry.isIntersecting || entry.intersectionRatio > 0) {
            const targetElement = entry.target;
            targetElement.classList.add("animate");
            observer.unobserve(targetElement);
          }
        }
      }, {
        threshold: 0.15,
      }
    );

    for (let i = 0; i < scrollAnimElements.length; i++) {
      observer.observe(scrollAnimElements[i]);
    }
  </script>
</body>

</html>