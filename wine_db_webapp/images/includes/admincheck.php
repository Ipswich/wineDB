<?php
session_start();

if(!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] < 5)
{
  header('Location: home.php?unauthorized=1');
}

?>
