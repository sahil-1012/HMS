<?php
include '_partials\E_database.php';
$update = false;
$error = false;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (
    isset($_POST['submit']) &&
    isset($_POST['gender']) && !empty($_POST['gender'])    &&
    isset($_POST['pincode']) && !empty($_POST['pincode']) &&
    isset($_POST['designation']) && !empty($_POST['designation']) &&
    isset($_POST['acc_no']) && !empty($_POST['acc_no']) &&
    isset($_POST['ifsc']) && !empty($_POST['ifsc']) &&
    isset($_POST['dob']) && !empty($_POST['dob'])
  ) {
    $B_no = $B_id;

    $name = $_POST['name'];
    $name_parts = explode(' ', $name);
    $num_parts = count($name_parts);

    $f_name = ($num_parts >= 1) ? $name_parts[0] : '';
    $m_name = ($num_parts == 3) ? $name_parts[1] : '';
    $l_name = ($num_parts >= 2) ? $name_parts[$num_parts - 1] : ' ';

    $gender = $_POST['gender'];

    $street = $_POST['street'];
    $city = $_POST['city'] ?? null;
    $state = $_POST['state'];
    $pincode = $_POST['pincode'];

    $designation = $_POST['designation'];
    $acc_no = $_POST['acc_no'];
    $ifsc = $_POST['ifsc'];
    $dob = $_POST['dob'];

    $phone_no = $_POST['ph_no'];
    $email = $_POST['email'] ?? null;

    if (!empty($_POST['dob'])) {
      $dob = $_POST['dob'];
      $timestamp = strtotime($dob);
      $dob = date('Y-m-d', $timestamp);
    }

    $query1 = "INSERT INTO employee (B_no, F_name, M_name, L_name, gender, State, city, street, Pincode, Designation, Account_No, IFSC_Code, DOB, phone_no, emailid)
    VALUES ($B_no, '$f_name', '$m_name', '$l_name', '$gender', '$state', '$city', '$street', $pincode, '$designation', '$acc_no', '$ifsc', '$dob', $phone_no, '$email')";

    $result1 =  mysqli_query($conn, $query1);


    // ----------------------------------------------------------------------------------------------------------

    // ~ NEED TO UPDATE WITH LATEST ONE INSERTED
    $query3 = "SELECT E_ID
    FROM employee
    ORDER BY E_ID DESC
    LIMIT 1;";
    $result3 =  mysqli_query($conn, $query3);
    $new = mysqli_fetch_assoc($result3);
    $new_E_id = $new['E_ID'];


    // ------------------------------------------------------------------------------------------------
    $name_dep = $_POST['name_dep'];
    $name_parts = explode(' ', $name_dep);
    $num_parts = count($name_parts);

    $f_name = ($num_parts >= 1) ? $name_parts[0] : '';
    $m_name = ($num_parts == 3) ? $name_parts[1] : '';
    $l_name = ($num_parts >= 2) ? $name_parts[$num_parts - 1] : ' ';
    $relation = $_POST['relation'];

    $phone_no_dep = $_POST['ph_no_dep'];
    $email_dep = $_POST['email_dep'] ??  null;

    $city_dep = $_POST['city_dep'];
    $state_dep = $_POST['state_dep'];
    $street_dep = $_POST['street_dep'] ?? null;
    $pincode_dep = $_POST['pincode_dep'];

    $query2 = "INSERT INTO E_DEPENDENTS (E_no,F_name, M_name, L_name, Relation, phone_no, State, city, street, Pincode)
               VALUES ($new_E_id,'$f_name', '$m_name', '$l_name', '$relation', '$phone_no_dep', '$state_dep', '$city_dep', '$street_dep', '$pincode_dep');";

    $result2 =  mysqli_query($conn, $query2);


    // ------------------------------------------------------------------------------------------------
    $query4 = "INSERT INTO New_Employee_log (e_id, new_e_no) 
                VALUES ($E_id, $new_E_id )";
    $result4 =  mysqli_query($conn, $query4);


    // ------------------------------------------------------------------------------------------------
    if ($result1 && $result2) {
      $update = "Employee Successfully Added with E_id :" . $new_E_id;
      header("Refresh:3");
    } else {
      $error = "Please fill in all required fields";
    }
  } else {
    $error = "Please fill in all required fields";
    header("Refresh:1");
  }
}

