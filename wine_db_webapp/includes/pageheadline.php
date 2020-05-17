<!--
Author: Benjamin Steele
Project: CIS275 Wine Database Webapp - L'Enfant
Path: wine_db_app/includes/pageheadline.php
Date: 11/17/2017
Description: Server script for generating the page headline.
-->
<?php
echo '<link rel="stylesheet" href="/css/pageheadline.css">';

//Define address path for page title
$address = explode('?', $_SERVER['REQUEST_URI'], 2);

//Switch statement to define page title.
  switch($address[0])
  {
  case "/home.php":
    $pageHeadline = "WineDB Home";
    break;
  case "/admin.php":
    $pageHeadline = "Administrator Tools";
    break;
  case "/admin/adduser.php":
    $pageHeadline = "Add User";
    break;
  case "/admin/listusers.php":
    $pageHeadline = "Users List";
    break;
  case "/admin/removeuser.php":
    $pageHeadline = "Remove User";
    break;
  case "/admin/updateuser.php":
    $pageHeadline = "Update User";
    break;
  case "/varietals/listvarietals.php":
    $pageHeadline = "Varietals List";
    break;
  case "/varietals/addvarietal.php":
    $pageHeadline = "Add Varietal";
    break;
  case "/varietals/removevarietal.php":
    $pageHeadline = "Remove Varietal";
    break;
  case "/wines/searchwines.php":
    $pageHeadline = "Search Wines";
    break;
  case "/wines/searchwinesresults.php":
    $pageHeadline = "Search Results";
    break;
  case "/wines/addwine.php":
    $pageHeadline = "Add Wines";
    break;
  case "/wines/removewine.php":
    $pageHeadline = "Remove Wine";
    break;
  case "/dbinteractions/wines/searchwinesquery.php":
    $pageHeadline = "Search Results";
    break;
  }
  echo '<div class="container">';
    echo '<div class="jumbotron" id="jumbotron">';
      echo '<h1 class="text-center">' . $pageHeadline . '</h1>';
    echo '</div>';
  echo '</div>';
?>
