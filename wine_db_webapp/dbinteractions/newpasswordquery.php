<!--
Author: Benjamin Steele
Project: CIS275 Wine Database Webapp - L'Enfant
Path: wine_db_app/dbinteractions/adduserquery.php
Date: 11/17/2017
Description: Server script for updating a users password.
Local Files Used: wine_db_app/includes/DBconnection.php
-->
<?php
  ob_start();
  session_start();
  ini_set('display_errors', 1);

  $password_reset_token = filter_var($_POST['password_reset_token'], FILTER_SANITIZE_STRING);
  $password1 = $_POST['password1'];
  $password2 = $_POST['password2'];
  $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);


  //If passwords DO NOT match, redirect to adduser with alert.
  if($password1 != $password2)
  {
    header('Location: /newpassword.php?password_reset_token=' . $password_reset_token . '&email=' . $email . '&failed=1');
    exit;
  }

  include('../includes/DBconnection.php');

  //Sanitize text inputs
  $username = $dbconnection->real_escape_string($password_reset_token);
  $password1 = $dbconnection->real_escape_string($password1);
  $email = $dbconnection->real_escape_string($email);

  //Hash password
  $password1 = password_hash($password1, PASSWORD_DEFAULT);

  //Write/run query for confirming ID (token/email) AND selecting timestamp
  $query = sprintf("SELECT reset_token_timestamp FROM users WHERE password_reset_token='%s' AND email='%s'", $password_reset_token, $email);
  $results = $dbconnection->query($query);

  //If query returns no rows, redirect to newpassword with alert.
  if($results->num_rows == 0)
  {
    header('Location: /newpassword.php?password_reset_token=' . $password_reset_token . '&email=' . $email . '&failed=2');
    exit;
  }

  //If timestamp older than 30 minutes, redirect to newpassword with alert.
  $row = $results->fetch_array();
  if($row['reset_token_timestamp'] > (time() + 1800))
  {
    header('Location: /newpassword.php?password_reset_token=' . $password_reset_token . '&email=' . $email . '&failed=2');
    exit;
  }

  //Write/run query for insertion
  $query = sprintf("UPDATE `users` SET passphrase = '%s' WHERE password_reset_token = '%s' AND email='%s'",
            $password1, $password_reset_token, $email);

  // //DEBUG
  // echo $query . "<br><br>";
  // exit;

  $results = $dbconnection->query($query);

  //Close connection
  $dbconnection->close();

  //If error, report database problem, else report success.
  if ($results == FALSE)
  {
    header('Location: /newpassword.php?password_reset_token=' . $password_reset_token . '&email=' . $email . '&failed=3');
    exit;
  }
  else
  {
    header('Location: /index.php?success=1');
  }
?>
