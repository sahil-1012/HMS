<?php

include '_partials/database.php';
$update = false;
$error = false;
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <link rel="stylesheet" href="./global.css" />
  <link rel="stylesheet" href="./services.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;600;700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Work Sans:wght@600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto Mono:wght@700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source Sans Pro:wght@400&display=swap" />
</head>

<body>

  <?php
  $query = "SELECT * FROM LAUNDRY WHERE H_no = $H_id";
  $result = mysqli_query($conn, $query);
  $row_l = mysqli_fetch_assoc($result);

  $query = "SELECT * FROM mess WHERE H_no = $H_id";
  $result = mysqli_query($conn, $query);
  $row_m = mysqli_fetch_assoc($result);

  $query = "SELECT * FROM services_details WHERE B_no = $B_id";
  $result = mysqli_query($conn, $query);
  $row_sd = mysqli_fetch_assoc($result);
  ?>

  <?php
  //  *****************      LOGIC FOR VALID Till                   *********************** -->
  if (!is_null($row_l)) {
    if ((strtotime($row_l['Valid_Till']) < time())) {
      $valid_till =  "--/--/--";
    } else {
      $valid_till = $row_l['Valid_Till'];
    }
  } else {
    $valid_till =  "--/--/--";
  }
  ?>


  <?php
  // ! *****************      LOGIC FOR TOTAL AMOUNT LEFT                  *********************** -->
  if (!is_null($row_l)) {
    $total = ($row_sd['L_Price_per_kg'] * $row_l['Additional_Weight']) + ($row_l['extra_charges']);
  } else {
    $total = 0;
  }
  //  *****************      LOGIC FOR LAUNDRY     *********************** -->
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // **** NEED TO UPDATE DATA IN DB
    if (isset($_POST['sub_laundry']) && isset($_POST['add_monthly']) && $row_l['Additional_Weight'] == 0) {

      if ($valid_till == '--/--/--') {
        $query = "INSERT INTO laundry (L_id, H_no) 
        VALUES ('L$H_id', $H_id) 
        ON DUPLICATE KEY UPDATE Valid_From=CURRENT_DATE(), Valid_Till=DATE_ADD(NOW(), INTERVAL 1 MONTH), 15;
        ";

        $result = mysqli_query($conn, $query);
      } else {

        $query = "UPDATE laundry 
          SET Valid_Till=DATE_ADD(Valid_Till, INTERVAL 1 MONTH)
          WHERE H_no=$H_id";
        $result = mysqli_query($conn, $query);
      }
      $update = "Successfully Subscribed for New Month";

      header("Refresh:1");
    } else if (isset($_POST['sub_laundry']) && $row_l['Additional_Weight'] != 0) {

      $query = "UPDATE laundry 
                SET Additional_Weight = 0, extra_charges = 0 
                WHERE H_no = $H_id";
      $result = mysqli_query($conn, $query);
      $update = "Successfully Cleared all the Dues";

      header("Refresh:1");
    } else {

      $error = true;
      header("Refresh:1");
    }
  }
  ?>

  <?php
  //  *****************      LOGIC FOR MESS     *********************** -->
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['opt_in'])) {
      $query = "UPDATE mess SET curr_status = 'Opted-out' WHERE H_no = $H_id ";
      $result = mysqli_query($conn, $query);
      $update = "Successfully Opted Out";
    } else if (isset($_POST['opt_out'])) {

      $query = "UPDATE mess SET curr_status = 'Opted-in' WHERE H_no = $H_id ";
      $result = mysqli_query($conn, $query);
      $update = "Successfully Opted in";
    }

    if (isset($_POST['mess_submit']) && !empty($_POST['no-of-days'])) {
      $no_of_days = $_POST['no-of-days'];
      $query = "INSERT INTO MESS (M_id, H_no, Days_Left)
          VALUES ('M$H_id', $H_id, $no_of_days)
          ON DUPLICATE KEY UPDATE Days_Left = Days_Left + $no_of_days";

      $result = mysqli_query($conn, $query);

      $per_day = $row_sd['M_Daily_Charge'];
      $query = "INSERT INTO payments_log (party_id, type, category, amount) 
                VALUES ($H_id, 'incoming', 'mess', ($no_of_days * $per_day))";

      $result = mysqli_query($conn, $query);
      $update = "Successfully Incremeneted your Subscription";
    } else {
      $error = true;
    }
    // header("Refresh:1");
  }
  ?>


  <!-- // *****************     ALERT       *********************** -->
  <?php
  if ($update == true) {
    echo '
      <div class="alert alert-success" role="alert">
      <strong>' . $update . '</strong>
      </div>';
  } else if ($error == true) {
    echo '<div class="alert alert-info" role="alert">
    <strong> Invalid Update... </strong>
    </div>';
  }
  ?>

  <div class="services8">
    <div class="services-inner">
      <img class="frame-child4" alt="" src="./public/rectangle-12.svg" />
    </div>

    <form class="laundry2" method="post" target="/services.php">
      <div class="light-background-rectangle1"></div>

      <button type="submit" class="make-payment-wrapper1" name="sub_laundry">
        <h5 class="make-payment4">Proceed to Payment</h5>
      </button>
      <h4 class="primary-text">Total</h4>


      <span class="primary-text1">Rs <?php echo $total; ?></span>
      <h4 class="add-monthly">Add Monthly</h4>
      <input class="icons-checkmark-square" type="checkbox" name="add_monthly" />



      <h4 class="additional-weight">Additional Weight</h4>
      <span class="span3"><?php if (!is_null($row_l)) {
                            echo $row_l['Additional_Weight'];
                          } else echo "0"; ?></span>
      <h4 class="total-weight-left">Total weight Left</h4>
      <span class="span4"><?php if (!is_null($row_l)) {
                            echo $row_l['Total_Weight_Left'];
                          } else echo "0"; ?></span>
      <h4 class="price-kg">Price /kg</h4>
      <span class="rs-45"><?php echo $row_sd['L_Price_per_kg']; ?></span>
      <h4 class="fixed-charge">Fixed Charge</h4>
      <span class="span5"><?php echo $row_sd['L_Fixed_Charge']; ?></span>
      <h4 class="current-status1">Current Status</h4>

      <?php
      // ~ *******************    LOGIC FOR STATUS 
      if (!is_null($row_l)) {
        if (strtotime($row_l['Valid_Till']) < time()) {
          $status = 'Inactive';
          $style = '';
        } else {
          $status = 'Active';
          $style = ' style="color: var(--color-green)"';
        }
      } else {
        $status = 'Inactive';
        $style = '';
      }

      ?>

      <span class="inactive" <?php echo $style ?>> <?php echo $status; ?></span>

      <span class="inactive" hidden>Inactive</span>
      <h4 class="valid-till2">Valid Till</h4>

      <span class="span6">
        <?php
        if (!is_null($row_l)) {
          if (strtotime($row_l['Valid_Till']) < time()) {
            echo "--/--/--";
          } else {
            echo date("d/m/Y", strtotime($row_l['Valid_Till']));
          }
        } else {
          echo "--/--/--";
        }
        ?>
      </span>

      <span class="span7">
        <?php
        if (!is_null($row_l)) {

          if (strtotime($row_l['Valid_Till']) < time()) {
            echo "--/--/--";
          } else {
            echo date("d/m/Y", strtotime($row_l['Valid_From']));
          }
        } else {
          echo "--/--/--";
        }

        ?>
      </span>
      <h4 class="valid-from2">Valid From</h4>
      <img class="laundry-child" alt="" src="./public/rectangle-59.svg" />
      <h3 class="laundry3">Laundry</h3>
    </form>


    <?php $num_days_left =  $row_m['Days_Left']; ?>
    <div class="mess2">
      <div class="light-background-rectangle1"></div>
      <button form="form_mess" name="mess_submit" class="make-payment-wrapper2" type="submit">
        <h5 class="make-payment4">Proceed to Payment</h5>
      </button>

      <div class="total">
        <div class="text1">
          <h4 class="primary-text2">Total</h4>
        </div>
        <span id="total-amount" class="primary-text3">0</span>
      </div>

      <?php $mess_charge =  $row_sd['M_Daily_Charge'] ?>
      <form class="no-of-days-selection" method="post" name="form_mess" id="form_mess">
        <h4 class="primary-text4">Enter Number of days</h4>
        <div class="text2">
          <input id="no-of-days" name="no-of-days" class="primary-text5" type="number" min="0" max="50" placeholder="0" />
          <div class="secondary-text1">Secondary Text</div>
        </div>
      </form>


      <div class="daily-charges">
        <h4 class="primary-text6">Daily Charges</h4>
        <span class="primary-text7">Rs <?php echo $row_sd['M_Daily_Charge']; ?></span>
      </div>
      <img class="mess-child" alt="" src="./public/rectangle-60.svg" />

      <!-- // *****************      LOGIC FOR OPT IN-OUT                    *********************** -->
      <form method="post">
        <?php
        if (!is_null($row_m)) {
          if ($row_m['Days_Left'] == 0) {
            echo '
          <button class="optin1" disabled style="background-color: rgb(220,220,220); color: rgb(0,0,0); cursor: not-allowed;" type="submit" name="opt_in">
          <h3 class="upgrade">Opt in</h3>
          </button>';
          } else if ($row_m['curr_status'] == 'Opted-out') {

            echo '
          <button class="optin1" type="submit" name="opt_out">
            <h3 class="upgrade1">Opt out</h3>
          </button>';
          } else {

            echo '
          <button class="optin1" style="background-color: rgb(209, 250, 229);" type="submit" name="opt_in">
          <h3 class="upgrade">Opt in</h3>
          </button>';
          }
        } else {

          echo '
          <button class="optin1" disabled style="background-color: rgb(220,220,220); color: rgb(0,0,0); cursor: not-allowed;" type="submit" name="opt_in">
          <h3 class="upgrade">Opt in</h3>
          </button>';
        } ?>
      </form>

      <div class="no-of-days-left">
        <h4 class="number-of-days">Number of days left</h4>
        <div class="wrapper">
          <span class="span8"> <?php if (!is_null($row_m)) {
                                  echo $row_m['Days_Left'];
                                } else echo 0 ?></span>
        </div>
      </div>
      <img class="mess-item" alt="" src="./public/rectangle-591.svg" />
      <h3 class="mess3">Mess</h3>
    </div>

    <div class="menu2">
      <button class="logout9" id="logout">
        <img class="vector-icon26" alt="" src="./public/vector1.svg" />

        <h2 class="logout10">Logout</h2>
        <div class="logout-child2"></div>
      </button>
      <button class="notifications10" id="notifications">
        <img class="vector-icon27" alt="" src="./public/vector11.svg" />

        <h2 class="notifications11">Notifications</h2>
      </button>
      <img class="line-2-14" alt="" src="./public/line-2-1.svg" />

      <button class="attendance10" id="attendance">
        <img class="vector-icon28" alt="" src="./public/vector3.svg" />

        <h2 class="attendance11">Attendance</h2>
      </button>
      <button class="payments9" id="payments">
        <img class="vector-icon29" alt="" src="./public/vector4.svg" />

        <h2 class="payments10">Payments</h2>
      </button>
      <button class="requests8" id="requests">
        <h2 class="requests9">Requests</h2>
        <img class="icon-msg4" alt="" src="./public/iconmsg.svg" />
      </button>
      <button class="services9">
        <img class="icon-tasks4" alt="" src="./public/icontasks2.svg" />

        <h2 class="services10">Services</h2>
        <div class="services-item"></div>
        <img class="vector-icon30" alt="" src="./public/vector2.svg" />
      </button>
      <button class="update5" id="update">
        <h2 class="update-details4">Update Details</h2>
        <img class="icon-setting4" alt="" src="./public/iconsetting11.svg" />
      </button>
      <button class="home9" id="home">
        <h2 class="home10">Home</h2>
        <img class="icon-home4" alt="" src="./public/iconhome.svg" />
      </button>
      <div class="account-officer4">
        <img class="account-officer-child2" alt="" src="./public/ellipse-14.svg" id="ellipseImage" />

        <?php
        $query = "SELECT B_name FROM BRANCH WHERE B_id = (SELECT B_no FROM belongs_to WHERE H_no = $H_id)";
        $result = mysqli_query($conn, $query);
        $bname = mysqli_fetch_assoc($result);
        ?>

        <div class="anna-george-parent2">
          <b class="anna-george4" style="    font-size: var(--internal-tool-subheading-size);
    font-weight: 500;
    color: var(--secondary-crypto);"><?php echo $row['F_name'] .  " " . $row['M_name'] . " " . $row['L_name'] ?></b>
          <?php $bname_fl = substr($bname['B_name'], 0, 1)  ?>
          <div class="customer-operations4"><?php echo 'H' . $bname_fl . ' - ' . $row['H_id'] ?></div>
        </div>
      </div>
    </div>
  </div>

  <div id="logoutPopup" class="popup-overlay" style="display: none">
    <div class="logout" data-animate-on-scroll>
      <h1 class="do-you-want">Do you want to Logout?</h1>
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

    var notifications = document.getElementById("notifications");
    if (notifications) {
      notifications.addEventListener("click", function(e) {
        window.location.href = "./notifications.html";
      });
    }

    var attendance = document.getElementById("attendance");
    if (attendance) {
      attendance.addEventListener("click", function(e) {
        window.location.href = "./attendance.php";
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
        window.location.href = "/request.php";

      });
    }

    var update = document.getElementById("update");
    if (update) {
      update.addEventListener("click", function(e) {
        window.location.href = "./update.php";
      });
    }

    var home = document.getElementById("home");
    if (home) {
      home.addEventListener("click", function(e) {
        window.location.href = "./home.php";
      });
    }

    var ellipseImage = document.getElementById("ellipseImage");
    if (ellipseImage) {
      ellipseImage.addEventListener("click", function(e) {
        window.location.href = "./home.php";
      });
    }
  </script>

  <!--// ************ TO CALCULATE MESS AMOUNT AT RUN-TIME *********** -->
  <script>
    const numberOfDaysInput = document.getElementById("no-of-days");
    const totalAmountSpan = document.getElementById("total-amount");

    const calculateTotal = () => {
      const numberOfDays = numberOfDaysInput.value;
      const totalAmount = <?php echo $mess_charge ?> * numberOfDays;
      totalAmountSpan.innerText = totalAmount;
    };
    numberOfDaysInput.addEventListener("input", calculateTotal);
  </script>

  <!-- // ****** SCRIPT FOR CALCULATING LAUNDRY MONTHLY  -->
  <script>
    const checkbox = document.querySelector('input[name="add_monthly"]');
    const originalTotal = '<?php echo $total; ?>';
    checkbox.addEventListener('change', function() {
      if (checkbox.checked) {
        <?php $total += $row_sd['L_Fixed_Charge']; ?>
        document.querySelector('.primary-text1').innerHTML = 'Rs <?php echo $total; ?>';
      } else {
        document.querySelector('.primary-text1').innerHTML = 'Rs ' + originalTotal;
      }

    });
  </script>
</body>

</html>