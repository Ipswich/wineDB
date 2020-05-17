<!--
Author: Benjamin Steele
Project: CIS275 Wine Database Webapp - L'Enfant
Path: wine_db_app/logout.php
Date: 11/17/2017
Description: Server script for loggin out a user.
-->
<?php
//Destroy session.
session_start();
session_unset();
session_destroy();
header('Location: index.php?invalidlogin=3');
?>
