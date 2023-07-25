<?php
include '_partials\E_database.php';

// $query = "SELECT * FROM rooms WHERE B_no = $B_id;";

$query = "SELECT COUNT(*) as total_rooms FROM rooms WHERE B_no = $B_id;";
$result = mysqli_query($conn, $query);
$row_rooms = mysqli_fetch_assoc($result);
$total_rooms = $row_rooms['total_rooms'];

$query = "SELECT COUNT(*) as single_rooms FROM rooms WHERE B_no = $B_id AND R_Type = 'SINGLE';";
$result = mysqli_query($conn, $query);
$row_rooms = mysqli_fetch_assoc($result);
$single_rooms = $row_rooms['single_rooms'];

$query = "SELECT COUNT(*) as double_rooms FROM rooms WHERE B_no = $B_id AND R_Type = 'DOUBLE';";
$result = mysqli_query($conn, $query);
$row_rooms = mysqli_fetch_assoc($result);
$double_rooms = $row_rooms['double_rooms'];

$query = "SELECT COUNT(*) as total_students FROM belongs_to WHERE B_no = $B_id;";
$result = mysqli_query($conn, $query);
$row_students = mysqli_fetch_assoc($result);
$total_students = $row_students['total_students'];

$query_total_beds = "SELECT SUM(Bed_no) as total_beds FROM rooms WHERE B_no = $B_id;";
$result_total_beds = mysqli_query($conn, $query_total_beds);
$row_total_beds = mysqli_fetch_assoc($result_total_beds);
$total_beds = $row_total_beds['total_beds'];

// Get number of occupied beds in the hostel
$query_occupied_beds = "SELECT COUNT(*) as occupied_beds FROM rooms WHERE B_no = $B_id AND BED_STATUS = 'OCCUPIED';";
$result_occupied_beds = mysqli_query($conn, $query_occupied_beds);
$row_occupied_beds = mysqli_fetch_assoc($result_occupied_beds);
$occupied_beds = $row_occupied_beds['occupied_beds'];

// Calculate number of vacant beds
$vacant_beds = $total_beds - $occupied_beds;

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <link rel="stylesheet" href="./global.css" />
  <link rel="stylesheet" href="./Rooms.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;600;700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Work Sans:wght@600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto Mono:wght@700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source Sans Pro:wght@400&display=swap" />
</head>

