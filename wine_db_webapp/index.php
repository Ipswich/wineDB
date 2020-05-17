<!--
Author: Benjamin Steele
Project: CIS275 Wine Database Webapp - L'Enfant
Path: wine_db_app/home.php
Date: 11/17/2017
Description: Defines the webpage for a user to log in to the app.
Local Files Used: wine_db_app/css/index.css
                  wine_db_app/dbinteractions/loginauthentication.php
                  wine_db_app/paswordreset.php
-->
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/index.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>Welcome to WineDB</title>
    </head>
    <body>
      <div class="container">
        <div class="jumbotron">
          <h1>Welcome to WineDB!</h1>
        </div>
      </div>
      <?php
        //Alerts on failures or success.
        if($_GET["invalidlogin"] == "1")
        {
          echo '<div class="login-alert alert alert-danger" role="alert">
          <strong>Invalid Login,</strong> please try again.</div>';
        }
        else if($_GET["invalidlogin"] == "2")
        {
          echo '<div class="login-alert alert alert-warning" role="alert">
          <strong>Unauthorized access, please log in.</strong></div>';
        }
        else if($_GET["invalidlogin"] == "3")
        {
          echo '<div class="login-alert alert alert-success" role="alert">
          <strong>Logout successful.</strong></div>';
        }
        else if($_GET["success"] == "1")
        {
          echo '<div class="login-alert alert alert-success" role="alert">
          <strong>Success.</strong> Password updated.</div>';
        }
        else
        {
          echo '<div class="login-alert alert alert-info" role="alert">
          <strong>Please log in to continue.</strong></div>';
        }
       ?>
        <div class="formcontainer">
            <form action="/dbinteractions/loginauthentication.php" method="post">
                <div class="imgcontainer">
                    <img src="images/logos/L'Enfant_logo_256x256.png" alt="Logo" class="avatar">
                </div>
                    <label><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="username" required>
                    <label><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="password" required>
                    <br>
                    <button type="submit" id="submitbutton"><span>Login</span></button>
                    <br>
                    <span class="forgotpassword"><a href="passwordreset.php">Forgot password?</a></span>
              </div>
            </form>
        </div>
    </body>
</html>
