<?php
include '_partials\E_database.php';
$update = false;
$error = false;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (isset($_POST['submit'])) {
    // Begin transaction
    mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);
    try {
      $B_no = $B_id;

      $name = $_POST['name'];
      $name_parts = explode(' ', $name);
      $num_parts = count($name_parts);

      $f_name = ($num_parts >= 1) ? $name_parts[0] : '';
      $m_name = ($num_parts == 3) ? $name_parts[1] : '';
      $l_name = ($num_parts >= 2) ? $name_parts[$num_parts - 1] : ' ';

      $street = $_POST['street'];
      $city = $_POST['city'] ?? null;
      $state = $_POST['state'];
      $pincode = $_POST['pincode'];

      $phone_no = $_POST['phone_no'];
      $email = $_POST['email'] ?? null;
      $gender = $_POST['gender'];
      $work = $_POST['work'] ?? null;

      $dob = $_POST['dob'];
      if (!empty($_POST['dob'])) {
        $dob = $_POST['dob'];
        $timestamp = strtotime($dob);
        $dob = date('Y-m-d', $timestamp);
      }


      // ~ Insert values into the hostelites table
      $sql = "INSERT INTO hostelites (F_name, M_name, L_name, Email_id, gender, DOB, WORK, State, city, street, Pincode, phone_number)
              VALUES ('$f_name', '$m_name', '$l_name', '$email', '$gender', '$dob', '$work', '$state', '$city', '$street', $pincode, $phone_no)";

      $result = mysqli_query($conn, $sql);
      $inserted_id = $conn->insert_id;

      // --------------------------------------------------------------------------------------------------------------------
      $room_no = $_POST['room_no'];
      $bed_no = $_POST['bed_no'];
      $payment_amount = $_POST['rent'];

      // ~ Get rent for the selected room
      $sql2 = "SELECT Rent FROM rooms WHERE R_ID = $room_no AND B_no = $B_id";
      $result_2 = mysqli_query($conn, $sql2);

      if ($result_2) {
        $row = mysqli_fetch_assoc($result_2);
        $rent = $row["Rent"];
      } else {
        echo "Error: " . $sql2 . "<br>" . $conn->error;
      }

      // ~ Calculate installment amount, total installments, next installment date, and payment status

      $calculated_rent = 2 * $rent / 3;
      $two_third = number_format($calculated_rent, 2);

      $calculated_rent =  $rent / 3;
      $one_third = number_format($calculated_rent, 2);

      if ($payment_amount === $rent) {
        $total_installments = 0;
        $next_installment_date = NULL;
        $payment_status = 'Paid';
      } elseif ($payment_amount === $two_third) {

        $total_installments = 1;
        $next_installment_date = date('Y-m-d', strtotime('+8 months'));
        $payment_status = '2nd Paid';
      } elseif ($payment_amount === $one_third) {

        $total_installments = 2;
        $next_installment_date = date('Y-m-d', strtotime('+4 months'));
        $payment_status = '1st Paid';
      }
      // -----------------------------------------------------------------------------------------
      // ~ Insert values into the H_Payment table
      if ($next_installment_date) {
        $sql3 = "INSERT INTO h_PAYMENT (H_no, Payment_Status, Amount_paid, Next_Installment_Date, Installments_Left)
        VALUES ($inserted_id, '$payment_status', $payment_amount, '$next_installment_date', $total_installments)";
      } else {
        $sql3 = "INSERT INTO h_PAYMENT (H_no, Payment_Status, Amount_paid, Installments_Left)
        VALUES ($inserted_id, '$payment_status', $payment_amount, $total_installments)";
      }

      $result_3 = mysqli_query($conn, $sql3);

      // ---------------------------------------------------------------------------------------


      // ~ UPDATE ROOM STATUS
      $query6 = "UPDATE ROOMS
                SET BED_STATUS = 'OCCUPIED'
                WHERE R_ID = $room_no AND B_no = $B_no AND Bed_no = $bed_no;";
      $result_6 =  mysqli_query($conn, $query6);


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
      $street_dep = $_POST['street_dep'];
      $pincode_dep = $_POST['pincode_dep'];


      // -------------------------------------------------------------------------------------
      $query4 = "INSERT INTO H_DEPENDENTS (H_no,F_name, M_name, L_name, Relation, phone_no, State, city, street, Pincode)
               VALUES ($inserted_id ,'$f_name', '$m_name', '$l_name', '$relation', '$phone_no_dep', '$state_dep', '$city_dep', '$street_dep', '$pincode_dep');";

      $result_4 =  mysqli_query($conn, $query4);

      // ------------------------------------------------------------------------------------------------
      $query5 = "INSERT INTO New_Hostelite_log (e_id, new_H_no) 
                VALUES ($E_id, $inserted_id )";
      $result_5 =  mysqli_query($conn, $query5);

      
    } catch (Exception $e) {
      // Rollback transaction
      mysqli_rollback($conn);

      $error = "An error occurred: " . $e->getMessage();
      header("Refresh:3");
    }
  } else {
    $error = "Please fill in all required fields";
    header("Refresh:3");
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <link rel="stylesheet" href="./global.css" />
  <link rel="stylesheet" href="./Host_enrl.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;600;700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Work Sans:wght@600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto Mono:wght@700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source Sans Pro:wght@400&display=swap" />
</head>

<body>
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
  <div class="emphosenroll">
    <img class="emphosenroll-child" alt="" src="./public/rectangle-1.svg" />

    <div class="emphosenroll-inner">
      <form class="frame-parent7" method="post">
        <button name="submit" type="submit" class="make-payment-new">Submit Details</button>

        <input class="input23" name="street_dep" type="text" placeholder="Address Line" />

        <input class="input24" name="city_dep" type="text" placeholder="City" />

        <input class="input25" name="state_dep" type="text" placeholder="State" />

        <input class="input26" name="pincode_dep" type="number" placeholder="Pincode" />

        <input class="input27" name="name_dep" type="text" placeholder="Guardian Name" />

        <input class="input28" name="relation" type="text" placeholder="Relationship" />

        <input class="input29" name="ph_no_dep" type="tel" placeholder="Phone Number" />

        <input class="input30" name="email_dep" type="email" placeholder="Email" />

        <label class="add-guardian-details">Add Guardian Details</label>

        <input class="input31" name="name" type="text" placeholder="Name" />

        <!-- <input class="input32" name="dob"  type="date" placeholder="DOB" /> -->
        <input class="input32" name="dob" type="date" placeholder="DOB" max="<?php echo date('Y-m-d', strtotime('-18 years')); ?>" />


        <input class="input33" name="street" type="text" placeholder="Address Line" />

        <input class="input34" name="city" type="text" placeholder="City" />

        <input class="input35" name="state" type="text" placeholder="State" />

        <input class="input36" name="pincode" type="number" placeholder="Pincode" max="{7}" />

        <select name="gender" class="input37" required>
          <option selected disabled style="display:none;" value=0>Gender</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <option value="Other">Other</option>
        </select>

        <input class="input38 input-39" name="branch" value="<?php echo $B_id ?>" type="text" readonly placeholder="Branch" />


        <label class="text-39"> Branch no</label>

        <select class="input38" name="room_type" style="cursor: pointer;" onclick="console.log(this.value)" onchange="getAvailableRooms()">
          <option value=0 disabled style="display: none;" selected>Select the Room Type</option>
          <option value="SINGLE">Single</option>
          <option value="DOUBLE">Double</option>
        </select>

        <select class="input39" name="room_no" id="room_no" style="cursor: pointer;" onclick="console.log(this.value)" onchange="getAvailableBeds()">
          <option value=0 disabled style="display: none;" selected>Select the Room no</option>
        </select>

        <select class="input40" name="bed_no" id="bed_no" onclick="console.log(this.value)" onchange="getRent()" style="cursor: pointer;">
          <option value=0 disabled style="display: none;" selected>Select the Bed no</option>
        </select>


        <input class="input41" name="phone_no" type="tel" placeholder="Phone Number" maxlength="{12}" />

        <input class="input42" name="email" type="email" placeholder="Email" />

        <input class="input43" name="work" type="text" placeholder="Profession" />


        <select class="input44" name="rent" id="rent" onclick="console.log(this.value)" style="cursor: pointer;">
          <option value=0 disabled style="display: none;" selected>Rent</option>
        </select>


        <div class="name-parent19">

          <?php
          $query3 = "SELECT H_id
            FROM hostelites
            ORDER BY H_ID DESC
            LIMIT 1;";
          $result3 =  mysqli_query($conn, $query3);
          $new = mysqli_fetch_assoc($result3);
          $new_H_id = $new['H_id'];
          ?>
          <label class="name23">New Hostelite ID</label>
          <div class="tomiwa-oyeledu-dolapo24"><?php echo $new_H_id + 1 . "*"  ?></div>

        </div>
        <label class="add-hostelite">Add Hostelite</label>
      </form>
    </div>
    <!-- <form class="vector-parent18" method="post">
      <img class="frame-child17" alt="" src="./public/rectangle-2.svg" />

      <b class="upload-image1">Upload Image</b>
      <img class="frame-child18" alt="" src="./public/rectangle-5@2x.png" />
    </form> -->
    <div class="menu-emp8">
      <button class="notifications17" id="notifications">
        <img class="vector-icon101" alt="" src="./public/vector111.svg" />

        <label class="notifications18">Notifications</label>
      </button>
      <button class="attendance17" id="attendance">
        <label class="notifications18">Attendance</label>
        <img class="vector-icon102" alt="" src="./public/vector1.svg" />
      </button>
      <button class="finances16" id="finances">
        <label class="finances17">Finances</label>
        <img class="vector-icon103" alt="" src="./public/vector2.svg" />
      </button>
      <button class="employee-enroll1" id="employeeEnroll">
        <label class="employee-enrollment9">Employee Enrollment</label>
        <img class="vector-icon104" alt="" src="./public/vector3.svg" />
      </button>
      <button class="employee16" id="employee">
        <label class="employee17">Employee</label>
        <img class="employee-child7" alt="" src="./public/group-104.svg" />
      </button>
      <button class="rooms17" id="rooms">
        <label class="rooms18">Rooms</label>
        <img class="rooms-child7" alt="" src="./public/group-103.svg" />
      </button>
      <button class="hostelite-enroll8">
        <div class="hostelite-enroll-child"></div>
        <label class="hostelite-enrollment8">Hostelite Enrollment</label>
        <img class="vector-icon105" alt="" src="./public/vector15.svg" />
      </button>
      <button class="hostelite16" id="hostelite">
        <label class="hostelite17">Hostelite</label>
        <img class="hostelite-child6" alt="" src="./public/group-105.svg" />
      </button>
      <button class="requests16" id="requests">
        <label class="requests17">Requests</label>
        <img class="icon-tasks8" alt="" src="./public/icontasks.svg" />
      </button>
      <button class="home17" id="home">
        <img class="icon-home8" alt="" src="./public/iconhome1.svg" />

        <img class="vector-icon106" alt="" src="./public/vector51.svg" />

        <label class="home18">Home</label>
      </button>
      <div class="account-officer9">
        <img class="account-officer-child7" alt="" src="./public/ellipse-113.svg" id="ellipseImage" data-animate-on-scroll />

        <div class="anna-george-parent7">
          <h1 class="anna-george9">Anna George</h1>
          <span class="customer-operations9">EN-001</span>
        </div>
      </div>
      <button class="logout17" id="logout">
        <img class="vector-icon107" alt="" src="./public/vector11.svg" />

        <div class="logout18">Logout</div>
        <div class="logout-child6"></div>
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

    var employeeEnroll = document.getElementById("employeeEnroll");
    if (employeeEnroll) {
      employeeEnroll.addEventListener("click", function(e) {
        window.location.href = "./Emp_enrl.php";
      });
    }

    var employee = document.getElementById("employee");
    if (employee) {
      employee.addEventListener("click", function(e) {
        window.location.href = "./E_employee.php";
      });
    }

    var rooms = document.getElementById("rooms");
    if (rooms) {
      rooms.addEventListener("click", function(e) {
        window.location.href = "./emprooms.html";
      });
    }

    var hostelite = document.getElementById("hostelite");
    if (hostelite) {
      hostelite.addEventListener("click", function(e) {
        window.location.href = "./emphostelite.html";
      });
    }

    var requests = document.getElementById("requests");
    if (requests) {
      requests.addEventListener("click", function(e) {
        window.location.href = "./empreq.html";
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


  <script>
    function getAvailableRooms() {
      var room_type = document.getElementsByName("room_type")[0].value;
      var branch = document.getElementsByName("branch")[0].value;
      var xhttp = new XMLHttpRequest();

      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("room_no").innerHTML = this.responseText;
        }
      }

      xhttp.open("GET", "./AJAX/getAvailableRooms.php?room_type=" + room_type + "&B_no=" + branch, true);

      xhttp.send();
    }

    function getAvailableBeds() {
      var room_id = document.getElementsByName("room_no")[0].value;
      var branch = document.getElementsByName("branch")[0].value;

      var xhttp = new XMLHttpRequest();

      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("bed_no").innerHTML = this.responseText;
          console.log("hlello");
        }
      }

      xhttp.open("GET", "./AJAX/getAvailableBeds.php?room_id=" + room_id + "&B_no=" + branch, true);

      xhttp.send();
    }

    function getRent() {
      var room_id = document.getElementsByName("room_no")[0].value;
      var branch = document.getElementsByName("branch")[0].value;
      var xhttp = new XMLHttpRequest();

      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("rent").innerHTML = this.responseText;
        }
      }

      xhttp.open("GET", "./AJAX/getRent.php?room_id=" + room_id + "&B_no=" + branch, true);

      xhttp.send();
    }
  </script>
</body>

</html>