<!--
Author: Benjamin Steele
Project: CIS275 Wine Database Webapp - L'Enfant
Path: wine_db_app/dbinteractions/removeuserquery.php
Date: 11/17/2017
Description: Server script for removing a user from the database.
Local Files Used: wine_db_app/includes/DBconnection.php
-->
<?php
  ob_start();
  session_start();
  ini_set('display_errors', 1);

  $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
  $username2 = filter_var($_POST['username2'], FILTER_SANITIZE_STRING);

  //Prevent admin from being removed.
  if($username == "admin")
  {
    header('Location: /admin/removeuser.php?failed=4');
    exit;
  }
  //If passwords DO NOT match, redirect to removeuser with alert.
  if($username != $username2)
  {
    header('Location: /admin/removeuser.php?failed=1');
    exit;
  }

  include('../../includes/DBconnection.php');

  //Sanitize text inputs
  $username = $dbconnection->real_escape_string($username);

  //Write/run query to ensure username is in database
  $query = sprintf("SELECT username FROM `users` WHERE username='%s'", $username);
  $results = $dbconnection->query($query);

  //If query returns any rows, redirect to adduser with alert
  if($results->num_rows == 0)
  {
    header('Location: /admin/removeuser.php?failed=2');
    exit;
  }

  //Write/run query for deletion
  $query = sprintf("DELETE FROM `users` WHERE username = '%s'",
            $username);

  $results = $dbconnection->query($query);

  //Close connection
  $dbconnection->close();

  //If error, report database problem, else report success.
  if ($results == FALSE)
  {
    header('Location: /admin/removeuser.php?failed=3');
    exit;
  }
  else
  {
    header('Location: /admin/removeuser.php?success=1');
  }
?>
