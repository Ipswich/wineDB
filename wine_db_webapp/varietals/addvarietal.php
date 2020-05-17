<!--
Author: Benjamin Steele
Project: CIS275 Wine Database Webapp - L'Enfant
Path: wine_db_app/varietals/addvarietal.php
Date: 11/21/2017
Description: Defines the webpage for adding a varietal.
Local Files Used: wine_db_app/includes/loggedincheck.php
                  wine_db_app/css/adminpages.css
                  wine_db_app/includes/authenticatedcheck3.php
                  wine_db_app/includes/pageheadline.php
                  wine_db_app/includes/navbar.php
                  wine_db_app/dbinteractions/varietals/addvarietalquery.php
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
    <title>WineDB Add Varietal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <?php
      include('../includes/pageheadline.php');
      include('../includes/navbar.php');

      //Alerts on failures or success.
      if($_GET["failed"] == "1")
      {
        echo '<div class="login-alert alert alert-danger" role="alert"> <strong>Add varietal failed.</strong> Varietal already exists.</div>';
      }
      if($_GET["failed"] == "2")
      {
        echo '<div class="login-alert alert alert-danger" role="alert"> <strong>Add varietal failed.</strong> Database error.</div>';
      }
      if($_GET["success"] == "1")
      {
        echo '<div class="login-alert alert alert-success" role="alert"> <strong>Success.</strong> Varietal added.</div>';
      }
    ?>


    <h2 style="text-align: center;">Add Varietal</h2>
      <div class="container">
        <form name="addVarietalForm" class="form-horizontal" method="POST" action="/dbinteractions/varietals/addvarietalquery.php">
          <div class="form-group">
            <label class="control-label col-sm-2" for="varietal">Varietal:</label>
            <div class="col-sm-8 input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-plus"></i></span>
              <input type="text" class="form-control" id="varietal" placeholder="" name="varietal" required>
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
