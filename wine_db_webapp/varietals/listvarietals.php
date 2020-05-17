<!--
Author: Benjamin Steele
Project: CIS275 Wine Database Webapp - L'Enfant
Path: wine_db_app/varietals/listvarietals.php
Date: 11/21/2017
Description: Defines the webpage for displaying all varietals.
Local Files Used: wine_db_app/includes/loggedincheck.php
                  wine_db_app/css/adminpages.css
                  wine_db_app/includes/pageheadline.php
                  wine_db_app/includes/navbar.php
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
    <title>WineDB List Varietals</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <?php
      include('../includes/pageheadline.php');
      include('../includes/navbar.php');
      include('../includes/DBconnection.php');

      //Write and run query for varietals
      $Query = "SELECT `varietals`.varietal_description AS `Wine Varieties`, COUNT(`wines`.wine_bottle_number) AS `Number of Bottles`
      FROM `varietals`
      LEFT JOIN `wines` ON `varietals`.varietal_description=`wines`.varietal_description
      GROUP BY `wines`.varietal_description
      ORDER BY `varietals`.varietal_description";

      $results = $dbconnection->query($Query);
      //Set up table
      echo '<div class="col-sm-offset-2 col-sm-8">';
      echo '<table class="table">';
      echo '<tr>';
      echo '<th>Wine Varieties</th>';
      echo '<th>Number of Bottles</th>';
      echo '</tr>';

      //While there is data, print each row.
      while($row = $results->fetch_array())
      {
        echo '<tr class="active">';
        echo '<td>'.$row["Wine Varieties"].'</td>';
        echo '<td>'.$row["Number of Bottles"].'</td>';
        echo '</tr>';
      }
      echo '</table>';
      echo '</div>';

      //Clear memory
      $results->free();
      //Close DB connection
      $dbconnection->close();
    ?>
  </body>
</html>
