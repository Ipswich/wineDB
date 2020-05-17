<?php
session_start();

if(!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] < 1)
{
  header('Location: index.php?invalidlogin=2');
}

?>
