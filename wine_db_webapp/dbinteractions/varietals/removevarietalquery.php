<!--
Author: Benjamin Steele
Project: CIS275 Wine Database Webapp - L'Enfant
Path: wine_db_app/dbinteractions/removeuserquery.php
Date: 11/17/2017
Description: Server script for removing a varietal from the database.
Local Files Used: wine_db_app/includes/DBconnection.php
-->
<?php
  ob_start();
  session_start();
  ini_set('display_errors', 1);

  $varietal = filter_var($_POST['varietal'], FILTER_SANITIZE_STRING);
  $varietal2 = filter_var($_POST['varietal2'], FILTER_SANITIZE_STRING);

  //If varietals DO NOT match, redirect to remove varietal with alert.
  if($varietal != $varietal2)
  {
    header('Location: /varietals/removevarietal.php?failed=1');
    exit;
  }

  include('../../includes/DBconnection.php');

  //Sanitize text inputs
  $varietal = $dbconnection->real_escape_string($varietal);

  //Write/run query to ensure username is in database
  $query = sprintf("SELECT varietal_description FROM `varietals` WHERE varietal_description='%s'", $varietal);
  $results = $dbconnection->query($query);

  //If query returns any rows, redirect to adduser with alert
  if($results->num_rows == 0)
  {
    header('Location: /varietals/removevarietal.php?failed=2');
    exit;
  }

  //Write/run query for deletion
  $query = sprintf("DELETE FROM `varietals` WHERE varietal_description = '%s'",
            $username);

  //DEBUG
  // echo $query;
  // exit;

  $results = $dbconnection->query($query);

  //Close connection
  $dbconnection->close();

  //If error, report database problem, else report success.
  if ($results == FALSE)
  {
    header('Location: /varietals/removevarietal.php?failed=3');
    exit;
  }
  else
  {
    header('Location: /varietals/removevarietal.php?success=1');
  }
?>
