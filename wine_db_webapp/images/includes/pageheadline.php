<?php
  switch($_SERVER['REQUEST_URI'])
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
  }
  echo '<div class="container">';
    echo '<div class="jumbotron">';
      echo '<h1 class="text-center">' . $pageHeadline . '</h1>';
    echo '</div>';
  echo '</div>';
?>
