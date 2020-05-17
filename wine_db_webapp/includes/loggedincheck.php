<!--
Author: Benjamin Steele
Project: CIS275 Wine Database Webapp - L'Enfant
Path: wine_db_app/includes/loggedincheck.php
Date: 11/17/2017
Description: Server script for ensuring a visitor is logged in.
-->
<?php
session_start();

//If no authentication or authentication below 1, redirect to login page with error.
if(!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] < 1)
{
  header('Location: /index.php?invalidlogin=2');
}

?>
