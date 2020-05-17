<!--
Author: Benjamin Steele
Project: CIS275 Wine Database Webapp - L'Enfant
Path: wine_db_app/dbinteractions/updateuserquery.php
Date: 11/17/2017
Description: Server script for updating a user.
Local Files Used: wine_db_app/includes/DBconnection.php
-->
<?php
  ob_start();
  session_start();
  ini_set('display_errors', 1);

  $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
  $password = $_POST['password'];
  $password2 = $_POST['password2'];
  $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
  $permissions = $_POST['permissions_level'];

  //If passwords do not match, redirect to updateuser with alert.
  if($password != $password2)
  {
    header('Location: /admin/updateuser.php?failed=1');
    exit;
  }
  //If admin account is being restricted, redirect to updateuser with alert.
  if($username == 'admin' && $permissions != 5)
  {
    header('Location: /admin/updateuser.php?failed=2');
    exit;
  }

  include('../../includes/DBconnection.php');

  //Sanitize text inputs
  $username = $dbconnection->real_escape_string($username);
  $password = $dbconnection->real_escape_string($password);
  $email = $dbconnection->real_escape_string($email);

  //Write query for update
  $query = "UPDATE `users` SET";
  //Query modification indicator.
  $queryEntry = 0;
  //If not whitespace or empty, update password.
  if(preg_match('[\S]', $password) || $password != "")
  {
    //Hash password
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = $query . " passphrase = '" . $password . "'";
    $queryEntry = 1;
  }
  //If not whitespace, update email.
  if(preg_match('[\S]', $email) || $email == "")
  {
    if($queryEntry == 1)
    {
      $query = $query . ",";
    }
    $query = $query . " email = '" . $email . "'";
    $queryEntry = 1;
  }
  //If not blank, update permissions.
  if($permissions != "")
  {
    if($queryEntry == 1)
    {
      $query = $query . ",";
    }
    $query = $query . " permissions_level = '" . $permissions . "'";
  }
  //Finish query.
  $query = $query . " WHERE username = '" . $username ."'";

  // DEBUG
  // echo $query . "<br>";
  // exit;

  //Query database.
  $results = $dbconnection->query($query);

  //Close connection
  $dbconnection->close();

  //If error, report database problem, else report success.
  if ($results == FALSE)
  {
    header('Location: /admin/updateuser.php?failed=3');
    exit;
  }
  else
  {
    header('Location: /admin/updateuser.php?success=1');
  }
?>
