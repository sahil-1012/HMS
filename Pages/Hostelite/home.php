<?php

include '_partials\database.php';

?>
<!DOCTYPE html>
<html>


<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <link rel="stylesheet" href="./global.css" />
  <link rel="stylesheet" href="./home.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Work Sans:wght@600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;600;700&display=swap" />
</head>



  <body>

    <div class="home-pg">
      <div class="home-pg-inner">
        <img class="frame-item" alt="" src="./public/rectangle-11.svg" />
      </div>

      <div class="work-details1">
        <div class="frame-div">
          <h3 class="name17">Profession</h3>
          <span class="tomiwa-oyeledu-dolapo18"><?php echo $row['WORK']; ?></span>
        </div>
        <h2 class="additional-details">Work Details</h2>
      </div>

      <div class="fee">
        <label class="fee-details">Fee details</label>
        <div class="instance-parent">
          <div class="name-parent1">
            <h3 class="name17">Fees</h3>
            <span class="tomiwa-oyeledu-dolapo18">100000</span>
          </div>
          <div class="name-parent1">
            <h3 class="name17">Current Status</h3>
            <span class="tomiwa-oyeledu-dolapo18">Paid</span>

            <!-- // ****** Note : REMOVED ONE EXTRA PHONE NUMBER FROM HERE -->
          </div>
        </div>
      </div>


      <div class="guardian-details1">
        <div class="instance-group">
          <div class="name-parent4">
            <h3 class="name17">Address</h3>
            <span class="tomiwa-oyeledu-dolapo18"><?php echo $row_dep['city'] . " " . $row_dep['State']; ?></span>
          </div>
          <div class="name-parent5">
            <h3 class="name17">Name</h3>
            <span class="tomiwa-oyeledu-dolapo18"><?php echo $row_dep['F_name'] .  " " . $row_dep['M_name'] . " " . $row_dep['L_name'] ?></span>
          </div>
          <div class="name-parent6">
            <h3 class="name17">Relationship</h3>
            <span class="tomiwa-oyeledu-dolapo18"><?php echo $row_dep['Relation']; ?></span>
          </div>
          <div class="name-parent7">
            <h3 class="name17">Phone no</h3>
            <span class="tomiwa-oyeledu-dolapo18"><?php echo $row_dep['phone_no']; ?></span>
          </div>
        </div>
        <h2 class="additional-details">Guardian details</h2>
      </div>

      <div class="additional">
        <div class="instance-container">
          <div class="name-parent1">
            <h3 class="name17">Date Of Join</h3>
            <span class="tomiwa-oyeledu-dolapo18"><?php echo $row_bel['Date_of_Join']; ?></span>
          </div>
          <div class="name-parent1">
            <h3 class="name17">Valid Till</h3>
            <span class="tomiwa-oyeledu-dolapo18"><?php echo $row_bel['Date_of_Leave']; ?></span>
          </div>
        </div>
        <h2 class="additional-details">Additional details</h2>
      </div>


      <div class="contact-details1">
        <div class="instance-parent1">
          <div class="name-parent1">
            <h3 class="name17">Phone Number</h3>
            <span class="tomiwa-oyeledu-dolapo18"><?php echo $row['phone_number']; ?></span>
          </div>
          <div class="name-parent1">
            <h3 class="name17">Email</h3>
            <span class="tomiwa-oyeledu-dolapo18"><?php echo $row['Email_id']; ?></span>
          </div>
        </div>
        <h2 class="additional-details">Contact Details</h2>
      </div>


      <div class="address1">
        <div class="instance-parent1">
          <div class="name-parent1">
            <h3 class="name17">Address Line</h3>
            <span class="tomiwa-oyeledu-dolapo18"><?php echo $row['street']; ?></span>
          </div>
          <div class="name-parent1">
            <h3 class="name17">City</h3>
            <span class="tomiwa-oyeledu-dolapo18"><?php echo $row['city']; ?></span>
          </div>
          <div class="name-parent1">
            <h3 class="name17">State</h3>
            <span class="tomiwa-oyeledu-dolapo18"><?php echo $row['State']; ?></span>
          </div>
          <div class="name-parent1">
            <h3 class="name17">Pincode</h3>
            <span class="tomiwa-oyeledu-dolapo18"><?php echo $row['Pincode']; ?></span>
          </div>
        </div>
        <h2 class="additional-details">Address</h2>
      </div>


      <div class="dask-info">
        <div class="instance-parent3">
          <div class="name-parent16">
            <h3 class="name17">Branch</h3>

            <?php
            $query = 'SELECT B_name FROM BRANCH WHERE B_id =' . $B_id;
            $result = mysqli_query($conn, $query);
            $bname = mysqli_fetch_assoc($result);
            ?>

            <span class="tomiwa-oyeledu-dolapo18"><?php echo $bname['B_name']  ?></span>
          </div>
          <div class="name-parent17">
            <h3 class="name17">Room no</h3>
            <span class="tomiwa-oyeledu-dolapo18"><?php echo $row_bel['R_no']; ?></span>
          </div>
          <div class="name-parent18">
            <h3 class="name17">Manager Name</h3>

            <?php
            $query = "SELECT employee.F_name, employee.L_name 
            FROM employee 
            JOIN branch ON employee.E_ID = branch.Mgr_id 
            WHERE branch.B_id = (SELECT B_no FROM belongs_to WHERE H_no = $H_id);";
            $result = mysqli_query($conn, $query);
            $row_man = mysqli_fetch_assoc($result);
            ?>

            <span class="tomiwa-oyeledu-dolapo18"><?php echo $row_man['F_name'] . " " . $row_man['L_name']; ?></span>
          </div>
          <div class="name-parent19">
            <h3 class="name17">Bed no</h3>
            <span class="tomiwa-oyeledu-dolapo18"><?php echo $row_bel['B_no']; ?></span>
          </div>
        </div>
        <h2 class="dask-info1">DASK Info</h2>
      </div>

      <div class="personal-details1">
        <h2 class="personal-details2">Personal Details</h2>
        <img class="personal-details-child" alt="" src="./public/rectangle-111.svg" />
        <div class="component-parent">
          <div class="name-parent1">
            <h3 class="name17">Name</h3>
            <span class="tomiwa-oyeledu-dolapo18"><?php echo $row['F_name'] .  " " . $row['M_name'] . " " . $row['L_name'] ?></span>
          </div>
          <div class="name-parent1">
            <h3 class="name17">Hostel ID</h3>
            <span class="tomiwa-oyeledu-dolapo18"><?php echo $row['H_id']; ?></span>
          </div>
          <div class="name-parent1">
            <h3 class="name17">Date of Birth</h3>
            <span class="tomiwa-oyeledu-dolapo18"><?php echo $row['DOB']; ?></span>
          </div>
          <div class="name-parent1">
            <h3 class="name17">Gender</h3>
            <span class="tomiwa-oyeledu-dolapo18"><?php echo $row['gender']; ?></span>
          </div>
        </div>

      </div>


      <div class="menu-home">
        <div class="menu1">
          <button class="logout3" id="logout">
            <img class="vector-icon5" alt="" src="./public/vector.svg" />

            <a class="logout4">Logout</a>
            <div class="logout-item"></div>
          </button>
          <button class="notifications2">
            <img class="vector-icon6" alt="" src="./public/vector11.svg" />

            <a class="notifications3">Notifications</a>
          </button>
          <img class="line-2-11" alt="" src="./public/line-2-1.svg" />

          <button class="attendance2" id="attendance">
            <img class="vector-icon7" alt="" src="./public/vector3.svg" />
            <a class="attendance3">Attendance</a>
          </button>

          <button class="payments2" id="payments">
            <img class="vector-icon8" alt="" src="./public/vector4.svg" />
            <a class="payments3">Payments</a>
          </button>

          <button class="requests2" id="requests">
            <a class="requests3">Requests</a>
            <img class="icon-msg1" alt="" src="./public/iconmsg.svg" />
          </button>

          <button class="services2" id="services">
            <img class="icon-tasks1" alt="" src="./public/icontasks.svg" />

            <a class="services3">Services</a>
          </button>
          <button class="update2" id="update">
            <a class="update-details1">Update Details</a>
            <img class="icon-setting1" alt="" src="./public/iconsetting1.svg" />
          </button>
          <button class="home2">
            <img class="vector-icon9" alt="" src="./public/vector2.svg" />

            <div class="home-child"></div>
            <a class="home3">Home</a>
            <img class="icon-home1" alt="" src="./public/iconhome1.svg" />
          </button>
          <div class="account-officer1">
            <img class="account-officer-item" alt="" src="./public/ellipse-11.svg" data-animate-on-scroll />

            <div class="anna-george-group ">
              <b class="anna-george1"><?php echo $row['F_name'] .  " " . $row['M_name'] . " " . $row['L_name'] ?></b>
              <?php $bname_fl = substr($bname['B_name'], 0, 1)  ?>
              <span class="customer-operations1"><?php echo 'H' . $bname_fl . ' - ' . $row['H_id'] ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="logoutPopup" class="popup-overlay" style="display: none">
      <div class="logout2" data-animate-on-scroll>
        <h1 class="do-you-want">Do you want to Logout?</h1>
        <button class="make-payment-container" id="popupframeButton">
          <h2 class="make-payment1">NO</h2>
        </button>
        <button class="make-payment-frame" id="popupframeButton1">
          <h2 class="make-payment2">Yes</h2>
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
        window.location.href = "./logout.php";
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

    var attendance = document.getElementById("attendance");
    if (attendance) {
      attendance.addEventListener("click", function(e) {
        window.location.href = "/attendance.php";
      });
    }

    var payments = document.getElementById("payments");
    if (payments) {
      payments.addEventListener("click", function(e) {
        window.location.href = "./payments.php";
      });
    }

    var requests = document.getElementById("requests");
    if (requests) {
      requests.addEventListener("click", function(e) {
        // Please sync "request" to the project
        window.location.href = "/request.php";

      });
    }

    var services = document.getElementById("services");
    if (services) {
      services.addEventListener("click", function(e) {
        window.location.href = "/services.php";
      });
    }

    var update = document.getElementById("update");
    if (update) {
      update.addEventListener("click", function(e) {
        window.location.href = "./update.php";
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