<?php
include '_partials\E_database.php';
$delete = false;
$error = false;
$query = "SELECT *
          FROM employee
          LEFT JOIN e_contacts
          ON employee.E_ID = e_contacts.E_no
          LEFT JOIN works_for
          ON employee.E_ID = works_for.E_NO AND employee.E_ID = works_for.E_no
          LEFT JOIN e_attendance
          ON employee.E_ID = e_attendance.E_NO AND employee.E_ID = e_attendance.E_no
          LEFT JOIN wage
          ON employee.B_no = wage.B_No AND employee.Designation = wage.designation
          WHERE employee.B_no = $B_id
          ORDER BY 
          CASE employee.Designation 
            WHEN 'MANAGER' THEN 1 
            WHEN 'STAFF' THEN 2 
            WHEN 'CHEFF' THEN 3 
            WHEN 'WATCHMAN' THEN 4
            WHEN 'CLEANER' THEN 5
            END ASC,
          daily_wage ASC;";

$result = mysqli_query($conn, $query);


if ($_SERVER["REQUEST_METHOD"] == "GET") {

  if (isset($_GET['delete'])) {
    $delete = true;
    $E_id = $_GET['delete'];
    $sql = "DELETE FROM `Employee` WHERE `E_ID` = '$E_id'";
    $result = mysqli_query($conn, $sql);
?>
    <script>
      window.location = './Employee.php';
    </script>
<?php
    $delete = "The Employee has been successfully deleted";
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <link rel="stylesheet" href="./global.css" />
  <link rel="stylesheet" href="./Employee.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;600;700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Work Sans:wght@600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto Mono:wght@700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source Sans Pro:wght@400&display=swap" />

  <!-- -------------------------------------------------------------------- -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


  <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

  <link rel="stylesheet" href="css/style.css">

  <style>
    table.dataTable tbody th,
    table.dataTable tbody td {
      padding: 14px 10px;
    }

    .dataTables_wrapper {
      font-size: 18px;

    }

    .dataTables_paginate .paginate_button {
      font-size: 14px;
    }


    .dataTables_wrapper .dataTables_filter input {
      border-radius: 15px;
      padding: 5px;
      text-indent: 11px;
      margin-left: 3px;

      font-size: 14px;


      font-weight: 500;
      background-color: transparent;
      flex: 1;
      color: var(--neutral-500);
      text-align: left;


      font-size: var(--text-sm-semibold-size);
      line-height: 22px;
      font-family: var(--in-feild-container);
      outline: none;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
      background: linear-gradient(to bottom, rgb(255 255 255 / 10%) 0%, rgb(255 255 255 / 10%) 100%);
      background-color: #fae3ef;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
      background: linear-gradient(to bottom, rgb(255 255 255 / 10%) 0%, rgb(255 255 255 / 10%) 100%);
      background-color: #e8bed3;
    }

    .dataTables_wrapper .dataTables_length select {
      cursor: pointer;
      border: 1px solid;
      border-radius: 3px;
      padding: 5px;
      background-color: transparent;
      padding: 4px;
      font-size: 16px;
      cursor: pointer;
    }
  </style>

  <style>
    .icon {
      height: 92.17%;
      width: 92.17%;

      max-width: 100%;
      max-height: 100%;
    }

    .edit-05,
    .icon {
      overflow: hidden;
    }

    .edit-05 {
      cursor: pointer;
      border: 0;
      padding: 0;
      background-color: transparent;
      /* top: 88px; */
      /* left: 360px; */
      /* width: 24px; */
      /* height: 24px; */
    }

    .icon1,
    .trash-01 {
      overflow: hidden;
    }

    .icon1 {
      height: 25px;
      width: 83.33%;
      margin: 0px 10px;
    }

    .trash-01 {
      cursor: pointer;
      border: 0;
      background-color: transparent;

    }
  </style>

  <style>
    .featured-icon {
      position: relative;
      border-radius: var(--br-9xl);
      width: 56px;
      height: 56px;
    }

    .supporting-text,
    .text {
      align-self: stretch;
      position: relative;
    }

    .text {
      line-height: 28px;
      font-weight: 600;
    }

    .supporting-text {
      font-size: var(--text-sm-regular-size);
      line-height: 20px;
      color: var(--gray-600);
    }

    .content,
    .text-and-supporting-text {
      display: flex;
      align-items: flex-start;
      justify-content: flex-start;
    }

    .text-and-supporting-text {
      flex: 1;
      flex-direction: column;
      gap: var(--gap-9xs);
    }

    .content {
      align-self: stretch;
      background-color: var(--base-white);
      flex-direction: row;
      padding: var(--padding-5xl) var(--padding-5xl) 0;
      gap: var(--gap-base);
      z-index: 0;
    }

    .text1 {
      position: absolute;
      top: 10px;
      left: 35px;
      font-size: var(--text-md-semibold-size);
      line-height: 24px;
      font-weight: 600;
      font-family: var(--text-md-semibold);
      color: var(--gray-700);
      text-align: left;
    }

    .button {
      cursor: pointer;
      border: 1px solid var(--gray-300);
      padding: 0;
      background-color: var(--base-white);
      margin: 0 !important;
      top: 125px;
      left: 109px;
      border-radius: var(--br-5xs);
      box-shadow: var(--shadow-xs);
      box-sizing: border-box;
      width: 124px;
      height: 44px;
      overflow: hidden;
      flex-shrink: 0;
      z-index: 1;
    }

    .button,
    .button1,
    .text2 {
      position: absolute;
    }

    .text2 {
      top: 10px;
      left: 35px;
      font-size: var(--text-md-semibold-size);
      line-height: 24px;
      font-weight: 600;
      font-family: var(--text-md-semibold);
      color: var(--base-white);
      text-align: left;
    }

    .button1 {
      cursor: pointer;
      border: 1px solid var(--primary-crypto);
      padding: 0;
      background-color: var(--primary-crypto);
      margin: 0 !important;
      top: 125px;
      left: 312px;
      border-radius: var(--br-5xs);
      box-shadow: var(--shadow-xs);
      box-sizing: border-box;
      width: 133px;
      height: 44px;
      overflow: hidden;
      flex-shrink: 0;
      z-index: 2;
    }

    .update,
    .update1 {
      width: 544px;
      height: 196px;
    }

    .update1 {
      position: absolute;
      top: 0;
      left: 0;
      border-radius: var(--br-xs);
      background-color: var(--base-white);
      box-shadow: var(--shadow-xl);
      overflow: hidden;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
    }

    .update {
      position: relative;
      max-width: 90%;
      max-height: 90%;
      overflow: auto;
      text-align: left;
      font-size: var(--text-lg-semibold-size);
      color: var(--gray-900);
      font-family: var(--text-md-semibold);
    }
  </style>

</head>
<?php
if ($delete == true) {
  echo '          <div class="alert alert-success" role="alert">
          <strong>' . $delete . '</strong>
          </div>';
  header("Refresh : 1");
} else if ($error == true) {
  echo '<div class="alert alert-info" role="alert">
          <strong> Opps Cant be deleted... </strong>
          </div>';
}

?>

<body>
  <div class="empemployee">
    <img class="empemployee-child" alt="" src="./public/rectangle-12.svg" />

    <label class="employees">Employees</label>
    <div class="empemployee-item">
      <div class="row">
        <div class="col-md-12">
          <div class="table-wrap">
            <table class="table table-responsive-xl" id="myTable">
              <thead>
                <tr>
                  <!-- <th>&nbsp;</th> -->
                  <th>S no</th>
                  <th data-orderable="false">Branch</th>
                  <th data-orderable="false">Name</th>
                  <th>E ID</th>
                  <th data-orderable="false">Designation</th>
                  <th data-orderable="false">Salary</th>
                  <th data-orderable="false">View</th>
                  <th data-orderable="false">Edit</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sno = 0;
                if ($result) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    $sno += 1;

                    echo '
                    <tr class="alert" role="alert">
                      <td>' . $sno . '</td>
                      <td>' . $row['B_no'] . '</td>
                      
                      <td class="d-flex align-items-center">
                        <div class="pl-3 email">
                        <span>' . $row['F_name'] . " " . $row['M_name'] . " " . $row['L_name'] .  '</span>
                        <span> Added at : ' . date('Y-m-d', strtotime($row['Date_of_Join']))  . '</span>
                        </div> 
                      </td>
                        
                      <td> ' . $row['E_ID'] . '</td>
                      <td>' . $row['Designation'] . '</td>
                      <td>' . round($row['daily_wage'] * 30, -1) . '</td> 
                        
                        
                      <td>View</td>
                      <td>';

                    $button_id = "edit_" . $row["E_ID"];
                    echo '<button class="edit-05" data-id="' . $row["E_ID"] . '" id="' . $button_id . '">
                          <img class="icon" alt="" src="./public/icon.svg" />
                          </button>';

                    $button_id = "del_" . $row["E_ID"];
                    echo '<button class="trash-01" data-id="' . $row["E_ID"] . '" id="' . $button_id . '">
                              <img class="icon1" alt="" src="./public/icon1.svg" />
                        </button>
                      </td>
                    </tr>';
                  }
                } else {
                  echo "ERROR";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>


    </div>


    <div class="menu-emp7">
      <button class="logout15" id="logout">
        <img class="vector-icon94" alt="" src="./public/vector11.svg" />

        <div class="logout16">Logout</div>
        <div class="logout-child5"></div>
      </button>
      <button class="notifications15" id="notifications">
        <img class="vector-icon95" alt="" src="./public/vector22.svg" />

        <label class="notifications16">Notifications</label>
      </button>
      <button class="attendance15" id="attendance">
        <label class="notifications16">Attendance</label>
        <img class="vector-icon96" alt="" src="./public/vector1.svg" />
      </button>
      <button class="finances14" id="finances">
        <label class="finances15">Finances</label>
        <img class="vector-icon97" alt="" src="./public/vector2.svg" />
      </button>
      <button class="emp-enroll5" id="eMPEnroll">
        <label class="employee-enrollment8">Employee Enrollment</label>
        <img class="vector-icon98" alt="" src="./public/vector6.svg" />
      </button>
      <button class="employee14">
        <div class="employee-child5"></div>
        <label class="employee15">Employee</label>
        <img class="employee-child6" alt="" src="./public/group-1041.svg" />
      </button>
      <button class="rooms15" id="rooms">
        <label class="rooms16">Rooms</label>
        <img class="rooms-child6" alt="" src="./public/group-103.svg" />
      </button>
      <button class="hostelite-enroll7" id="hosteliteEnroll">
        <label class="hostelite-enrollment7">Hostelite Enrollment</label>
        <img class="vector-icon99" alt="" src="./public/vector4.svg" />
      </button>
      <button class="hostelite14" id="hostelite">
        <label class="hostelite15">Hostelite</label>
        <img class="hostelite-child5" alt="" src="./public/group-105.svg" />
      </button>
      <button class="requests14" id="requests">
        <label class="requests15">Requests</label>
        <img class="icon-tasks7" alt="" src="./public/icontasks1.svg" />
      </button>
      <button class="home15" id="home">
        <img class="icon-home7" alt="" src="./public/iconhome1.svg" />

        <img class="vector-icon100" alt="" src="./public/vector51.svg" />

        <label class="home16">Home</label>
      </button>
      <div class="account-officer8">
        <img class="account-officer-child6" alt="" src="./public/ellipse-112.svg" id="ellipseImage" data-animate-on-scroll />

        <div class="anna-george-parent6">
          <h1 class="anna-george8">Anna George</h1>
          <span class="customer-operations8">EN-001</span>
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

  <div id="updatePopup" class="popup-overlay" style="display: none">
    <div class="update" style="border-radius: 16px;">
      <div class="update1">
        <div class="content">
          <img class="featured-icon" alt="" src="./public/featured-icon.svg" />

          <div class="text-and-supporting-text">
            <div class="text">Confirm Update?</div>
            <div class="supporting-text">
              Do you want to save or discard changes?
            </div>
          </div>
        </div>
        <button class="button" id="popupbutton">
          <div class="text1">Cancel</div>
        </button>
        <button class="button1">
          <div class="text2">Confirm</div>
        </button>
      </div>
    </div>
  </div>


  <div id="deletePopup" class="popup-overlay" style="display: none">
    <div class="update" style="border-radius: 16px;">
      <div class="update1">
        <div class="content">
          <img class="featured-icon" alt="" src="./public/Delete.svg" />

          <div class="text-and-supporting-text">
            <div class="text">Confirm Update?</div>
            <div class="supporting-text">
              Do you want to Delete?
            </div>
          </div>
        </div>
        <button class="button" id="delpopupbutton">
          <div class="text1">Cancel</div>
        </button>
        <button class="button1">
          <div class="text2">Confirm</div>
        </button>
      </div>
    </div>
  </div>


  <script>
    var buttons = document.querySelectorAll(".edit-05");
    buttons.forEach(function(button) {
      button.addEventListener("click", function() {
        var button_id = "edit_" + this.dataset.id;
        var popup = document.getElementById("updatePopup");
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
    });

    var buttons = document.querySelectorAll(".trash-01");
    buttons.forEach(function(button) {
      button.addEventListener("click", function() {
        var button_id = "del_" + this.dataset.id;
        var popup = document.getElementById("deletePopup");
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
    });

    var popupbutton = document.getElementById("popupbutton");
    if (popupbutton) {
      popupbutton.addEventListener("click", function() {
        var popup = document.getElementById("updatePopup");
        if (!popup) return;
        var popupStyle = popup.style;
        if (popupStyle) {
          popupStyle.display = "none";
        }
        popup.removeAttribute("closable");
        popup.removeEventListener("click", onClick);
      });
    }

    var popupbutton = document.getElementById("delpopupbutton");
    if (popupbutton) {
      delpopupbutton.addEventListener("click", function() {
        var popup = document.getElementById("deletePopup");
        if (!popup) return;
        var popupStyle = popup.style;
        if (popupStyle) {
          popupStyle.display = "none";
        }
        popup.removeAttribute("closable");
        popup.removeEventListener("click", onClick);
      });
    }
  </script>

  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

  <script>
    let table = new DataTable('#myTable');
  </script>

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

    var eMPEnroll = document.getElementById("eMPEnroll");
    if (eMPEnroll) {
      eMPEnroll.addEventListener("click", function(e) {
        window.location.href = "./Emp_enrl.php";
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
        window.location.href = "./Hostelite.php";
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
    let id;
    window.addEventListener('load', () => {
      const buttons = document.querySelectorAll('.trash-01');
      buttons.forEach(button => {
        button.addEventListener('click', () => {
          id = button.dataset.id;
          console.log(id); // Print the id to the console
        });
      });
    });

    deletes = document.querySelectorAll(".button1");
    Array.from(deletes).forEach(element => {
      element.addEventListener('click', (e) => {

        // ~ WE USED THIS TO FIND WHICH NODE TO BE UPDATED
        // console.log("edit", e.target.parentNode.parentNode);
        console.log("delete", );
        E_id = id;

        window.location = `./Employee.php?delete=${E_id}`;
      })
    });
  </script>

</body>

</html>