<!--
Author: Benjamin Steele
Project: CIS275 Wine Database Webapp - L'Enfant
Path: wine_db_app/dbinteractions/removewinequery.php
Date: 11/28/2017
Description: Server script for removing a wine from the database.
Local Files Used: wine_db_app/includes/DBconnection.php
-->
<?php
  ob_start();
  session_start();
  ini_set('display_errors', 1);

  $bottle = filter_var($_POST['bottle'], FILTER_SANITIZE_STRING);
  $bottle2 = filter_var($_POST['bottle2'], FILTER_SANITIZE_STRING);

  //If bottles DO NOT match, redirect to remove varietal with alert.
  if($bottle != $bottle2)
  {
    header('Location: /wines/removewine.php?failed=1');
    exit;
  }

  include('../../includes/DBconnection.php');

  //Sanitize text inputs
  $bottle = $dbconnection->real_escape_string($bottle);

  //Get location of bottle before removal
  $query = $dbconnection->prepare("SELECT `storage_location` FROM `wines` WHERE wine_bottle_number = ?");
  $query->bind_param("i", $bottle);
  $location = $query->execute();
  $location = $query->get_result();
  $location = $location->fetch_array(MYSQLI_NUM);
  $location = $location[0];
  if (!$location)
  {
    header('Location: /wines/removewine.php?failed=2');
    exit;
  }

  //Set in storage to 0, change location to 0-0-00-0-00
  $query = $dbconnection->prepare("UPDATE `wines` SET `in_storage` = 0, `storage_location` =  0-0-00-0-00, `removed_by` = ?, `date_removed` = SYSDATE() WHERE `wine_bottle_number` = ?");
  $query->bind_param("si", $_SESSION['username'], $bottle);
  $results = $query->execute();
  //Close connection
  $dbconnection->close();

  //If error, report database problem, else report success.
  if ($results == FALSE)
  {
    header('Location: /wines/removewine.php?failed=3');
    exit;
  }
  else
  {
    $redirectLocation = '/wines/removewine.php?success=1&location=' . $location;
    echo $redirectLocation;
    header('Location: ' . $redirectLocation);
  }
?>
