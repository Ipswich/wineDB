<!--
Author: Benjamin Steele
Project: CIS275 Wine Database Webapp - L'Enfant
Path: wine_db_app/admin/adduser.php
Date: 11/17/2017
Description: Defines the webpage for adding a user.
Local Files Used: wine_db_app/includes/loggedincheck.php
                  wine_db_app/css/adminpages.css
                  wine_db_app/includes/authenticatedcheck3.php
                  wine_db_app/includes/pageheadline.php
                  wine_db_app/includes/navbar.php
                  wine_db_app/dbinteractions/adduserquery.php
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
    <title>WineDB Add User</title>
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
        echo '<div class="login-alert alert alert-danger" role="alert"> <strong>Add user failed.</strong> Passwords do not match.</div>';
      }
      if($_GET["failed"] == "2")
      {
        echo '<div class="login-alert alert alert-danger" role="alert"> <strong>Add user failed.</strong> Database error.</div>';
      }
      if($_GET["failed"] == "3")
      {
        echo '<div class="login-alert alert alert-danger" role="alert"> <strong>Add user failed.</strong> Username already exists.</div>';
      }
      if($_GET["success"] == "1")
      {
        echo '<div class="login-alert alert alert-success" role="alert"> <strong>Success.</strong> User created.</div>';
      }
    ?>

    <h2 style="text-align: center;">Add User</h2>

    <div class="container">
      <form name="addUserForm" class="form-horizontal" method="POST" action="/dbinteractions/admin/adduserquery.php">
        <div class="form-group">
          <label class="control-label col-sm-2" for="username">Username:</label>
          <div class="col-sm-8 input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="password">Password:</label>
          <div class="col-sm-8 input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-8 input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input type="password" class="form-control" id="password2" placeholder="Re-enter password" name="password2" required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Email:</label>
          <div class="col-sm-8 input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="permissions_level">Admin level:</label>
          <div class="col-sm-2 input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-console"></i></span>
            <select class="form-control" id="permissions_level" name="permissions_level" required>
            <?php
            //Populate permissions list with only those equal to current user's own
            switch ($_SESSION['authenticated'])
            {
              case '5': echo '<option value="5">5</option>';
              case '4': echo '<option value="4">4</option>';
              case '3': echo '<option value="3">3</option>';
              case '2': echo '<option value="2">2</option>';
              case '1': echo '<option value="1">1</option>';
            }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-2 input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-ok"></i></span>
            <button type="submit" class="btn btn-success form-control">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
