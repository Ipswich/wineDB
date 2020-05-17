<!--
Author: Benjamin Steele
Project: CIS275 Wine Database Webapp - L'Enfant
Path: wine_db_app/home.php
Date: 11/17/2017
Description: Defines the webpage landing for when a user logs in. The main page.
Local Files Used: wine_db_app/includes/loggedincheck.php
                  wine_db_app/css/home.css
                  wine_db_app/includes/pageheadline.php
                  wine_db_app/includes/navbar.php
                  wine_db_app/includes/DBconnection.php
-->
<?php
  ob_start();
  session_start();
  include('includes/loggedincheck.php')
 ?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>WineDB Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <?php
      include('includes/pageheadline.php');
      include('includes/navbar.php');
      include('includes/DBconnection.php');
      //Alert on unauthorized access.
      if($_GET["unauthorized"] == "1")
      {
        echo '<div class="login-alert alert alert-danger" role="alert"> <strong>Unauthorized.</strong> Access denied.</div>';
      }
    ?>
    <div class="container">
      <h3 class="lead">Welcome to WineDB! This is the home page, where you can
      access a variety of tools to help you manage your wine collection. </h3>
    </div>
    <div class="container col-sm-offset-2 col-sm-8 homebutton">
      <button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href='/wines/searchwines.php'">
        <span class="glyphicon glyphicon-search"></span>
        Search Wines
      </button>
      <button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href='/wines/addwine.php'">
        <span class="glyphicon glyphicon-plus"></span>
        Add Wines
      </button>
      <button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href='/wines/removewine.php'">
        <span class="glyphicon glyphicon-remove"></span>
        Remove Wine
      </button>
    </div>
      <?php
      // echo '<div class="container col-sm-offset-2 col-sm-8"><h4><u>Stats for nerds</u></h4>'
      // $bottleNumberQuery = "SELECT COUNT(ALL wine_bottle_number) FROM wines";
      //NOT DONE (TODO)
      // $mostFrequentVarietalQuery = "SELECT varietal_description, COUNT(varietal_description)
      //                               FROM WINES
      //                               GROUP BY varietal_description
      //                               ORDER BY COUNT(*) DESC
      //                               LIMIT 1";
      // $leastFrequentVarietalQuery = ;
      // $oldestBottlesQuery = SELECT ;
      // $strongestBottleQuery = ;
      // $mostCommonProducerQuery = ;
      // $mostCommonAppelationQuery = ;
      // $wineWithMostBottlesQuery = ;
      // $LastPurchaseQuery = ;
      ?>
    </div>
  </body>
</html>
