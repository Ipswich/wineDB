<?php
  ob_start();
  session_start();
  ini_set('display_errors', 1);
  include('includes/loggedincheck.php')
 ?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>WineDB Administrator Tools</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <?php
      include('includes/admincheck.php');
      include('includes/pageheadline.php');
      include('includes/navbar.php');
    ?>
    <div class="container">
      <h3 class="lead">These are the administrator tools. From here you can manage
        users.
      </h3>
    </div>
  </body>
</html>
