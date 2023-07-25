<?php
include '_partials\E_database.php';
$query = "SELECT c.*, b.R_no, h.f_name, h.l_name
          FROM complaints c
          JOIN belongs_to b ON c.h_no = b.H_no
          JOIN hostelites h ON b.H_no = h.H_ID
          WHERE b.B_no = 1
          GROUP BY c.R_ID, c.h_no, c.Priority, c.Response, c.Status, b.R_no, h.f_name, h.l_name;";

$result = mysqli_query($conn, $query);

$query_2 = "SELECT DISTINCT leaves.*, belongs_to.B_no, hostelites.F_name, hostelites.L_name
            FROM leaves
            LEFT JOIN belongs_to ON leaves.H_no = belongs_to.H_no
            LEFT JOIN hostelites ON belongs_to.H_no = hostelites.H_id;";

$result_2 = mysqli_query($conn, $query_2);

// if (isset($_GET['delete'])) {
//   $sno = $_GET['delete'];
//   $sql = "DELETE FROM `notes` WHERE `sno` = '$sno'";
//   $result = mysqli_query($conn, $sql);
//   $delete = true;
// }

if (isset($_POST['delete'])) {
  echo "hello world   from here on out ";
  $sno = $_GET['delete'];
  $sql = "DELETE FROM `leaves` WHERE `Hno` = '$sno'";
  $result = mysqli_query($conn, $sql);
  $delete = true;
}



