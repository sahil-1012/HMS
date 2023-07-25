<?php
include '_partials\server.php';

$showAlert = false;
$showError = false;
$login = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {

  $username = $_POST['username'];
  $password = $_POST['password'];


  // ~ ***** PASSWORD SHOULD BE SAME  + IT SHOULD NOT EXISTS ****
  $sql = "SELECT * from login where USERID = '$username' and Password = '$password'";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    // Check if the user is an employee or hospital user based on the first character of the user_id
    if ($row['UserID'][0] == 'E') {
      $login  = true;

      $_SESSION['loggedin'] = true;
      $E_id = intval(substr($row['UserID'], 1));
      $_SESSION['E_id'] = $E_id;

      header('location: /Employee/E_home.php');
    } else if ($row['UserID'][0] == 'H') {

      $login  = true;

      $_SESSION['loggedin'] = true;
      $H_id = intval(substr($row['UserID'], 1));
      $_SESSION['H_id'] = $H_id;

      header('location: /home.php');
    }
  } else {
    $showError = true;
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
  <link rel="stylesheet" href="./login.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;600;700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Work Sans:wght@600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto Mono:wght@700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source Sans Pro:wght@400&display=swap" />
</head>

<body>
  <?php
  if ($login) {
    echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong> Success...!!</strong>Your Account has been Successfully Login...
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    ';
  }
  if ($showError) {
    echo '
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong> Opps...!!</strong> Invalid Credentials...
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    ';
  }
  ?>
  <div class="login4">
    <form id="log" action="./login.php" method="post">
      <div class="welcome-back">Welcome Back</div>
      <div class="frame-group">
        <div class="label-parent">
          <span class="label">User Name</span>
          <input class="input" name="username" type="text" placeholder="Enter your username" />
        </div>
        <div class="frame-container">
          <div class="label-group">
            <span class="label">Password</span>
            <input class="input1" name="password" type="password" placeholder="password" maxlength="{12}" minlength="{4}" />
          </div>
          <button class="text4">Forgot password?</button>
        </div>
        <button form="log" class="button" id="button">
          <div class="text5">Login</div>
        </button>

      </div>
    </form>

    <img id="image" class="dak-icon4" style="cursor: pointer;" alt="" src="./public/dak4.svg" />

    <img class="login-child" alt="" src="./public/frame-50.svg" />

    <img class="clip-virtual-reality-icon" alt="" src="./public/clipvirtualreality.svg" />

    <button class="path-wrapper" id="frameButton">
      <img class="path-icon" alt="" src="./public/path.svg" />
    </button>
  </div>

  <script>
    var button = document.getElementById("button");
    if (button) {
      button.addEventListener("click", function(e) {
        window.location.href = "./index.php";
      });
    }

    var frameButton = document.getElementById("frameButton");
    if (frameButton) {
      frameButton.addEventListener("click", function(e) {
        window.location.href = "./index.php";
      });
    }

    var frameButton = document.getElementById("image");
    if (frameButton) {
      frameButton.addEventListener("click", function(e) {
        window.location.href = "./index.php";
      });
    }
  </script>
</body>

</html>