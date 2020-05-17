<!--
Author: Benjamin Steele
Project: CIS275 Wine Database Webapp - L'Enfant
Path: wine_db_app/includes/authentications/authenticatedcheck2.php
Date: 11/17/2017
Description: Server script for checking if a users authentication is high enough.
-->
<?php
session_start();

//Authentication check if below listed value, redirect to home page with error.
if(!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] < 2)
{
  header('Location: /home.php?unauthorized=1');
}

?>
