<script src="../../Components/Navbar.js"></script>


<nav class="menu-emp">


    <button class="home1">
        <div class="rectangle-div"></div>
        <img class="icon-home" alt="" src="./public/iconhome.svg" />
        <img class="vector-icon7" alt="" src="./public/vector51.svg" />
        <label class="home2">Home</label>
    </button>

    <button class="requests" id="requests" onclick="onRequestsClick()">
        <label class="requests1">Requests</label>
        <img class="icon-tasks" alt="" src="./public/icontasks.svg" />
    </button>

    <button class="hostelite" id="hostelite" onclick="onHosteliteClick()">
        <label class="hostelite1">Hostelite</label>
        <img class="hostelite-child" alt="" src="./public/group-105.svg" />
    </button>

    <button class="hostelite-enroll" id="hosteliteEnroll" onclick="onHosteliteEnrollClick()">
        <label class="hostelite-enrollment">Hostelite Enrollment</label>
        <img class="vector-icon6" alt="" src="./public/vector4.svg" />
    </button>

    <button class="rooms" id="rooms" onclick="onRoomsClick()">
        <label class="rooms1">Rooms</label>
        <img class="rooms-child" alt="" src="./public/group-103.svg" />
    </button>


    <button class="employee" id="employee" onclick="onEmployeeClick()">
        <label class="employee1">Employee</label>
        <img class="employee-child" alt="" src="./public/group-104.svg" />
    </button>

    <button class="emp-enroll" id="empEnroll" onabort="onEmpEnrollClick()">
        <label class="employee-enrollment">Employee Enrollment</label>
        <img class="vector-icon5" alt="" src="./public/vector3.svg" />
    </button>

    <button class="finances" id="finances" onclick="onFinancesClick()">
        <label class="finances1">Finances</label>
        <img class="vector-icon4" alt="" src="./public/vector2.svg" />
    </button>


    <button class="attendance" onclick="onAttendanceClick()">
        <label class="notifications1">Attendance</label>
        <img class="vector-icon3" alt="" src="./public/vector1.svg" />
    </button>

    <button class="notifications" onclick="onNotificationsClick()">
        <img class="vector-icon2" alt="" src="./public/vector111.svg" />
        <label class="notifications1">Notifications</label>
    </button>


    <div class="account-officer">
        <img class="account-officer-child" alt="" src="./public/ellipse-1.svg" data-animate-on-scroll />

        <div class="anna-george-parent">
            <h1 class="anna-george"><?php echo $row['F_name']  . " " . $row['L_name'] ?></h1>
            <?php $bname_fl = substr($row_branch['B_name'], 0, 1)  ?>
            <span class="customer-operations"><?php echo 'E' . $bname_fl . ' - ' . $E_id ?></span>
        </div>
    </div>
</nav>


<button class="logout1" id="logout" onclick="openLogoutPopup()">
    <img class="vector-icon8" alt="" src="./public/vector11.svg" />
    <div class="logout2">Logout</div>
    <div class="logout-child"></div>
</button>


<div id="logoutPopup" class="popup-overlay" style="display: none">
    <div class="logout" data-animate-on-scroll>
        <div class="do-you-want-to-logout">
            <h1 class="do-you-want">Do you want to Logout?</h1>
        </div>
        <button class="make-payment-wrapper" id="popupframeButton" onclick="closeLogoutPopup()">
            <h2 class="make-payment">NO</h2>
        </button>
        <button class="make-payment-container" id="popupframeButton1" onclick="onLogout()">
            <h2 class="make-payment1">Yes</h2>
        </button>
    </div>
</div>