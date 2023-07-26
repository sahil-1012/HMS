<?php
session_unset();
session_destroy();
header("location: /Pages/Login/login.php");
exit();
