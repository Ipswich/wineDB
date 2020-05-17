<!--
Author: Benjamin Steele
Project: CIS275 Wine Database Webapp - L'Enfant
Path: wine_db_app/admin/listuser.php
Date: 11/17/2017
Description: Defines the webpage for displaying all users.
Local Files Used: wine_db_app/css/adminpages.css
                  wine_db_app/includes/loggedincheck.php
                  wine_db_app/includes/authenticatedcheck3.php
                  wine_db_app/includes/pageheadline.php
                  wine_db_app/includes/navbar.php
                  wine_db_app/includes/DBconnection.php
-->
<?php
  ob_start();
  session_start();
  include('../includes/loggedincheck.php');
 ?>
 <!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="css/adminpages.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>WineDB User List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <?php
      include('../includes/authentications/authenticatedcheck3.php');
      include('../includes/pageheadline.php');
      include('../includes/navbar.php');
      include('../includes/DBconnection.php');

      //Write and run query
      $query = "SELECT username AS 'Username', email AS 'Email', permissions_level AS 'Admin Level', DATE_FORMAT(last_login, '%b %D, %Y @ %l:%i %p') AS 'Last Login'
                FROM `users` ORDER BY Username";
      $results = $dbconnection->query($query);

      //Set up table
      echo '<div class="col-sm-offset-1 col-sm-10">';
      echo '<table class="table">';
      echo '<tr>';
      echo '<th>Username</th>';
      echo '<th>Email</th>';
      echo '<th>Admin Level</th>';
      echo '<th>Last Login (Server Time)</th>';
      echo '</tr>';

      //While there is data, print each row.
      while($row = $results->fetch_array())
      {
        echo '<tr class="active">';
        echo '<td>'.$row["Username"].'</td>';
        echo '<td>'.$row["Email"].'</td>';
        echo '<td>'.$row["Admin Level"].'</td>';
        echo '<td>'.$row["Last Login"].'</td>';
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
