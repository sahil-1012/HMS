<?php

include '_partials/database.php';


$update = false;
$error = false;


if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (isset($_POST['priority']) && !empty($_POST['priority']) && isset($_POST['Description']) && !empty($_POST['Description']) && isset($_POST['generate'])) {


    // ~ ***** SUBMIT THE COMPLAINTS
    $priority = $_POST['priority'];
    $description = $_POST['Description'];

    $query = "INSERT INTO complaints (h_no, Priority, C_DESCRIPTION)
              VALUES
              ($H_id, '$priority', '$description')";

    $result = mysqli_query($conn, $query);
    if ($result) {
      $update = "Successfully submitted your complaint.";
    }
  } else  if (isset($_POST['from_date']) && !empty($_POST['from_date']) && isset($_POST['to_date']) && !empty($_POST['to_date'])  && isset($_POST['Req_description']) && !empty($_POST['Req_description']) && isset($_POST['generate'])) {


    // ~ ***** SUBMIT THE REQUEST
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];
    $description = $_POST['Req_description'];

    $query_2 = "INSERT INTO LEAVES (H_no, From_Date, Till_Date, Reason)
    VALUES ($H_id, '$from_date', '$to_date', '$description');";

    $result = mysqli_query($conn, $query_2);
    if ($result) {
      $update = "Successfully submitted your Request...";
    }
  } else {
    $error = "Invalid Update... ";
  }
  header("Refresh:1");
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <link rel="stylesheet" href="./global.css" />
  <link rel="stylesheet" href="./request.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;600;700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Work Sans:wght@600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto Mono:wght@700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source Sans Pro:wght@400&display=swap" />
</head>

<body>
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
  <div class="request">
    <div class="request-inner">
      <img class="frame-child2" alt="" src="./public/rectangle-12.svg" />
    </div>
    <div class="request-child"></div>
    <div class="request-item"></div>
    <div class="choose-type">


      <button name="generate" class="make-payment-wrapper1" type="submit" style="transform: scale(0.7);">
        <span class="make-payment4">Generate</span>
      </button>

      <label for="comp" style="cursor: pointer;" name="sel">
        <div class="complaint-parent">
          <div class="complaint">Complaint</div>
          <input form="complaint" class="group-child" type="radio" value="complaint" style="height: 23px; cursor: pointer;" name="myRadioGroup" id="comp" />
        </div>
      </label>

      <label for="req" style="cursor: pointer;" name="sel">
        <div class="request-parent">
          <div class="complaint">Request</div>
          <input form="request" class="group-child" type="radio" value="request" style="height: 23px; cursor: pointer;" name="myRadioGroup" id="req" />
        </div>
      </label>

      <h3 class="choose-type1">Choose Type</h3>
    </div>


    <form class="complaints" id="complaint" method="post">
      <div class="light-background-rectangle2"></div>

      <textarea class="input" name="Description" placeholder="Describe your Complaint"></textarea>

      <div class="input-parent">
        <select name="priority" id="priority" class="input1">
          <option value=0 selected style="display:none" class="text1">Select Priority</option>
          <option value="Low Priority" class="input1">Low</option>
          <option value="Mid Priority" class="input1">Mid</option>
          <option value="High Priority" class="input1">High</option>
        </select>
      </div>

      <h3 class="complaints1">Complaints</h3>
    </form>




    <form class="requests4" id="request" method="post">
      <div class="light-background-rectangle21"></div>
      <div class="input-wrapper">
        <textarea name="Req_description" class="input2" placeholder="Describe your Request"></textarea>
      </div>

      <h3 class="text2">To Date</h3>
      <input name="to_date" id="to_date" class="input3" type="date" />
      <h3 class="text3">From Date</h3>
      <input name="from_date" id="from_date" class="input4" type="date" />
      <h3 class="requests5">Requests</h3>
    </form>

    <div class="menu2">
      <div class="menu3">
        <button class="logout5" id="logout">
          <img class="vector-icon13" alt="" src="./public/vector1.svg" />

          <div class="logout6">Logout</div>
          <div class="logout-inner"></div>
        </button>
        <button class="notifications4" id="notifications">
          <img class="vector-icon14" alt="" src="./public/vector111.svg" />

          <span class="notifications5">Notifications</span>
        </button>
        <img class="line-2-12" alt="" src="./public/line-2-1.svg" />

        <button class="attendance4" id="attendance">
          <img class="vector-icon15" alt="" src="./public/vector3.svg" />

          <span class="attendance5">Attendance</span>
        </button>
        <button class="payments5" id="payments">
          <img class="vector-icon16" alt="" src="./public/vector4.svg" />

          <span class="payments6">Payments</span>
        </button>
        <button class="requests6">
          <span class="requests7">Requests</span>
          <img class="icon-msg2" alt="" src="./public/iconmsg.svg" />

          <div class="requests-child"></div>
          <img class="vector-icon17" alt="" src="./public/vector21.svg" />
        </button>
        <button class="services4" id="services">
          <img class="icon-tasks2" alt="" src="./public/icontasks1.svg" />

          <span class="services5">Services</span>
        </button>
        <button class="update3" id="update">
          <span class="update-details2">Update Details</span>
          <img class="icon-setting2" alt="" src="./public/iconsetting11.svg" />
        </button>
        <button class="home5" id="home">
          <span class="home6">Home</span>
          <img class="icon-home2" alt="" src="./public/iconhome.svg" />
        </button>
        <div class="account-officer2">
          <img class="account-officer-inner" alt="" src="./public/ellipse-1.svg" id="ellipseImage" />

          <form class="anna-george-container" method="get" id="frameForm">
            <div class="anna-george2"><?php echo $row['F_name'] .  " " . $row['M_name'] . " " . $row['L_name'] ?></div>
            <?php $bname_fl = substr($bname['B_name'], 0, 1)  ?>
            <div class="customer-operations1"><?php echo 'H' . $bname_fl . ' - ' . $row['H_id'] ?></div>
          </form>
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
        window.location.href = "./login.php";
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

    var services = document.getElementById("services");
    if (services) {
      services.addEventListener("click", function(e) {
        window.location.href = "./services.php";
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

    var frameForm = document.getElementById("frameForm");
    if (frameForm) {
      frameForm.addEventListener("click", function(e) {
        window.location.href = "./services.php";
      });
    }
    var popupframeButton1 = document.getElementById("popupframeButton1");
    if (popupframeButton1) {
      popupframeButton1.addEventListener("click", function(e) {
        window.location.href = "./logout.php";
      });
    }
  </script>
  <script>
    const today = new Date().toISOString().split('T')[0];
    document.querySelector('input[type="date"][id="from_date"]').setAttribute('min', today);
    document.querySelector('input[type="date"][id="to_date"]').setAttribute('min', today);
  </script>
  <script>
    const radioGroup = document.getElementsByName("myRadioGroup");
    const submitButton = document.getElementsByName("generate")[0];

    radioGroup.forEach(function(radio) {
      radio.addEventListener("click", function() {

        if (radio.value === "complaint") {
          submitButton.setAttribute("form", "complaint");

        } else if (radio.value === "request") {
          submitButton.setAttribute("form", "request");
        }
      });
    });
  </script>
  <script>
    const sel = document.getElementsByName('sel');
    const radios = document.getElementsByName('myRadioGroup');

    for (let i = 0; i < radios.length; i++) {
      radios[i].addEventListener('click', function() {
        for (let j = 0; j < radios.length; j++) {
          if (radios[j] !== this) {
            radios[j].checked = false;
          }
        }
      });
    }
  </script>
</body>

</html>