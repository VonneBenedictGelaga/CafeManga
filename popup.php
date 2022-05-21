<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?php include 'acclog.php' ?>
    <link href="popup.css" rel="stylesheet">
    <title>Popup Login</title>
  </head>
  <body>
    <!--Connecting to Databse-->
    <?php
    $crude = new acclog();
    if(isset($_POST['submit'])){
      $crude->login($_POST['userName'],$_POST['accPass']);
    }
    ?>
    <!--Use onclick function to chosen option for popup-->
    <a onclick="togglePopup()" style="cursor: pointer;">My Account</a>
    <form method="post">
      <div class="popup" id="popup-1">
         <div class="content">
          <!--<div class="close-btn" onclick="togglePopup()">×</div>-->

          <h1 style="color: white">Sign in</h1>
          <div class="input-field"><input type="text" id="email" placeholder="Email" class="validate"></div>
          <div class="input-field"><input type="password" id="password" placeholder="Password" class="validate"></div>
          <button class="second-button" type="submit">Sign in</button>
          <p>Don't have an account? <a href="registration.html">Sign Up</a></p>
        </div>
      </div>

    </form>
    <!--Popup Toggle-->
    <script>
      function togglePopup() {
         document.getElementById("popup-1")
         .classList.toggle("active");
     }
    </script>
  </body>
</html>