<body>
  <div class="emprooms">
    <img class="emprooms-child" alt="" src="./public/rectangle-12.svg" />

    <div class="account-officer6">
      <img class="account-officer-child4" alt="" src="./public/ellipse-110@2x.png" />

      <!-- <div class="anna-george-parent4">
        <div class="anna-george6">Select Branch</div>
        <div class="customer-operations6">Customer Operations</div>
      </div> -->
      <!-- <img class="chevron-up-icon" alt="" src="./public/chevronup.svg" /> -->
    </div>
    <div class="frame-parent3">
      <div class="parent">
        <span class="span1">306</span>
        <div class="vector-container">
          <img class="vector-icon45" alt="" src="./public/vector13.svg" />

          <img class="vector-icon46" alt="" src="./public/vector13.svg" />
        </div>
      </div>
      <div class="group">
        <span class="span1">305</span>
        <div class="vector-container">
          <img class="vector-icon45" alt="" src="./public/vector13.svg" />

          <img class="vector-icon46" alt="" src="./public/vector13.svg" />
        </div>
      </div>
      <div class="container">
        <span class="span1">304</span>
        <div class="rectangle-parent">
          <div class="frame-child11"></div>
          <img class="vector-icon49" alt="" src="./public/vector14.svg" />
        </div>
      </div>
      <div class="parent1">
        <span class="span1">303</span>
        <div class="rectangle-parent">
          <div class="frame-child11"></div>
          <img class="vector-icon49" alt="" src="./public/vector14.svg" />
        </div>
      </div>
      <div class="parent2">
        <span class="span1">302</span>
        <div class="vector-parent2">
          <img class="vector-icon51" alt="" src="./public/vector14.svg" />

          <img class="vector-icon46" alt="" src="./public/vector13.svg" />
        </div>
      </div>
      <div class="parent3">
        <span class="span1">301</span>
        <div class="vector-parent3">
          <img class="vector-icon53" alt="" src="./public/vector14.svg" />

          <img class="vector-icon54" alt="" src="./public/vector14.svg" />
        </div>
      </div>
      <label class="third">Third </label>
    </div>
    <div class="frame-parent4">
      <div class="parent4">
        <span class="span1">206</span>
        <div class="vector-container">
          <img class="vector-icon45" alt="" src="./public/vector13.svg" />

          <img class="vector-icon46" alt="" src="./public/vector13.svg" />
        </div>
      </div>

      <div class="parent5">
        <span class="span1">205</span>
        <div class="vector-container">
          <img class="vector-icon45" alt="" src="./public/vector13.svg" />
          <img class="vector-icon46" alt="" src="./public/vector13.svg" />
        </div>
      </div>

      <div class="parent6">
        <span class="span1">204</span>
        <div class=" rectangle-parent frame-child11">
          <img class="vector-icon49" alt="" src="./public/vector14.svg" />
        </div>
      </div>

      <div class="parent7">
        <span class="span1">203</span>
        <div class="rectangle-parent">
          <div class="frame-child11"></div>
          <img class="vector-icon49" alt="" src="./public/vector14.svg" />
        </div>
      </div>

      <div class="parent8">
        <span class="span1">202</span>
        <div class="vector-parent3">
          <img class="vector-icon53" alt="" src="./public/vector14.svg" />
          <img class="vector-icon54" alt="" src="./public/vector14.svg" />
        </div>
      </div>

      <div class="parent9">
        <span class="span1">201</span>
        <div class="vector-parent3">
          <img class="vector-icon53" alt="" src="./public/vector14.svg" />
          <img class="vector-icon54" alt="" src="./public/vector14.svg" />
        </div>
      </div>
      <label class="second">Second </label>
    </div>

    <div class="frame-parent5">
      <div class="parent4">
        <span class="span1">106</span>
        <div class="vector-container">
          <img class="vector-icon45" alt="" src="./public/vector13.svg" />

          <img class="vector-icon46" alt="" src="./public/vector13.svg" />
        </div>
      </div>
      <div class="parent5">
        <span class="span1">105</span>
        <div class="vector-parent2">
          <img class="vector-icon67" alt="" src="./public/vector13.svg" />

          <img class="vector-icon68" alt="" src="./public/vector14.svg" />
        </div>
      </div>
      <div class="parent6">
        <span class="span1">104</span>
        <div class="rectangle-parent">
          <div class="frame-child11"></div>
          <img class="vector-icon49" alt="" src="./public/vector14.svg" />
        </div>
      </div>
      <div class="parent7">
        <span class="span1">103</span>
        <div class="rectangle-parent">
          <div class="frame-child11"></div>
          <img class="vector-icon49" alt="" src="./public/vector14.svg" />
        </div>
      </div>
      <div class="parent8">
        <span class="span1">102</span>
        <div class="vector-parent3">
          <img class="vector-icon53" alt="" src="./public/vector14.svg" />

          <img class="vector-icon54" alt="" src="./public/vector14.svg" />
        </div>
      </div>
      <div class="parent9">
        <span class="span1">101</span>
        <div class="vector-parent3">
          <img class="vector-icon53" alt="" src="./public/vector14.svg" />

          <img class="vector-icon54" alt="" src="./public/vector14.svg" />
        </div>
      </div>
      <label class="first">First</label>
    </div>
    <div class="frame-parent6">
      <div class="parent">
        <span class="span1">006</span>
        <div class="vector-container">
          <img class="vector-icon45" alt="" src="./public/vector13.svg" />

          <img class="vector-icon46" alt="" src="./public/vector13.svg" />
        </div>
      </div>
      <div class="group">
        <span class="span1">005</span>
        <div class="vector-container">
          <img class="vector-icon45" alt="" src="./public/vector13.svg" />

          <img class="vector-icon46" alt="" src="./public/vector13.svg" />
        </div>
      </div>
      <div class="container">
        <span class="span1">004</span>
        <div class="vector-container">
          <img class="vector-icon45" alt="" src="./public/vector13.svg" />

          <img class="vector-icon46" alt="" src="./public/vector13.svg" />
        </div>
      </div>
      <div class="parent1">
        <span class="span1">003</span>
        <div class="vector-parent3">
          <img class="vector-icon53" alt="" src="./public/vector14.svg" />

          <img class="vector-icon54" alt="" src="./public/vector14.svg" />
        </div>
      </div>
      <div class="parent2">
        <span class="span1">002</span>
        <div class="vector-parent3">
          <img class="vector-icon53" alt="" src="./public/vector14.svg" />

          <img class="vector-icon54" alt="" src="./public/vector14.svg" />
        </div>
      </div>
      <div class="parent3">
        <span class="span1">001</span>
        <div class="vector-parent3">
          <img class="vector-icon53" alt="" src="./public/vector14.svg" />

          <img class="vector-icon54" alt="" src="./public/vector14.svg" />
        </div>
      </div>
      <label class="first">Ground</label>
    </div>
    <img class="emprooms-item" alt="" src="./public/line-3.svg" />

    <div class="instance-container">
      <div class="name-parent14">
        <label class="name18">Number of rooms</label>
        <span class="tomiwa-oyeledu-dolapo19"><?php echo $total_rooms  ?></span>
      </div>
      <div class="name-parent15">
        <label class="name18">Single Room</label>
        <span class="tomiwa-oyeledu-dolapo19"><?php echo $single_rooms  ?></span>
      </div>
      <div class="name-parent16">
        <label class="name18">Double Rooms</label>
        <span class="tomiwa-oyeledu-dolapo19"><?php echo $double_rooms  ?></span>
      </div>
      <div class="name-parent17">
        <label class="name18">Total Students</label>
        <span class="tomiwa-oyeledu-dolapo19"><?php echo $total_students  ?></span>
      </div>
      <div class="name-parent18">
        <label class="name18" style="width:145px">Vacant Beds</label>
        <span class="tomiwa-oyeledu-dolapo19"><?php echo $vacant_beds  ?></span>
      </div>
    </div>
    <img class="emprooms-inner" alt="" src="./public/line-2.svg" />

    <div class="rooms12">Rooms</div>
    <div class="menu-emp6">
      <button class="logout13" id="logout">
        <img class="vector-icon87" alt="" src="./public/vector11.svg" />

        <div class="logout14">Logout</div>
        <div class="logout-child4"></div>
      </button>
      <button class="notifications13" id="notifications">
        <img class="vector-icon88" alt="" src="./public/vector111.svg" />

        <label class="notifications14">Notifications</label>
      </button>
      <button class="attendance13" id="attendance">
        <label class="notifications14">Attendance</label>
        <img class="vector-icon89" alt="" src="./public/vector1.svg" />
      </button>
      <button class="finances12" id="finances">
        <label class="finances13">Finances</label>
        <img class="vector-icon90" alt="" src="./public/vector2.svg" />
      </button>
      <button class="employee-enroll" id="employeeEnroll">
        <label class="employee-enrollment7">Employee Enrollment</label>
        <img class="vector-icon91" alt="" src="./public/vector3.svg" />
      </button>
      <button class="employee12" id="employee">
        <label class="employee13">Employee</label>
        <img class="employee-child4" alt="" src="./public/group-104.svg" />
      </button>
      <button class="rooms13">
        <div class="rooms-child4"></div>
        <label class="rooms14">Rooms</label>
        <img class="rooms-child5" alt="" src="./public/group-1031.svg" />
      </button>
      <button class="hostelite-enroll6" id="hosteliteEnroll">
        <img class="vector-icon92" alt="" src="./public/vector4.svg" />

        <label class="hostelite-enrollment6">Hostelite Enrollment</label>
      </button>
      <button class="hostelite12" id="hostelite">
        <label class="hostelite13">Hostelite</label>
        <img class="hostelite-child4" alt="" src="./public/group-105.svg" />
      </button>
      <button class="requests12" id="requests">
        <label class="requests13">Requests</label>
        <img class="icon-tasks6" alt="" src="./public/icontasks.svg" />
      </button>
      <button class="home13" id="home">
        <img class="icon-home6" alt="" src="./public/iconhome1.svg" />

        <img class="vector-icon93" alt="" src="./public/vector51.svg" />

        <label class="home14">Home</label>
      </button>
      <div class="account-officer7">
        <img class="account-officer-child5" alt="" src="./public/ellipse-111.svg" id="ellipseImage1" data-animate-on-scroll />

        <div class="anna-george-parent5">
          <h1 class="anna-george7">Anna George</h1>
          <span class="customer-operations7">EN-001</span>
        </div>
      </div>
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
        window.location.href = "./login.html";
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

    var employeeEnroll = document.getElementById("employeeEnroll");
    if (employeeEnroll) {
      employeeEnroll.addEventListener("click", function(e) {
        window.location.href = "./Emp_enrl.php";
      });
    }

    var employee = document.getElementById("employee");
    if (employee) {
      employee.addEventListener("click", function(e) {
        window.location.href = "./Employee.php";
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

    var home = document.getElementById("home");
    if (home) {
      home.addEventListener("click", function(e) {
        window.location.href = "./E_Home.php";
      });
    }

    var ellipseImage1 = document.getElementById("ellipseImage1");
    if (ellipseImage1) {
      ellipseImage1.addEventListener("click", function(e) {
        window.location.href = "./E_Home.php";
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