?>
<!DOCTYPE html>
<html>



<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <link rel="stylesheet" href="./global.css" />
  <link rel="stylesheet" href="./Emp_enrl.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;600;700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Work Sans:wght@600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto Mono:wght@700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source Sans Pro:wght@400&display=swap" />
</head>

<body>
  <div id="age-alert" class="alert alert-warning" role="alert" style="display:none;position:absolute;top:0;width:100%;z-index:9999;">
    You must be at least 18 years old to register.
  </div>

  <?php
  if ($update == true) {
    echo '
    <div class="alert alert-success" role="alert">
    <strong> ' . $update . ' .... </strong>
    </div>';
  } else if ($error == true) {
    echo '<div class="alert alert-secondary" role="alert">
    <strong>' . $error . '</strong>
    </div>';
  }
  ?>
  <div class="empempenroll">
    <img class="empempenroll-child" alt="" src="./public/rectangle-1.svg" />

    <div class="vector-group">
      <img class="frame-child9" alt="" src="./public/rectangle-2.svg" />

      <b class="upload-image">Upload Image</b>
      <img class="frame-child10" alt="" src="./public/rectangle-5@2x.png" />
    </div>
    <div class="empempenroll-inner">
      <form class="frame-form" id="f-1" method="post">
        <!-- <form class="make-payment-frame" action="submit-form" method="post"> -->
        <!-- </form> -->
        <input class="input" name="street_dep" type="text" placeholder="Address Line" />

        <input class="input1" name="city_dep" type="text" placeholder="City" required />

        <input class="input2" name="state_dep" type="text" placeholder="State" required />

        <input class="input3" name="pincode_dep" type="number" placeholder="Pincode" required />

        <input class="input4" name="name_dep" type="text" placeholder="Dependents Name" required />

        <input class="input5" name="relation" type="text" placeholder="Relationship" required />

        <input class="input6" name="ph_no_dep" type="tel" minlength="10" maxlength="11" placeholder="Phone Number" required />

        <input class="input7" name="email_dep" type="email" placeholder="Email" />

        <label class="add-dependant-details">Add Dependant Details</label>
        <style>

        </style>

        <input class="input8" name="name" type="text" placeholder="Name" required />



        <script>
          const dobInput = document.getElementById("dob");
          const ageAlert = document.getElementById("age-alert");

          dobInput.addEventListener("change", function() {
            const dob = new Date(this.value);
            const today = new Date();
            const age = today.getFullYear() - dob.getFullYear();

            if (age < 18) {
              ageAlert.style.display = "block";
              this.value = "";

              setTimeout(function() {
                ageAlert.style.display = "none";
              }, 1500);
            }
          });
        </script>



        <select name="gender" class="input9" required>
          <option selected disabled style="display:none;" value=0>Gender</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <option value="Other">Other</option>
        </select>


        <input class="input10" name="street" type="text" placeholder="Address Line" required />

        <input class="input11" name="city" type="text" placeholder="City" required />

        <input class="input12" name="state" type="text" placeholder="State" required />

        <input class="input13" name="pincode" type="number" placeholder="Pincode" max="{7}" required />


        <!-- <input class="input15" name="branch" type="number" min="0" max="3" placeholder="Branch" value="<?php echo $B_id; ?>" required/> -->
        <input class="input14" name="ph_no" type="tel" minlength="10" maxlength="11" placeholder="Phone Number" required />

        <label class="myinput">Branch ID</label>
        <input class="input15" name="branch" type="number" min="0" max="3" placeholder="Branch" value="<?php echo $B_id; ?>" readonly />

        <select name="designation" class="input16" required>
          <option selected disabled style="display:none;" value=0>Designation</option>
          <option value="CLEANER">Cleaner</option>
          <option value="CHEF">Chef</option>
          <option value="STAFF">Staff</option>
          <option value="WATCHMAN">Watchman</option>
        </select>

        <input class="input17" name="email" type="email" placeholder="Email" />

        <label class="myinput2">Date of Birth:</label>
        <input class="input18" name="dob" type="date" id="dob" min="<?php echo date('Y-m-d', strtotime('-18 years')); ?>" required />

        <input class="input19" name="acc_no" type="text" placeholder="Bank Account Number" maxlength="{18}" required />

        <input class="input20" name="ifsc" type="text" placeholder="IFSC" maxlength="{11}" required />

        <!-- <input class="input21" name="ifsc" type="text" placeholder="IFSC" maxlength="{11}" required /> -->


        <?php
        $query3 = "SELECT E_ID
            FROM employee
            ORDER BY E_ID DESC
            LIMIT 1;";
        $result3 =  mysqli_query($conn, $query3);
        $new = mysqli_fetch_assoc($result3);
        $new_E_id = $new['E_ID'];
        ?>

        <div class="name-parent13">
          <label class="name17">New Employee ID</label>
          <span class="tomiwa-oyeledu-dolapo18"><?php echo $new_E_id + 1 . "*"  ?></span>
        </div>


        <label class="add-employee">Add Employee</label>
        <button name="submit" type="submit" form="f-1" class="make-payment"><span>Submit Details </span> </button>
      </form>
    </div>


    <div class="menu-emp5">

      <button class="notifications11" id="notifications">
        <img class="vector-icon38" alt="" src="./public/vector111.svg" />

        <label class="notifications12">Notifications</label>
      </button>
      <button class="attendance11" id="attendance">
        <label class="notifications12">Attendance</label>
        <img class="vector-icon39" alt="" src="./public/vector1.svg" />
      </button>
      <button class="finances10" id="finances">
        <label class="finances11">Finances</label>
        <img class="vector-icon40" alt="" src="./public/vector2.svg" />
      </button>
      <button class="emp-enroll4">
        <div class="emp-enroll-child"></div>
        <label class="employee-enrollment6">Employee Enrollment</label>
        <img class="vector-icon41" alt="" src="./public/vector12.svg" />
      </button>
      <button class="employee10" id="employee">
        <label class="employee11">Employee</label>
        <img class="employee-child3" alt="" src="./public/group-104.svg" />
      </button>
      <button class="rooms10" id="rooms">
        <label class="rooms11">Rooms</label>
        <img class="rooms-child3" alt="" src="./public/group-103.svg" />
      </button>
      <button class="hostelite-enroll5" id="hosteliteEnroll">
        <label class="hostelite-enrollment5">Hostelite Enrollment</label>
        <img class="vector-icon42" alt="" src="./public/vector4.svg" />
      </button>
      <button class="hostelite10" id="hostelite">
        <label class="hostelite11">Hostelite</label>
        <img class="hostelite-child3" alt="" src="./public/group-105.svg" />
      </button>
      <button class="requests10" id="requests">
        <label class="requests11">Requests</label>
        <img class="icon-tasks5" alt="" src="./public/icontasks.svg" />
      </button>
      <button class="home11" id="home">
        <img class="icon-home5" alt="" src="./public/iconhome1.svg" />

        <img class="vector-icon43" alt="" src="./public/vector51.svg" />

        <label class="home12">Home</label>
      </button>
      <div class="account-officer5">
        <img class="account-officer-child3" alt="" src="./public/ellipse-19.svg" id="ellipseImage" data-animate-on-scroll />

        <div class="anna-george-parent3">
          <h1 class="anna-george5"><?php echo $row['F_name']  . " " . $row['L_name'] ?></h1>
          <?php $bname_fl = substr($row_branch['B_name'], 0, 1)  ?>
          <span class="customer-operations5"><?php echo 'E' . $bname_fl . ' - ' . $E_id ?></span>
        </div>

      </div>
      <button class="logout11" id="logout">
        <img class="vector-icon44" alt="" src="./public/vector11.svg" />

        <div class="logout12">Logout</div>
        <div class="logout-child3"></div>
      </button>
    </div>
  </div>

  <div id="logoutPopup" class="popup-overlay" style="display: none">
    <div class="logout" data-animate-on-scroll>
      <div class="do-you-want-to-logout">
        <h1 class="do-you-want">Do you want to Logout?</h1>
      </div>
      <button class="make-payment-wrapper" id="popupframeButton">
        <h2 class="make-payment">No</h2>
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

    var home = document.getElementById("home");
    if (home) {
      home.addEventListener("click", function(e) {
        window.location.href = "./E_home.php";
      });
    }

    var ellipseImage = document.getElementById("ellipseImage");
    if (ellipseImage) {
      ellipseImage.addEventListener("click", function(e) {
        window.location.href = "./E_home.php";
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