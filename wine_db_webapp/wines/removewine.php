<!--
Author: Benjamin Steele
Project: CIS275 Wine Database Webapp - L'Enfant
Path: wine_db_app/wines/removewine.php
Date: 11/22/2017
Description: Defines the webpage for removing a wine.
Local Files Used: wine_db_app/includes/loggedincheck.php
                  wine_db_app/css/adminpages.css
                  wine_db_app/includes/authenticatedcheck2.php
                  wine_db_app/includes/pageheadline.php
                  wine_db_app/includes/navbar.php
                  wine_db_app/dbinteractions/wines/removewinequery.php
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
    <title>WineDB Remove Wine</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <?php
      include('../includes/authentications/authenticatedcheck2.php');
      include('../includes/pageheadline.php');
      include('../includes/navbar.php');

      //Alerts on failures or success.
      if($_GET["failed"] == "1")
      {
        echo '<div class="login-alert alert alert-danger" role="alert"> <strong>Remove bottle failed.</strong> Bottle numbers do not match.</div>';
      }
      if($_GET["failed"] == "2")
      {
        echo '<div class="login-alert alert alert-danger" role="alert"> <strong>Remove bottle failed.</strong> Bottle does not exist.</div>';
      }
      if($_GET["failed"] == "3")
      {
        echo '<div class="login-alert alert alert-danger" role="alert"> <strong>Remove bottle failed.</strong> Database error.</div>';
      }
      if($_GET["success"] == "1")
      {
        echo '<div class="login-alert alert alert-success" role="alert"> <strong>Success. </strong>Bottle removed.<br>Last recorded location is: <strong>' . $_GET["location"] . '</strong></div>';
      }
      ?>
      <h2 style="text-align: center;">Remove wine</h2>
      <h6 style="text-align: center;">Wines can only be removed by bottle number.</h6>
      <div class="container">
        <form name="addUserForm" class="form-horizontal" method="POST" action="/dbinteractions/wines/removewinequery.php">
          <div class="form-group">
            <label class="control-label col-sm-3" for="bottle">Bottle Number:</label>
            <div class="col-sm-6 input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-glass"></i></span>
              <input type="number" step="1" class="form-control" id="bottle" placeholder="Enter bottle number" name="bottle" required>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6 input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-glass"></i></span>
              <input type="number" step="1" class="form-control" id="bottle2" placeholder="Confirm bottle number" name="bottle2" required>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-2 input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-remove"></i></span>
              <button type="submit" class="btn btn-danger form-control">Remove</button>
            </div>
          </div>
        </form>
      </div>
  </body>
</html>
