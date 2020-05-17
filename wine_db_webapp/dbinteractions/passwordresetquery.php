<!--
Author: Benjamin Steele
Project: CIS275 Wine Database Webapp - L'Enfant
Path: wine_db_app/dbinteractions/passwordresetquery.php
Date: 11/17/2017
Description: Server script for generating and sending a password reset email.
Local Files Used: wine_db_app/includes/DBconnection.php
-->
<?php
  ob_start();
  session_start();
  ini_set('display_errors', 1);


  $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
  require('../includes/DBconnection.php');


  //Sanitize text input
  $email = $dbconnection->real_escape_string($email);

  //Create token from timestamp
  $time = time();
  $hash = hash('sha256', $time);
  //Get external IP for email link

    $externalContent = file_get_contents('http://checkip.dyndns.com/');
    preg_match('/Current IP Address: \[?([:.0-9a-fA-F]+)\]?/', $externalContent, $m);
    $externalIP = $m[1];
    if(isset($externalIP))
    {
      $_SERVER['externalIP'] = $externalIP;
    }
    else
    {
      $externalIP = $Server['externalIP'];
    }



  //Check if email is in DB (no spamming foreign emails)
  $query = "SELECT * FROM users WHERE email = '". $email . "'";
  $results = $dbconnection->query($query);

  // If not in DB, confirm email sent anyway.
  $row = $results->fetch_array();
  if($row['email'] != $email)
  {
    header('Location: /passwordreset.php?success=1');
    exit;
  }


  // Write/run query for update
  $query = "UPDATE `users`
            SET password_reset_token = '" . $hash . "', reset_token_timestamp = '" . $time . "'
            WHERE email = '". $email . "'";

  //Email Variables
  $to = $email;

  /////////////////////////////////
  //SHOULD BE EDITED BY USER TO ACCESS EMAIL RESET
  $from = "wineDBwebapp@gmail.com";
  $emailpass = "";
  /////////////////////////////////

  $subject = "WineDB password reset";
  $link = $externalIP . ":" . $_SERVER['SERVER_PORT'] . "/newpassword.php?password_reset_token=" . $hash . "&email=" . $email;
  $message = '
  <html>
  <head>
    <title>WineDB Password Reset</title>
  </head>
  <body>
  <p>
    Hey there, someone requested a password reset for a WineDB account associated
    with this email address.
  <br />
    copy and paste the address at the bottom of the email if you
    would like to reset your password. This address expires in 30 minutes.
    <br>
    '. $link .'
  </p>
  <p>
  Cheers,<br />
  WineDB
  </body>
  </html>
  ';

  //Change namespace for PHPMailer
  use PHPMailer\PHPMailer\PHPMailer;
  require('../vendor/autoload.php');
  $mail = new PHPMailer;
  //Set up mailer.
  $mail->isSMTP();
  $mail->SMTPDebug = 2;
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 587;
  $mail->SMTPSecure = 'tls';
  $mail->SMTPAuth = true;
  $mail->Username = $from;
  $mail->Password = $emailpass;
  $mail->setFrom($from, 'WineDB WebApp');
  $mail->addAddress($email, '');
  $mail->Subject = $subject;
  $mail->msgHTML($message);
  //send the message, check for errors
  if (!$mail->send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
  } else {
      echo "Message sent!";
  }

  // DEBUG
  // echo $externalIP . "<br><br>";
  // echo $query . "<br><br>";
  // echo $message . "<br><br>";
  //
  // exit;

  //Query database.
  $results = $dbconnection->query($query);

  //Close connection
  $dbconnection->close();

  //Return to page with reported success (minimal information).
  header('Location: /passwordreset.php?success=1');
?>
