<!--
Author: Benjamin Steele
Project: CIS275 Wine Database Webapp - L'Enfant
Path: wine_db_app/varietals/removevarietal.php
Date: 11/17/2017
Description: Defines the webpage for removing a user.
Local Files Used: wine_db_app/css/adminpages.css
                  wine_db_app/includes/loggedincheck.php
                  wine_db_app/includes/authenticatedcheck3.php
                  wine_db_app/includes/pageheadline.php
                  wine_db_app/includes/navbar.php
                  wine_db_app/dbinteractions/varietals/removevarietalquery.php
-->
<?php
  ob_start();
  session_start();
  include('../includes/loggedincheck.php');
 ?>
 <!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="/css/adminpages.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>WineDB Remove User</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <?php
      include('../includes/authentications/authenticatedcheck4.php');
      include('../includes/pageheadline.php');
      include('../includes/navbar.php');

      //Alerts on failures or success.
      if($_GET["failed"] == "1")
      {
        echo '<div class="login-alert alert alert-danger" role="alert"> <strong>Remove user failed.</strong> Usernames do not match.</div>';
      }
      if($_GET["failed"] == "2")
      {
        echo '<div class="login-alert alert alert-danger" role="alert"> <strong>Remove user failed.</strong> Username does not exist.</div>';
      }
      if($_GET["failed"] == "3")
      {
        echo '<div class="login-alert alert alert-danger" role="alert"> <strong>Remove user failed.</strong> Database error.</div>';
      }
      if($_GET["failed"] == "4")
      {
        echo '<div class="login-alert alert alert-danger" role="alert"> <strong>Remove user failed.</strong> Cannot delete admin account.</div>';
      }
      if($_GET["success"] == "1")
      {
        echo '<div class="login-alert alert alert-success" role="alert"> <strong>Success.</strong> User removed.</div>';
      }
    ?>

      <h2 style="text-align: center;">Remove User</h2>
      <h6 style="text-align: center;">Removing a user immediately and irreversibly revokes access to this webapp. Use with caution.</h6>
      <div class="container">
        <form name="addUserForm" class="form-horizontal" method="POST" action="/dbinteractions/admin/removeuserquery.php">
          <div class="form-group">
            <label class="control-label col-sm-2" for="username">Username:</label>
            <div class="col-sm-8 input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8 input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input type="text" class="form-control" id="username2" placeholder="Confirm username" name="username2" required>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-2 input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-remove"></i></span>
              <button type="submit" class="btn btn-danger form-control">Delete</button>
            </div>
          </div>
        </form>
      </div>
  </body>
</html>
