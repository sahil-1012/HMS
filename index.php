<?php
$servername = "localhost";
$username = "root";
$password = "admin";
$database = "hms";
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
  die("Sorry We failed to connect" . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (isset($_POST['submit']) && isset($_POST['email'])) {
    $sub = $_POST['email'];
    $query = "INSERT INTO subscribers (email) VALUES ('$sub')";
    $result = mysqli_query($conn, $query);
    header("Refresh: 1");
    exit();
  }
}
?>

<!DOCTYPE html>
<html>


<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <link rel="stylesheet" href="./global.css" />
  <link rel="stylesheet" href="./index.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;600;700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Work Sans:wght@600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto Mono:wght@700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source Sans Pro:wght@400&display=swap" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <title>Document</title>
</head>

<body>
  <div class="home13">
    <img class="frame-40-11" alt="" src="./public/frame-40-1.svg" />

    <img class="frame-39-11" alt="" src="./public/frame-39-1.svg" />

    <img class="frame-38-1-11" alt="" src="./public/frame-38-1-11.svg" />

    <img class="vector-icon36" alt="" src="./public/vector9.svg" />

    <img class="home-child3" alt="" src="./public/vector-11.svg" />

    <img class="color-blur-11" alt="" src="./public/color-blur-11.svg" />

    <div class="home-child4"></div>
    <div class="home-child5"></div>

    <div class="my-footer1" data-scroll-to="myFooterContainer">
      <a class="twitter1" href="https://twitter.com/i/flow/login" target="_blank"></a>
      <div class="facebook2">
        <a class="facebook3" href="https://www.facebook.com/campaign/landing.php?campaign_id=14884913640&extra_1=s%7Cc%7C589460569849%7Cb%7Cfacebook%20%27%7C&placement=&creative=589460569849&keyword=facebook%20%27&partner_id=googlesem&extra_2=campaignid%3D14884913640%26adgroupid%3D128696220912%26matchtype%3Db%26network%3Dg%26source%3Dnotmobile%26search_or_content%3Ds%26device%3Dc%26devicemodel%3D%26adposition%3D%26target%3D%26targetid%3Dkwd-327195741349%26loc_physical_ms%3D9062095%26loc_interest_ms%3D%26feeditemid%3D%26param1%3D%26param2%3D&gclid=CjwKCAjw6IiiBhAOEiwALNqncWqfluXklFim2vlJrXEnkVOJ44_jAseArohiSJX592acBReaaEEhZRoCDo8QAvD_BwE" target="_blank">
        </a>
      </div>

      <a class="instagram1" href="https://www.instagram.com/" target="_blank"></a>
      <a class="whatsapp1" href="https://chat.whatsapp.com/FtWNElLaUsyGUTsapFl6hj" target="_blank"></a>
      <a class="noticeboard1" href="https://www.mpcb.gov.in/public-notices" target="_blank">Noticeboard</a>
      <a class="faqs1" href="https://mitwpu.edu.in/faq" target="_blank">FAQs</a>
      <a class="privacy-policy1" href="https://mitwpu.edu.in/privacy-policy#:~:text=If%20you%20are%20only%20browsing,the%20users%20will%20remain%20anonymous." target="_blank">Privacy Policy</a>
      <a class="house-rules1" href="https://indianacademy.edu.in/current-students/hostel-rules-and-regulations/" target="_blank">House Rules</a>
      <span class="narayan-peth1">21 Narayan peth</span>
      <a class="a2" href="tel:+91 8798723976">+91 8798723976</a>
      <a class="infopedophilescom1" href="https://www.google.com" target="_blank">info@dask.com</a>
      <span class="thats-essentially-our1">That's essentially our story in one sentence. Crammed up hostels or
        cooped up PGs - not much of a choice, is it? That’s why we created
        Pedophiles - a place designed by people who've been in your shoes.
        Understand you. And are inspired by you.</span>
      <b class="at-dask2">At DASK</b>
      <b class="contact1">Contact</b>
      <img class="dak-icon2" alt="" src="./public/dak2.svg" id="dakImage" />
    </div>


    <div class="subscribe1">
      <img class="subscribe-child4" alt="" src="./public/ellipse-62@2x.png" />

      <img class="subscribe-child5" alt="" src="./public/ellipse-71@2x.png" />

      <img class="subscribe-child6" alt="" src="./public/rectangle-271@2x.png" />

      <img class="subscribe-child7" alt="" src="./public/ellipse-81@2x.png" />

      <img class="subscribe-child8" alt="" src="./public/ellipse-91@2x.png" />

      <img class="subscribe-child9" alt="" src="./public/rectangle-121@2x.png" />

      <img class="subscribe-child10" alt="" src="./public/rectangle-251@2x.png" />

      <img class="subscribe-child11" alt="" src="./public/rectangle-261@2x.png" />

      <form id="f-1" method="post">
        <div class="search1">
          <div class="evaemail-fill1">
            <img class="mail-icon1" alt="" src="./public/mail.svg" />
          </div>

          <input name="email" id="email" class="your-email-here1" type="email" placeholder="Your email here" maxlength="{20}" minlength="{11}" />
          <button name="submit" type="submit" form="f-1" class="search-button1">
            <div class="subsribe-now1">Subsribe Now</div>
          </button>
        </div>
      </form>
      <b class="subscribe-for-more-container1">
        <p class="subscribe-for-more1">Subscribe For More Info</p>
        <p class="subscribe-for-more1">and update from Us</p>
      </b>
    </div>
    <div class="icons-21">
      <div class="laundry4">Laundry*</div>
      <img class="water-icon1" alt="" src="./public/water1.svg" />

      <div class="mess4">Mess*</div>
      <img class="cloche-icon1" alt="" src="./public/cloche.svg" />

      <div class="gaming-arena1">Gaming Arena</div>
      <img class="laptop-icon1" alt="" src="./public/laptop.svg" />

      <div class="staff-help1">24/7 Staff help</div>
      <img class="icon1" alt="" src="./public/icon.svg" />
    </div>
    <div class="icons-11">
      <div class="study-room1">24/7 Study room</div>
      <img class="book-open-icon1" alt="" src="./public/bookopen1.svg" />

      <div class="medical-help1">24/7 Medical Help</div>
      <div class="icons-briefcase1">
        <img class="color-icon1" alt="" src="./public/color1.svg" />
      </div>
      <div class="furnished-room1">Furnished Room</div>
      <img class="home-icon1" alt="" src="./public/home1.svg" />

      <div class="unlimited-wifi1">Unlimited Wifi</div>
      <img class="wifi-icon1" alt="" src="./public/wifi.svg" />
    </div>
    <img class="slide-show-icon1" alt="" src="./public/cross-slide-animation1.svg" />

    <span class="ameties-blah-blah1">Bring a box full of hopes, dreams, ambitions… and of course, your
      personal belongings. Everything else - furniture, appliances, food - has
      already been taken care of.</span>
    <div class="amenities2">
      <b class="amenities3">AMENITIES</b>
      <div class="lets-tour-and-see-our-hostel-group">
        <span class="lets-tour-and1">Let’s tour and see our hostel!</span>
        <div class="frame-child6"></div>
      </div>
    </div>


    <div class="manager-details1">
      <a class="a3" id="branch-phone" href="tel:+91 89525663212"></a>
      <a class="address-of-branch-container1" href="https://www.google.com/maps/place/Stanza+Living+Tel+Aviv+House/@18.5584037,73.7608783,17z/data=!3m1!4b1!4m6!3m5!1s0x3bc2bf9c00676d0d:0xc1f55314ecdf3b6d!8m2!3d18.5584037!4d73.7634532!16s%2Fg%2F11rnbwn2nr" target="_blank">
        <p id="branch-address" class="subscribe-for-more1"></p>
        <p id="branch-city" class="subscribe-for-more1"></p>
      </a>
      <div class="ellipse-group">
        <img id="mgr-image" class="frame-child7" style="display: none;" alt="" src="./public/ellipse-63.svg" />

        <div class="nama-pekerjaan1">
          <p id="branch-name" class="manager-11"></p>
          <p id="branch-manager" class="branch-manager1"></p>
        </div>
      </div>
    </div>

    <div class="find-a-place1">
      <div class="title-search1">
        <div class="title1">
          <b class="find-the-place-container1">
            <p class="subscribe-for-more1">find the place to</p>
            <p class="subscribe-for-more1"><span>live </span>AFFORDABLE</p>
            <p class="subscribe-for-more1">easily here</p>
          </b>
        </div>
      </div>
      <div class="everything-you-need-container1">
        <p class="subscribe-for-more1">
          Everything you need about finding your place to live will be here,
          where it will be easier for you
        </p>
        <p class="subscribe-for-more1">
          The DASK provides an extensive number of facilities to make your
          stay as comfortable as possible. Our hostels spread all around, are
          equipped with modern facilities
        </p>
      </div>
    </div>

    <div class="saare-options1" data-scroll-to="saareOptionsContainer">
      <button class="login2" id="login">
        <div class="login3">LOGIN</div>
      </button>

      <style>
        select.branches2:hover {
          cursor: pointer;
        }

        select.branches2 {
          -webkit-appearance: none;
          -moz-appearance: none;
          background: transparent;
          background-color: #2dc295;
          text-align: center;

          appearance: none;
          background-image: url('./public/vector10.svg');
          background-repeat: no-repeat;
          background-position: right 1.2rem center;
          background-size: 1.2rem 1.2rem;
          border: none;
          padding: 0.5rem 1.8rem 0.5rem 0.5rem;
          color: #FFFFFF;
          line-height: 2;
        }

        select.branches2 option {
          background-color: #cde7df;
          font-family: 'Lexend';
          font-style: normal;
          font-weight: 600;
          font-size: 14px;
          line-height: 24px;
          text-transform: capitalize;
          color: #000000;
          transition: background-color 0.2s ease-in-out;
          padding: 8px 0;
        }

        select:focus {
          outline: none;
        }

        select.branches2 option:hover {
          color: #fff;
        }

        select.branches2::-ms-expand {
          display: none;
        }

        select.branches2:hover {
          cursor: pointer;
        }
      </style>


      <select class="branches2 text3" form id="branches">
        <option selected disabled style="display: none;">Branch</option>
        <option class="text3" value="1">Branch-01</option>
        <option class="text3" value="2">Branch-02</option>
        <option class="text3" value="3">Branch-03</option>
      </select>


      <button class="at-dask3" name="Branches" value="Branch -01" id="atDask">
        <div class="branches3"> AT DASK </div>
      </button>
    </div>
    <img class="dak-icon3" alt="" src="./public/dak3.svg" />
  </div>

  <script>
    var dakImage = document.getElementById("dakImage");
    if (dakImage) {
      dakImage.addEventListener("click", function() {
        var anchor = document.querySelector(
          "[data-scroll-to='saareOptionsContainer']"
        );
        if (anchor) {
          anchor.scrollIntoView({
            block: "start",
            behavior: "smooth"
          });
        }
      });
    }

    var login = document.getElementById("login");
    if (login) {
      login.addEventListener("click", function(e) {
        window.location.href = "./login.php";
      });
    }

    var branches = document.getElementById("branches");
    if (branches) {
      branches.addEventListener("click", function(e) {
        //TODO: onchange="showManager()
      });
    }

    var atDask = document.getElementById("atDask");
    if (atDask) {
      atDask.addEventListener("click", function() {
        var anchor = document.querySelector("[data-scroll-to='myFooterContainer']");
        if (anchor) {
          anchor.scrollIntoView({
            block: "start",
            behavior: "smooth"
          });
        }
      });
    }
  </script>
  <script>
    $(document).ready(function() {
      // console.log("efds");
      $('#branches').change(function() {
        var branchId = $(this).val();
        $.ajax({
          url: 'get_data.php',
          type: 'GET',
          data: {
            branchId: branchId
          },
          dataType: 'json',
          success: function(response) {
            $('#branch-name').text(response.b_name);
            $('#branch-address').text(response.address);
            $('#branch-city').text(response.city);
            $('#branch-manager').text(response.manager_name);
            $('#branch-phone').text(response.phone_no);
            $('#mgr-image').css('display', 'block');
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
          }
        });
      });
    });
  </script>
</body>

</html>