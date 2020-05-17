<!--
Author: Benjamin Steele
Project: CIS275 Wine Database Webapp - L'Enfant
Path: wine_db_app/dbinteractions/adduserquery.php
Date: 11/17/2017
Description: Server script for adding a new user to the database.
Local Files Used: wine_db_app/includes/DBconnection.php
-->
<?php
  ob_start();
  session_start();
  ini_set('display_errors', 1);

  $varietal = filter_var($_POST['varietal'], FILTER_SANITIZE_STRING);

  include('../../includes/DBconnection.php');

  //Sanitize text inputs
  $varietal = $dbconnection->real_escape_string($varietal);

  //Write/run query for preventing duplicate varietals
  $query = sprintf("SELECT varietal_description FROM `varietals` WHERE varietal_description='%s'", $varietal);
  $results = $dbconnection->query($query);

  //If query returns any rows, redirect to adduser with alert.
  if($results->num_rows >= 1)
  {
    header('Location: /varietals/addvarietal.php?failed=1');
    exit;
  }

  //Write/run query for insertion
  $query = sprintf("INSERT INTO `varietals` (varietal_description) VALUES ('%s')",
            $varietal);

  $results = $dbconnection->query($query);

  //Close connection
  $dbconnection->close();

  //If error, report database problem, else report success.
  if ($results == FALSE)
  {
    header('Location: /varietals/addvarietal.php?failed=2');
    exit;
  }
  else
  {
    header('Location: /varietals/addvarietal.php?success=1');
  }
?>
