<!--
Author: Benjamin Steele
Project: CIS275 Wine Database Webapp - L'Enfant
Path: wine_db_app/dbinteractions/loginauthentication.php
Date: 11/17/2017
Description: Server script for logging in a user.
Local Files Used: wine_db_app/includes/DBconnection.php
-->
<?php
  ob_start();
  session_start();
  ini_set('display_errors', 1);

  $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
  $password = $_POST['password'];

  include('../includes/DBconnection.php');

  //Query database for login information.
  $username = $dbconnection->real_escape_string($username);
  $query = sprintf("SELECT passphrase, permissions_level FROM `users` WHERE username='%s'",
            $username);


  $results = $dbconnection->query($query);

  //Extract data from array.
  $row = $results->fetch_array();
  $hash = $row['passphrase'];
  $permissions_level = $row['permissions_level'];

  //If password is valid, authenticate and redirect to home page, else redirect
  //to login page.
  if (password_verify($password, $hash))
  {
    $query = sprintf("UPDATE `users` SET last_login = SYSDATE() WHERE username='%s'", $username);
    $results = $dbconnection->query($query);
    $_SESSION["authenticated"] = $permissions_level;
    $_SESSION["username"] = $username;
    $dbconnection->close();
    header('Location: ../home.php');
  }
  else
  {
    $results->free();
    $dbconnection->close();
    header('Location: ../index.php?invalidlogin=1');
  }
?>
