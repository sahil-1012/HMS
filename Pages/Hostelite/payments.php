<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <link rel="stylesheet" href="./global.css" />
  <link rel="stylesheet" href="./payments.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;600;700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Work Sans:wght@600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto Mono:wght@700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source Sans Pro:wght@400&display=swap" />
</head>

<body>
  <div class="payments2">
    <div class="payments-inner">
      <img class="frame-child1" alt="" src="./public/rectangle-11.svg" />
    </div>

    
    <!-- // *****************      NEED TO BE OPEN FOR TABLE                     *********************** -->
    <!-- <div class="instance-parent">
    </div>
    <div class="select-parent1">
    </div> -->  

    <button class="frame-button">
      <span class="make-payment3">Make Payment</span>
    </button>
    <form class="curr-status" method="get">
      <span class="paid">Paid</span>
      <h3 class="current-status">Current Status</h3>
    </form>
    <form class="rent-left" method="get">
      <span class="rs-18282">Rs 18282</span>
      <h3 class="rent-left1">Rent Left</h3>
    </form>
    <form class="paid-rent" method="get">
      <span class="rs-182827">Rs 182827</span>
      <h3 class="paid-rent1">Paid Rent</h3>
    </form>
    <form class="total-rent" method="get">
      <span class="rs-1828271">Rs 182827</span>
      <h3 class="total-rent1">Total Rent</h3>
    </form>
    <form class="overdue-amt" method="get">
      <span class="rs-182821">Rs 18282</span>
      <h3 class="overdue-amount">Overdue Amount</h3>
    </form>
    <form class="overdue-date" method="get">
      <span class="span">12/11/2022</span>
      <h3 class="overdue-date1">Overdue Date</h3>
    </form>
    <form class="valid-till" method="get">
      <span class="rs-182827">12/11/2022</span>
      <h3 class="valid-till1">Valid Till</h3>
    </form>
    <form class="valid-from" method="get">
      <span class="span2">12/10/2022</span>
      <h3 class="valid-from1">Valid From</h3>
    </form>
    <h3 class="payment-details">Payment Details</h3>
    <div class="menu21">
      <div class="menu1">
        <button class="logout3" id="logout">
          <img class="vector-icon7" alt="" src="./public/vector1.svg" />

          <div class="logout4">Logout</div>
          <div class="logout-item"></div>
        </button>
        <button class="notifications2" id="notifications">
          <img class="vector-icon8" alt="" src="./public/vector11.svg" />

          <span class="notifications3">Notifications</span>
        </button>
        <img class="line-2-11" alt="" src="./public/line-2-1.svg" />

        <button class="attendance2" id="attendance">
          <img class="vector-icon9" alt="" src="./public/vector3.svg" />

          <span class="attendance3">Attendance</span>
        </button>
        <button class="payments3">
          <img class="vector-icon10" alt="" src="./public/vector6.svg" />

          <span class="payments4">Payments</span>
          <div class="payments-child"></div>
          <img class="vector-icon11" alt="" src="./public/vector2.svg" />
        </button>
        <button class="requests2" id="requests">
          <span class="requests3">Requests</span>
          <img class="icon-msg1" alt="" src="./public/iconmsg.svg" />
        </button>
        <button class="services2" id="services">
          <img class="icon-tasks1" alt="" src="./public/icontasks.svg" />

          <span class="services3">Services</span>
        </button>
        <button class="update2" id="update">
          <span class="update-details1">Update Details</span>
          <img class="icon-setting1" alt="" src="./public/iconsetting1.svg" />
        </button>
        <button class="home3" id="home">
          <span class="home4">Home</span>
          <img class="icon-home1" alt="" src="./public/iconhome.svg" />
        </button>
        <div class="account-officer1">
          <img class="account-officer-item" alt="" src="./public/ellipse-11.svg" id="ellipseImage" />

          <form class="anna-george-group" method="get">
            <b class="anna-george1">Anna George</b>
            <span class="customer-operations1">Customer Operations</span>
          </form>
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
        window.location.href = "./login.html";
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
        window.location.href = "./notifications.php";
      });
    }

    var attendance = document.getElementById("attendance");
    if (attendance) {
      attendance.addEventListener("click", function(e) {
        window.location.href = "./attendance.php";
      });
    }

    var requests = document.getElementById("requests");
    if (requests) {
      requests.addEventListener("click", function(e) {
        window.location.href = "./request.php";
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
  </script>
</body>

</html>