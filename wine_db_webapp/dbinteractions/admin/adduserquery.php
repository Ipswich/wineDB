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

  $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
  $password = $_POST['password'];
  $password2 = $_POST['password2'];
  $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
  $permissions = $_POST['permissions_level'];

  //If passwords DO NOT match, redirect to adduser with alert.
  if($password != $password2)
  {
    header('Location: /admin/adduser.php?failed=1');
    exit;
  }

  include('../../includes/DBconnection.php');

  //Sanitize text inputs
  $username = $dbconnection->real_escape_string($username);
  $password = $dbconnection->real_escape_string($password);
  $email = $dbconnection->real_escape_string($email);

  //Hash password
  $password = password_hash($password, PASSWORD_DEFAULT);

  //Write/run query for preventing duplicate usernames
  $query = sprintf("SELECT username FROM `users` WHERE username='%s'", $username);
  $results = $dbconnection->query($query);

  //If query returns any rows, redirect to adduser with alert.
  if($results->num_rows >= 1)
  {
    header('Location: /admin/adduser.php?failed=3');
    exit;
  }

  //Write/run query for insertion
  $query = sprintf("INSERT INTO `users`(username, passphrase, email, permissions_level) VALUES ('%s', '%s' ,'%s' , '%s')",
            $username, $password, $email, $permissions);
  $results = $dbconnection->query($query);

  //Close connection
  $dbconnection->close();

  //If error, report database problem, else report success.
  if ($results == FALSE)
  {
    header('Location: /admin/adduser.php?failed=2');
    exit;
  }
  else
  {
    header('Location: /admin/adduser.php?success=1');
  }
?>
