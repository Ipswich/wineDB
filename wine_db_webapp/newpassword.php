<!--
Author: Benjamin Steele
Project: CIS275 Wine Database Webapp - L'Enfant
Path: wine_db_app/newpassword.php
Date: 11/17/2017
Description: Defines the webpage for a user to update their password via the link
             sent through the password reset page.
Local Files Used: wine_db_app/css/newpassword.css
                  wine_db_app/dbinteractions/newpasswordquery.php
                  wine_db_app/images/logos/L'Enfant_logo_256x256.png
                  wine_db_app/index.php
-->
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/newpassword.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>WineDB New Password</title>
    </head>
    <body>
      <div class="container">
        <div class="jumbotron">
          <h1>Enter New Password</h1>
        </div>
      </div>
      <?php
      //Alerts on failures.
      if($_GET["failed"] == "1")
      {
        echo '<div class="password-alert alert alert-danger" role="alert"> <strong>Error.</strong> Passwords must match.</div>';
      }
      else if($_GET["failed"] == "2")
      {
        echo '<div class="password-alert alert alert-danger" role="alert"> <strong>Error.</strong> Invalid token.</div>';
      }
      else if($_GET["failed"] == "3")
      {
        echo '<div class="password-alert alert alert-danger" role="alert"> <strong>Error.</strong> Database Error.</div>';
      }
      else
      {
        echo '<div class="password-alert alert alert-info" role="alert"><strong>Enter and verify your new password.</strong></div>';
      }
      ?>
      <div class="formcontainer">
          <form action="/dbinteractions/newpasswordquery.php" method="post">
              <div class="imgcontainer">
                  <img src="images/logos/L'Enfant_logo_256x256.png" alt="Logo" class="avatar">
              </div>
                  <label><b>New Password</b></label>
                  <?php
                  echo '<input type="hidden" name="password_reset_token" id="password_reset_token" value ="' . $_GET['password_reset_token'] . '">';
                  echo '<input type="hidden" name="email" id="email" value ="' . $_GET['email'] . '">';
                  ?>
                  <input type="password" placeholder="Enter password" name="password1" required>
                  <br>
                  <input type="password" placeholder="Re-enter password" name="password2" required>
                  <br>
                  <button type="submit" id="submitbutton"><span>Submit</span></button>
                  <br>
                  <span class="returnhome"><a href="index.php">Return to login screen</a></span>
            </div>
          </form>
      </div>
    </body>
</html>
