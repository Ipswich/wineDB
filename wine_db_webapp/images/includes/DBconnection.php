<?php
$host = "127.0.0.1";
$port = 3306;
$database = "wine_db";
$userlogin = "wine_db_webapp";
$userpassword = "HcsBagh.Hawb.Eawc,ahcui.Bwh,asiuh.OSC_wine";

$dbconnection = new mysqli($host, $userlogin, $userpassword, $database);
if(!$dbconnection)
{
    die("Connection could not be established: " . mysqli_connect_error());
}
?>
