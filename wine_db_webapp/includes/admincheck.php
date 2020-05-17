<?php
session_start();

if(!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] < 4)
{
  header('Location: /home.php?unauthorized=1');
}

?>
