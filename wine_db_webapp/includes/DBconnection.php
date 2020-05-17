<!--
Author: Benjamin Steele
Project: CIS275 Wine Database Webapp - L'Enfant
Path: wine_db_app/includes/DBconnection.php
Date: 11/17/2017
Description: Server script for creating a connection to the database.
-->
<?php
//MariaDB connection information
$host = "127.0.0.1";
$port = 3306;
$database = "wine_db";
$userlogin = "wine_db_webapp";
$userpassword = "HcsBagh.Hawb.Eawc,ahcui.Bwh,asiuh.OSC_wine";

//Create connection to database as $dbconnection, die with error otherwise.
$dbconnection = new mysqli($host, $userlogin, $userpassword, $database);
if(!$dbconnection)
{
    die("Connection could not be established: " . mysqli_connect_error());
    exit;
}
?>
