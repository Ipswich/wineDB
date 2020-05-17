<!--
Author: Benjamin Steele
Project: CIS275 Wine Database Webapp - L'Enfant
Path: wine_db_app/newpassword.php
Date: 11/17/2017
Description: Defines the webpage for a user to request an email to update their
             password.
Local Files Used: wine_db_app/css/passwordreset.css
                  wine_db_app/dbinteractions/passwordresetquery.php
                  wine_db_app/images/logos/L'Enfant_logo_256x256.png
                  wine_db_app/index.php
-->
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/passwordreset.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>WineDB Reset Password</title>
    </head>
    <body>
      <div class="container">
        <div class="jumbotron">
          <h1>Reset Password</h1>
        </div>
      </div>
      <?php
        //Alert on success.
        if($_GET["success"] == "1")
        {
          echo '<div class="email-alert alert alert-success" role="alert">
          <strong>Email sent.</strong></div>';
        }
        else{
          echo '<div class="email-alert alert alert-info" role="alert">
          <strong>Enter your email.</strong> An email with a reset link will be sent to you shortly.</div>';
        }
      ?>
      <div class="formcontainer">
          <form action="/dbinteractions/passwordresetquery.php" method="post">
              <div class="imgcontainer">
                  <img src="images/logos/L'Enfant_logo_256x256.png" alt="Logo" class="avatar">
              </div>
                  <label><b>Email</b></label>
                  <input type="email" placeholder="Enter Email" name="email" required>
                  <br>
                  <button type="submit" id="submitbutton"><span>Submit</span></button>
                  <br>
                  <span class="returnhome"><a href="index.php">Return to login screen</a></span>
            </div>
          </form>
      </div>
    </body>
</html>