?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <link rel="stylesheet" href="./global.css" />
  <link rel="stylesheet" href="./Request.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;600;700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Work Sans:wght@600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto Mono:wght@700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source Sans Pro:wght@400&display=swap" />



  <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="css/style.css">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="./Request_style.css">

  <style>
    .slider {
      position: absolute;
      bottom: 0;
      left: 41px;
      width: 110px;
      height: 5px;
      /* background-color: orange; */
      transition: left 0.3s ease-in-out;
    }

    /* Add animation to "complaints" label */
    #tab2:checked~.slider {
      left: 130px;
    }

    #tab3:checked~.slider {
      left: 216px;
    }

    .tabs .slider .indicator {
      /* position: relative; */
      width: 160px;
    }

    .table tbody td .email span {
      width: 80px;
      display: block;
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

</head>

<body>
  <div class="empreq">
    <img class="empreq-child" alt="" src="./public/rectangle-12.svg" />

    <div class="empreq-item" id="editModal">
      <div class="tabs ">

        <input type="radio" id="tab1" name="tab-control" checked>
        <input type="radio" id="tab2" name="tab-control">
        <input type="radio" id="tab3" name="tab-control">

        <ul>
          <li><label for="tab1" role="button"><svg viewBox="0 0 24 24">
                <path d="M14,2A8,8 0 0,0 6,10A8,8 0 0,0 14,18A8,8 0 0,0 22,10H20C20,13.32 17.32,16 14,16A6,6 0 0,1 8,10A6,6 0 0,1 14,4C14.43,4 14.86,4.05 15.27,4.14L16.88,2.54C15.96,2.18 15,2 14,2M20.59,3.58L14,10.17L11.62,7.79L10.21,9.21L14,13L22,5M4.93,5.82C3.08,7.34 2,9.61 2,12A8,8 0 0,0 10,20C10.64,20 11.27,19.92 11.88,19.77C10.12,19.38 8.5,18.5 7.17,17.29C5.22,16.25 4,14.21 4,12C4,11.7 4.03,11.41 4.07,11.11C4.03,10.74 4,10.37 4,10C4,8.56 4.32,7.13 4.93,5.82Z" />
              </svg><br><span>Request</span></label></li>

          <li><label for="tab2" role="button"><svg viewBox="0 0 24 24">
                <path d="M2,10.96C1.5,10.68 1.35,10.07 1.63,9.59L3.13,7C3.24,6.8 3.41,6.66 3.6,6.58L11.43,2.18C11.59,2.06 11.79,2 12,2C12.21,2 12.41,2.06 12.57,2.18L20.47,6.62C20.66,6.72 20.82,6.88 20.91,7.08L22.36,9.6C22.64,10.08 22.47,10.69 22,10.96L21,11.54V16.5C21,16.88 20.79,17.21 20.47,17.38L12.57,21.82C12.41,21.94 12.21,22 12,22C11.79,22 11.59,21.94 11.43,21.82L3.53,17.38C3.21,17.21 3,16.88 3,16.5V10.96C2.7,11.13 2.32,11.14 2,10.96M12,4.15V4.15L12,10.85V10.85L17.96,7.5L12,4.15M5,15.91L11,19.29V12.58L5,9.21V15.91M19,15.91V12.69L14,15.59C13.67,15.77 13.3,15.76 13,15.6V19.29L19,15.91M13.85,13.36L20.13,9.73L19.55,8.72L13.27,12.35L13.85,13.36Z" />
              </svg><br><span>Complaints</span></label></li>

          <li><label for="tab3" role="button"><svg viewBox="0 0 24 24">
                <path d="M2,10.96C1.5,10.68 1.35,10.07 1.63,9.59L3.13,7C3.24,6.8 3.41,6.66 3.6,6.58L11.43,2.18C11.59,2.06 11.79,2 12,2C12.21,2 12.41,2.06 12.57,2.18L20.47,6.62C20.66,6.72 20.82,6.88 20.91,7.08L22.36,9.6C22.64,10.08 22.47,10.69 22,10.96L21,11.54V16.5C21,16.88 20.79,17.21 20.47,17.38L12.57,21.82C12.41,21.94 12.21,22 12,22C11.79,22 11.59,21.94 11.43,21.82L3.53,17.38C3.21,17.21 3,16.88 3,16.5V10.96C2.7,11.13 2.32,11.14 2,10.96M12,4.15V4.15L12,10.85V10.85L17.96,7.5L12,4.15M5,15.91L11,19.29V12.58L5,9.21V15.91M19,15.91V12.69L14,15.59C13.67,15.77 13.3,15.76 13,15.6V19.29L19,15.91M13.85,13.36L20.13,9.73L19.55,8.72L13.27,12.35L13.85,13.36Z" />
              </svg><br><span>Room Change</span></label></li>



        </ul>

        <div class="slider">
          <div class="indicator"></div>
        </div>

        <div class="content">


          <section>
            <div class="row">
              <div class="col-md-12">
                <div class="table-wrap">
                  <table class="table table-responsive-xl" id="myTable">
                    <thead>
                      <tr>
                        <th>S no</th>
                        <th>H ID</th>
                        <th>Name</th>
                        <th>Date of Leave</th>
                        <th>Return Date</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sno = 0;
                      if ($result_2) {
                        while ($row = mysqli_fetch_assoc($result_2)) {
                          $sno += 1;

                          echo '<tr class="alert" role="alert">
                                  <td>' . $sno . '</td>
                                  <td>' . $row['H_no'] . '</td>
                                  <td class="d-flex align-items-center">
                                    <span>' . $row['F_name'] . ' ' . $row['L_name'] . '</span>
                                  </td>
                                  <td>' . $row['From_Date'] . '</td> 
                                  <td>' . $row['Till_Date'] . '</td>';

                          if ($row['status'] == 'Approved') {
                            echo '<td class="status approved">
                                      <style>                        
                                        .active::after {
                                          background: #1fa750;
                                        }
                                      </style>
                                      <span class="active">Solved</span>
                                    </td>';
                          } elseif ($row['status'] == 'Rejected') {
                            echo '<td class="status">
                              <span class="active" style="background-color: #ff6d6d6e; color: #d8000a;">Rejected</span>
                              </td>';
                          } elseif ($row['status'] == 'Pending') {
                            echo '
                              <style>
                              .table tbody td.status .active:after {
                                background: #ffffff;
                              }
                              </style>                
                              <td class="status">
                              <span class="active" style="background-color: #fff8c66e; color: #d8ac00;">Pending</span>
                              </td>';
                          };

                          echo '<td>
                          <button class="edit-05" id="edit05_' . $row['L_ID'] . '">
                            <img class="icon" alt="" src="./public/icon.svg" />
                          </button>
                          <button class="trash-01" id="del_' . $row['L_ID'] . '">
                            <img class="icon1" alt="" src="./public/icon1.svg" />
                          </button>
                        </td>
                        </tr>';
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </section>

          <section>
            <div class="row">
              <div class="col-md-12">
                <div class="table-wrap">
                  <table class="table table-responsive-xl" id="myTable">
                    <thead>
                      <tr>
                        <th>S no</th>
                        <th>H ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Room no</th>
                        <th>Priority</th>
                        <th>Current Status</th>
                        <th>Action</th>
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
                        <td> ' . $row['h_no'] . '</td>
                       

                        <td class="d-flex align-items-center">
                        <span>' . $row['f_name'] . " " . $row['l_name'] . '</span>
                         
                        </td>
                        <td>' . $row['C_DESCRIPTION'] . '</td> 
                        <td>' . $row['R_no'] . '</td>
                        <td>' . $row['Priority'] . '</td>';


                          // assuming that $row['Next__Installment_Date'] contains a valid date string
                          if ($row['Status'] != "PENDING") {

                            echo ' 
                            <style>                        
                              span::after {
                              background: #1fa750;
                            }
                            </style>
                            
                             <td class="status"><span class="active" >Solved</span></td>';
                          } elseif ($row['Status'] != "APPROVED") {
                            echo '<td class="status" >
                              <style>
                              .table tbody td.status .active:after {
                                background: #ff0000;
                              }
                              </style>                
                              <span class="active" style="background-color: #ffc6c66e; color: #d8000a;">Pending</span></td>';
                          }
                          echo '
                          <td> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-close"></i></span> </button> </td>
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
          </section>

          <section>
            <div class="row">
              <div class="col-md-12">
                <div class="table-wrap">
                  <table class="table table-responsive-xl" id="myTable">
                    <thead>
                      <tr>
                        <th>S no</th>
                        <th>H ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Room no</th>
                        <th>Priority</th>
                        <th>Current Status</th>
                        <th>Action</th>
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
                        <td> ' . $row['h_no'] . '</td>
                       

                        <td class="d-flex align-items-center">
                        <span>' . $row['f_name'] . " " . $row['l_name'] . '</span>
                         
                        </td>
                        <td>' . $row['C_DESCRIPTION'] . '</td> 
                        <td>' . $row['R_no'] . '</td>
                        <td>' . $row['Priority'] . '</td>';


                          // assuming that $row['Next__Installment_Date'] contains a valid date string
                          if ($row['Status'] != "PENDING") {

                            echo ' 
                            <style>                        
                              span::after {
                              background: #1fa750;
                            }
                            </style>
                            
                             <td class="status"><span class="active" >Solved</span></td>';
                          } elseif ($row['Status'] != "APPROVED") {
                            echo '<td class="status" >
                              <style>
                              .table tbody td.status .active:after {
                                background: #ff0000;
                              }
                              </style>                
                              <span class="active" style="background-color: #ffc6c66e; color: #d8000a;">Pending</span></td>';
                          }
                          echo '
                          <td> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-close"></i></span> </button> </td>
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
          </section>

        </div>
      </div>
    </div>

    <label class="requests18">Requests</label>




    <div class="menu-emp9">
      <button class="notifications19" id="notifications">
        <img class="vector-icon108" alt="" src="./public/vector111.svg" />

        <label class="notifications20">Notifications</label>
      </button>
      <button class="attendance19" id="attendance">
        <label class="notifications20">Attendance</label>
        <img class="vector-icon109" alt="" src="./public/vector1.svg" />
      </button>
      <button class="finances18" id="finances">
        <label class="finances19">Finances</label>
        <img class="vector-icon110" alt="" src="./public/vector2.svg" />
      </button>
      <button class="employee-enroll2" id="employeeEnroll">
        <label class="employee-enrollment10">Employee Enrollment</label>
        <img class="vector-icon111" alt="" src="./public/vector3.svg" />
      </button>
      <button class="employee18" id="employee">
        <label class="employee19">Employee</label>
        <img class="employee-child8" alt="" src="./public/group-104.svg" />
      </button>
      <button class="rooms19" id="rooms">
        <label class="rooms20">Rooms</label>
        <img class="rooms-child8" alt="" src="./public/group-103.svg" />
      </button>
      <button class="hostelite-enroll9" id="hosteliteEnroll">
        <label class="hostelite-enrollment9">Hostelite Enrollment</label>
        <img class="vector-icon112" alt="" src="./public/vector4.svg" />
      </button>
      <button class="hostelite18" id="hostelite">
        <label class="hostelite19">Hostelite</label>
        <img class="hostelite-child7" alt="" src="./public/group-105.svg" />
      </button>
      <button class="requests19">
        <div class="requests-child"></div>
        <label class="requests20">Requests</label>
        <img class="icon-tasks9" alt="" src="./public/icontasks2.svg" />
      </button>
      <button class="home19" id="home">
        <img class="icon-home9" alt="" src="./public/iconhome1.svg" />

        <img class="vector-icon113" alt="" src="./public/vector51.svg" />

        <label class="home20">Home</label>
      </button>
      <div class="account-officer10">
        <img class="account-officer-child8" alt="" src="./public/ellipse-114.svg" id="ellipseImage" data-animate-on-scroll />

        <div class="anna-george-parent8">
          <h1 class="anna-george10">Anna George</h1>
          <span class="customer-operations10">EN-001</span>
        </div>
      </div>
      <button class="logout19" id="logout">
        <img class="vector-icon114" alt="" src="./public/vector11.svg" />

        <div class="logout20">Logout</div>
        <div class="logout-child7"></div>
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
        <button class="button1" id="update">
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
            <div class="text">Confirm Delete?</div>
            <div class="supporting-text">
              Are you sure you want to delete this?
            </div>
          </div>
        </div>
        <button class="button" id="delpopupbutton">
          <div class="text1">Cancel</div>
        </button>
        <button id="delete" class="button1" method="POST" type="submit">
          <div class="text2">Confirm</div>
        </button>
      </div>
    </div>
  </div>

  <script>
    var updateButtons = document.querySelectorAll(".edit-05");
    for (var i = 0; i < updateButtons.length; i++) {
      var updateButton = updateButtons[i];
      updateButton.addEventListener("click", function(event) {
        var L_ID = event.target.id.substring(7);
        var popup = document.getElementById("updatePopup");
        if (popup) {
          popup.style.display = "flex";
          popup.style.zIndex = 100;
          popup.style.backgroundColor = "rgba(113, 113, 113, 0.3)";
          popup.style.alignItems = "center";
          popup.style.justifyContent = "center";

          popup.setAttribute("closable", "");

          var onClick = function(e) {
            if (e.target === popup && popup.hasAttribute("closable")) {
              popup.style.display = "none";
            }
          };
          popup.addEventListener("click", onClick);
        }
      });
    }

    var delButtons = document.querySelectorAll(".trash-01");
    for (var i = 0; i < delButtons.length; i++) {
      var delButton = delButtons[i];
      delButton.addEventListener("click", function(event) {
        var L_ID = event.target.id.substring(7);
        var popup = document.getElementById("deletePopup");
        if (popup) {
          popup.style.display = "flex";
          popup.style.zIndex = 100;
          popup.style.backgroundColor = "rgba(113, 113, 113, 0.3)";
          popup.style.alignItems = "center";
          popup.style.justifyContent = "center";

          popup.setAttribute("closable", "");

          var onClick = function(e) {
            if (e.target === popup && popup.hasAttribute("closable")) {
              popup.style.display = "none";
            }
          };
          popup.addEventListener("click", onClick);
        }
      });
    }


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
        popupbutton.removeEventListener("click", arguments.callee);
      });
    }

    var delpopupbutton = document.getElementById("delpopupbutton");
    if (delpopupbutton) {
      delpopupbutton.addEventListener("click", function() {
        var popup = document.getElementById("deletePopup");
        if (!popup) return;
        var popupStyle = popup.style;
        if (popupStyle) {
          popupStyle.display = "none";
        }
        popup.setAttribute("closable", "");
        popup.removeEventListener("click", onClick);
        delpopupbutton.removeEventListener("click", arguments.callee);
      });
    }

    var deleteConfirmButton = document.getElementById("delete");
    if (deleteConfirmButton) {

      deleteConfirmButton.addEventListener("click", function() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            console.log("gwyehbsnm");


            document.getElementById("myTable").innerHTML = this.responseText;
            var successAlert = document.getElementById("successAlert");
            if (successAlert) {
              successAlert.style.display = "block";
              setTimeout(function() {
                successAlert.style.display = "none";
              }, 3000);
            }
          }
        };
        xmlhttp.open("GET", "delete.php?L_ID=" + L_ID, true);
        xmlhttp.send();
        popup.style.display = "none";
        popup.removeAttribute("closable");
        popup.removeEventListener("click", onClick);
      });
    }
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
        window.location.href = "/logout.php";
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