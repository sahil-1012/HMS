<?php

include '_partials/database.php';
$query = "SELECT * FROM hostelites WHERE H_id = $H_id";

$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$update = false;
$error = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {

  // ~ ***** UPDATE THE RECORD
  $email_id = $_POST['email_id'];
  $WORK = $_POST['WORK'];

  $street = $_POST['street'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $pincode = $_POST['pincode'];

  $phone_number = $_POST['phone_number'];
  // ~ REMOVING ALL GARBAGE SPACES
  $phone_number = intval(preg_replace('/[^0-9]+/', '', $phone_number));


  $sql = "UPDATE `hostelites` 
            SET `Email_id` = '$email_id', `WORK` = '$WORK', `street` = '$street', `city` = '$city', 
            `State` = '$state', `Pincode` = '$pincode', `phone_number` = '$phone_number' 
            WHERE `H_id` = $H_id";
  $result =  mysqli_query($conn, $sql);
  // -------------------------------------------------------------------
  // -------------------------------------------------------------------
  $name = $_POST['dep_name'];
  $name_parts = explode(' ', $name);
  $num_parts = count($name_parts);

  $f_name = ($num_parts >= 1) ? $name_parts[0] : '';
  $m_name = ($num_parts == 3) ? $name_parts[1] : '';
  $l_name = ($num_parts >= 2) ? $name_parts[$num_parts - 1] : ' ';


  $dep_relation = $_POST['dep_relation'];
  $dep_phone_no = $_POST['dep_phone_no'];

  $dep_street = $_POST['dep_street'];
  $dep_city = $_POST['dep_city'];
  $state = $_POST['dep_state'];
  $pincode = $_POST['dep_pincode'];

  $sql_2 = "UPDATE h_dependents SET F_name='$f_name', M_name='$m_name', L_name='$l_name', Relation='$dep_relation', phone_no='$dep_phone_no', street='$dep_street', city='$dep_city', State='$state', Pincode='$pincode' WHERE H_no='$H_id'";
  $result_2 =  mysqli_query($conn, $sql_2);

  if ($result || $result_2) {
    $update = true;
    header("Refresh:1");
  } else {
    $error = true;
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
  <link rel="stylesheet" href="./update.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Work Sans:wght@600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;600;700&display=swap" />

</head>
<style>
  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }
</style>

<body>
  <?php
  if ($update == true) {
    echo '
    <div class="alert alert-success" role="alert">
    <strong>Update Successfully Done... </strong>
    </div>';
  } else if ($error == true) {
    echo '<div class="alert alert-secondary" role="alert">
    <strong> Invalid Update... </strong>
    </div>';
  }
  ?>

  <!-- // **********************      GUARDIANS DETAILS          *********************** -->
  <div class="update" style="user-select: none;">
    <div class="update-inner">
      <img class="frame-child" alt="" src="./public/rectangle-1.svg" />
    </div>
    <button form="f-1" class="make-payment-wrapper" type="submit">
      <span class="make-payment">Update Details</span>
    </button>
    <form class="frame-parent" id="f-1" name="f-1" method="post" action="/update.php">
      <div class="name-parent">
        <h3 class="name">Pincode</h3>
        <input class="tomiwa-oyeledu-dolapo" type="number" name="dep_pincode" value="<?php echo $row_dep['Pincode']; ?>" max="999999" required />

        <h3 class="name1">State</h3>
        <input class="tomiwa-oyeledu-dolapo1" type="text" name="dep_state" value="<?php echo $row_dep['State']; ?>" />

        <h3 class="name2">City</h3>
        <input class="tomiwa-oyeledu-dolapo2" type="text" name="dep_city" value="<?php echo $row_dep['city']; ?>" />

        <label class="name3">Address Line</label>
        <input class="tomiwa-oyeledu-dolapo3" type="text" name="dep_street" value="<?php echo $row_dep['street']; ?>" />

        <h3 class="name4">Relationship</h3>
        <input class="tomiwa-oyeledu-dolapo4" type="text" name="dep_relation" placeholder="Enter the Relation" value="<?php echo $row_dep['Relation']; ?>" />

        <h3 class="name5">Phone no</h3>
        <input class="tomiwa-oyeledu-dolapo5" type="number" name="dep_phone_no" value="<?php echo $row_dep['phone_no']; ?>" placeholder="Enter the Phone no" min="1000000000" max="9999999999" required />

        <h3 class="name6">Name</h3>
        <input class="tomiwa-oyeledu-dolapo6" type="text" name="dep_name" value="<?php echo $row_dep['F_name'] .  " " . $row_dep['M_name'] . " " . $row_dep['L_name'];
                                                                                  ?>" placeholder="Enter the Name" />

        <h2 class="guardian-details">Guardian details</h2>
      </div>
      <div class="name-group">

        <label class="name7">Address Line</label>
        <input class="tomiwa-oyeledu-dolapo7" type="text" name="street" value="<?php echo $row['street']; ?>" />

        <h3 class="name8">City</h3>
        <input class="tomiwa-oyeledu-dolapo8" type="text" name="city" value="<?php echo $row['city']; ?>" />

        <h3 class="name9">State</h3>
        <input class="tomiwa-oyeledu-dolapo9" type="text" name="state" value="<?php echo $row['State']; ?>" />

        <h3 class="name10">Pincode</h3>
        <input class="tomiwa-oyeledu-dolapo10" type="number" name="pincode" value="<?php echo $row['Pincode']; ?>" max="999999" required />

        <h2 class="guardian-details">Address</h2>
      </div>

      <div class="tomiwa-oyeledu-dolapo-parent">
        <input class="tomiwa-oyeledu-dolapo11" type="text" name="WORK" value="<?php echo $row['WORK']; ?>" />

        <h3 class="profession">Profession</h3>
        <h2 class="work-details">Work Details</h2>
      </div>

      <div class="name-container">
        <h3 class="name11">Phone Number</h3>
        <?php
        $phone_number = $row['phone_number'];
        // $formatted_number = substr($phone_number, 0, 4) . ' ' . substr($phone_number, -6, 3) . ' ' . substr($phone_number, -3);
        ?>

        <input class="tomiwa-oyeledu-dolapo12" type="number" name="phone_number" value="<?php echo $phone_number;  ?>" min="1000000000" max="9999999999" required />

        <h3 class="name12">Email</h3>
        <input class="tomiwa-oyeledu-dolapo13" type="email" name="email_id" style="width: 300px;" value="<?php echo $row['Email_id']; ?>" />

        <h2 class="guardian-details">Contact Details</h2>
      </div>
    </form>



    <div class="personal">
      <span class="tomiwa-oyeledu-dolapo14"><?php echo $row['gender']; ?></span>
      <label class="name13">Gender</label>
      <span class="tomiwa-oyeledu-dolapo15"><?php echo $row['DOB']; ?></span>
      <label class="name14">Date of Birth</label>
      <span class="tomiwa-oyeledu-dolapo16"><?php echo $row['H_id']; ?></span>
      <label class="name15">Hostel ID</label>
      <span class="tomiwa-oyeledu-dolapo17"><?php echo $row['F_name'] .  " " . $row['M_name'] . " " . $row['L_name'] ?></span>
      <label class="name16">Name</label>
      <label class="personal-details">Personal Details</label>
    </div>

    <div class="menu2">
      <div class="menu">
        <button class="logout" id="logout">
          <img class="vector-icon" alt="" src="./public/vector.svg" />

          <a class="logout1">Logout</a>
          <div class="logout-child"></div>
        </button>
        <button class="notifications">
          <img class="vector-icon1" alt="" src="./public/vector11.svg" />

          <h2 class="notifications1">Notifications</h2>
        </button>
        <img class="line-2-1" alt="" src="./public/line-2-1.svg" />

        <button class="attendance" id="attendance">
          <img class="vector-icon2" alt="" src="./public/vector3.svg" />

          <h2 class="attendance1">Attendance</h2>
        </button>

        <button class="payments" id="payments">
          <img class="vector-icon3" alt="" src="./public/vector4.svg" />
          <h2 class="payments1">Payments</h2>
        </button>

        <button class="requests" id="requests">
          <h2 class="requests1">Requests</h2>
          <img class="icon-msg" alt="" src="./public/iconmsg.svg" />
        </button>
        <button class="services" id="services">
          <img class="icon-tasks" alt="" src="./public/icontasks.svg" />

          <h2 class="services1">Services</h2>
        </button>
        <button class="update1">
          <div class="update-child"></div>
          <h2 class="update-details">Update Details</h2>
          <img class="icon-setting" alt="" src="./public/iconsetting.svg" />

          <img class="vector-icon4" alt="" src="./public/vector2.svg" />
        </button>
        <button class="home" id="home">
          <h2 class="home1">Home</h2>
          <img class="icon-home" alt="" src="./public/iconhome.svg" />
        </button>
        <div class="account-officer">
          <img class="account-officer-child" alt="" src="./public/ellipse-1.svg" id="ellipseImage" />

          <?php
          $query = "SELECT B_name FROM BRANCH WHERE B_id = (SELECT B_no FROM belongs_to WHERE H_no = $H_id)";
          $result = mysqli_query($conn, $query);
          $bname = mysqli_fetch_assoc($result);
          ?>

          <div class="anna-george-parent">
            <b class="anna-george"><?php echo $row['F_name'] .  " " . $row['M_name'] . " " . $row['L_name'] ?></b>
            <?php $bname_fl = substr($bname['B_name'], 0, 1)  ?>
            <span class="customer-operations"><?php echo 'H' . $bname_fl . ' - ' . $row['H_id'] ?></span>
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
    var requests = document.getElementById("requests");
    if (requests) {
      requests.addEventListener("click", function(e) {
        window.location.href = "/request.php";
        // Please sync "request" to the project
      });
    }

    var services = document.getElementById("services");
    if (services) {
      services.addEventListener("click", function(e) {
        window.location.href = "/services.php";
      });
    }

    var home = document.getElementById("home");
    if (home) {
      home.addEventListener("click", function(e) {
        window.location.href = "/home.php";
      });
    }

    var ellipseImage = document.getElementById("ellipseImage");
    if (ellipseImage) {
      ellipseImage.addEventListener("click", function(e) {
        window.location.href = "/home.php";
      });
    }

    var payments = document.getElementById("payments");
    if (payments) {
      payments.addEventListener("click", function(e) {
        window.location.href = "./payments.php";
      });
    }
  </script>
</body>

</html>