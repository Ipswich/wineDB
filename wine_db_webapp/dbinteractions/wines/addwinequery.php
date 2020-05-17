<!--
Author: Benjamin Steele
Project: CIS275 Wine Database Webapp - L'Enfant
Path: wine_db_app/dbinteractions/addwinesquery.php
Date: 11/28/2017
Description: Server script for adding a new wine(s) to the database.
Local Files Used: wine_db_app/includes/DBconnection.php
-->
<?php
  ob_start();
  session_start();
  ini_set('display_errors', 1);

  include('../../includes/DBconnection.php');

  //Create new transaction
  $dbconnection->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);

  $quantity = 1;

  if (isset($_POST['name1']))
    $quantity = 2;
  if (isset($_POST['name2']))
    $quantity = 3;
  if (isset($_POST['name3']))
    $quantity = 4;
  if (isset($_POST['name4']))
    $quantity = 5;


  $location = "";
  $date = "";
  $location = filter_var($_POST['location'], FILTER_SANITIZE_STRING);
  $date = filter_var($_POST['date'], FILTER_SANITIZE_STRING);

  //Define Table Inserts
  $winequery = $dbconnection->prepare("INSERT INTO `wines` (`wine_name`, `vintage`, `varietal_description`, `sweetness_level`, `storage_location`, `stopper`, `reserve`, `producer`, `notes`, `future`, `finish`, `estate_bottled`, `color`, `bottle_size`, `bottle_label_image`, `body`, `blended`, `alcohol_level`, `appellation`, `added_by`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $purchaseInsertQuery = $dbconnection->prepare("INSERT INTO `purchases` (`purchase_location`, `quantity`, `date_of_purchase`) VALUES (?,?,?)");
  $addTransactionQuery = $dbconnection->prepare("INSERT INTO `transactions` (`bottle_price`, `wine_bottle_number`, `purchase_id`) VALUES (?,?,?)");
  //Insert New Purchase
  $purchaseInsertQuery->bind_param("sis", $location, $quantity, $date);
  $purchaseInsertQuery->execute();
  $purchaseInsertQuery->close();
  //Get purchase ID
  $purchaseID = $dbconnection->insert_id;


  //Create Add Wine Queries
  if (isset($_POST['name4']))
  {

      $name4 = filter_var($_POST['name4'], FILTER_SANITIZE_STRING);
      $vintage4 = filter_var($_POST['vintage4'], FILTER_SANITIZE_STRING);
      $varietal4 = filter_var($_POST['varietal4'], FILTER_SANITIZE_STRING);
      $storage4 = filter_var($_POST['storage4'], FILTER_SANITIZE_STRING);
      $price4 = filter_var($_POST['price4'], FILTER_SANITIZE_STRING);
      $sweetness4 = filter_var($_POST['sweetness4'], FILTER_SANITIZE_STRING);
      $stopper4 = filter_var($_POST['stopper4'], FILTER_SANITIZE_STRING);
      $producer4 = filter_var($_POST['producer4'], FILTER_SANITIZE_STRING);
      $finish4 = filter_var($_POST['finish4'], FILTER_SANITIZE_STRING);
      $color4 = filter_var($_POST['color4'], FILTER_SANITIZE_STRING);
      $size4 = filter_var($_POST['size4'], FILTER_SANITIZE_STRING);
      $body4 = filter_var($_POST['body4'], FILTER_SANITIZE_STRING);
      $abv4 = filter_var($_POST['abv4'], FILTER_SANITIZE_STRING);
      $appellation4 = filter_var($_POST['appellation4'], FILTER_SANITIZE_STRING);
      $notes4 = filter_var($_POST['notes4'], FILTER_SANITIZE_STRING);

      //SET IMAGE UPLOAD (TO-DO)
      // if (isset($_POST['image']))
      //   $image = filter_var($_POST['label'], FILTER_SANITIZE_STRING);
      // else
        $image4 = "";

      //SET CHECK BOXES
      if (isset($_POST['reserve4']))
        $reserve4 = 1;
      else
        $reserve4 = 0;

      if (isset($_POST['estate4']))
        $estate4 = 1;
      else
        $estate4 = 0;

      if (isset($_POST['future4']))
        $future4 = 1;
      else
        $future4 = 0;

      if (isset($_POST['blended4']))
        $blended4 = 1;
      else
        $blended4 = 0;

        $winequery->bind_param("sissssissisissssisss", $name4, $vintage4, $varietal4, $sweetness4, $storage4, $stopper4, $reserve4, $producer4, $notes4, $future4, $finish4, $estate4, $color4, $size4, $image4, $body4, $blended4, $abv4, $appellation4, $_SESSION['username']);
        $winequery->execute();
        $wine4BottleNumber = $dbconnection->insert_id;
        $addTransactionQuery->bind_param("dii", $price4, $wine4BottleNumber, $purchaseID);
        $addTransactionQuery->execute();
        $transaction4Number = $dbconnection->insert_id;
  }

  //THIRD EXTRA WINE BOTTLE
  if (isset($_POST['name3']))
  {

      $name3 = filter_var($_POST['name3'], FILTER_SANITIZE_STRING);
      $vintage3 = filter_var($_POST['vintage3'], FILTER_SANITIZE_STRING);
      $varietal3 = filter_var($_POST['varietal3'], FILTER_SANITIZE_STRING);
      $storage3 = filter_var($_POST['storage3'], FILTER_SANITIZE_STRING);
      $price3 = filter_var($_POST['price3'], FILTER_SANITIZE_STRING);
      $sweetness3 = filter_var($_POST['sweetness3'], FILTER_SANITIZE_STRING);
      $stopper3 = filter_var($_POST['stopper3'], FILTER_SANITIZE_STRING);
      $producer3 = filter_var($_POST['producer3'], FILTER_SANITIZE_STRING);
      $finish3 = filter_var($_POST['finish3'], FILTER_SANITIZE_STRING);
      $color3 = filter_var($_POST['color3'], FILTER_SANITIZE_STRING);
      $size3 = filter_var($_POST['size3'], FILTER_SANITIZE_STRING);
      $body3 = filter_var($_POST['body3'], FILTER_SANITIZE_STRING);
      $abv3 = filter_var($_POST['abv3'], FILTER_SANITIZE_STRING);
      $appellation3 = filter_var($_POST['appellation3'], FILTER_SANITIZE_STRING);
      $notes3 = filter_var($_POST['notes3'], FILTER_SANITIZE_STRING);

      //SET IMAGE UPLOAD (TO-DO)
      // if (isset($_POST['image']))
      //   $image = filter_var($_POST['label'], FILTER_SANITIZE_STRING);
      // else
        $image3 = "";

      //SET CHECK BOXES
      if (isset($_POST['reserve3']))
        $reserve3 = 1;
      else
        $reserve3 = 0;

      if (isset($_POST['estate3']))
        $estate3 = 1;
      else
        $estate3 = 0;

      if (isset($_POST['future3']))
        $future3 = 1;
      else
        $future3 = 0;

      if (isset($_POST['blended3']))
        $blended3 = 1;
      else
        $blended3 = 0;

        $winequery->bind_param("sissssissisissssisss", $name3, $vintage3, $varietal3, $sweetness3, $storage3, $stopper3, $reserve3, $producer3, $notes3, $future3, $finish3, $estate3, $color3, $size3, $image3, $body3, $blended3, $abv3, $appellation3, $_SESSION['username']);
        $winequery->execute();
        $wine3BottleNumber = $dbconnection->insert_id;
        $addTransactionQuery->bind_param("dii", $price3, $wine3BottleNumber, $purchaseID);
        $addTransactionQuery->execute();
        $transaction3Number = $dbconnection->insert_id;
  }

  //SECOND EXTRA WINE BOTTLE
  if (isset($_POST['name2']))
  {

      $name2 = filter_var($_POST['name2'], FILTER_SANITIZE_STRING);
      $vintage2 = filter_var($_POST['vintage2'], FILTER_SANITIZE_STRING);
      $varietal2 = filter_var($_POST['varietal2'], FILTER_SANITIZE_STRING);
      $storage2 = filter_var($_POST['storage2'], FILTER_SANITIZE_STRING);
      $price2 = filter_var($_POST['price2'], FILTER_SANITIZE_STRING);
      $sweetness2 = filter_var($_POST['sweetness2'], FILTER_SANITIZE_STRING);
      $stopper2 = filter_var($_POST['stopper2'], FILTER_SANITIZE_STRING);
      $producer2 = filter_var($_POST['producer2'], FILTER_SANITIZE_STRING);
      $finish2 = filter_var($_POST['finish2'], FILTER_SANITIZE_STRING);
      $color2 = filter_var($_POST['color2'], FILTER_SANITIZE_STRING);
      $size2 = filter_var($_POST['size2'], FILTER_SANITIZE_STRING);
      $body2 = filter_var($_POST['body2'], FILTER_SANITIZE_STRING);
      $abv2 = filter_var($_POST['abv2'], FILTER_SANITIZE_STRING);
      $appellation2 = filter_var($_POST['appellation2'], FILTER_SANITIZE_STRING);
      $notes2 = filter_var($_POST['notes2'], FILTER_SANITIZE_STRING);

      //SET IMAGE UPLOAD (TO-DO)
      // if (isset($_POST['image']))
      //   $image = filter_var($_POST['label'], FILTER_SANITIZE_STRING);
      // else
        $image2 = "";

      //SET CHECK BOXES
      if (isset($_POST['reserve2']))
        $reserve2 = 1;
      else
        $reserve2 = 0;

      if (isset($_POST['estate2']))
        $estate2 = 1;
      else
        $estate2 = 0;

      if (isset($_POST['future2']))
        $future2 = 1;
      else
        $future2 = 0;

      if (isset($_POST['blended2']))
        $blended2 = 1;
      else
        $blended2 = 0;

        $winequery->bind_param("sissssissisissssisss", $name2, $vintage2, $varietal2, $sweetness2, $storage2, $stopper2, $reserve2, $producer2, $notes2, $future2, $finish2, $estate2, $color2, $size2, $image2, $body2, $blended2, $abv2, $appellation2, $_SESSION['username']);
        $winequery->execute();
        $wine2BottleNumber = $dbconnection->insert_id;
        $addTransactionQuery->bind_param("dii", $price2, $wine2BottleNumber, $purchaseID);
        $addTransactionQuery->execute();
        $transaction2Number = $dbconnection->insert_id;
  }
  //FIRST EXTRA WINE BOTTLE
  if (isset($_POST['name1']))
  {
    $name1 = filter_var($_POST['name1'], FILTER_SANITIZE_STRING);
    $vintage1 = filter_var($_POST['vintage1'], FILTER_SANITIZE_STRING);
    $varietal1 = filter_var($_POST['varietal1'], FILTER_SANITIZE_STRING);
    $storage1 = filter_var($_POST['storage1'], FILTER_SANITIZE_STRING);
    $price1 = filter_var($_POST['price1'], FILTER_SANITIZE_STRING);
    $sweetness1 = filter_var($_POST['sweetness1'], FILTER_SANITIZE_STRING);
    $stopper1 = filter_var($_POST['stopper1'], FILTER_SANITIZE_STRING);
    $producer1 = filter_var($_POST['producer1'], FILTER_SANITIZE_STRING);
    $finish1 = filter_var($_POST['finish1'], FILTER_SANITIZE_STRING);
    $color1 = filter_var($_POST['color1'], FILTER_SANITIZE_STRING);
    $size1 = filter_var($_POST['size1'], FILTER_SANITIZE_STRING);
    $body1 = filter_var($_POST['body1'], FILTER_SANITIZE_STRING);
    $abv1 = filter_var($_POST['abv1'], FILTER_SANITIZE_STRING);
    $appellation1 = filter_var($_POST['appellation1'], FILTER_SANITIZE_STRING);
    $notes1 = filter_var($_POST['notes1'], FILTER_SANITIZE_STRING);

    //SET IMAGE UPLOAD (TO-DO)
    // if (isset($_POST['image']))
    //   $image = filter_var($_POST['label'], FILTER_SANITIZE_STRING);
    // else
      $image1 = "";

    //SET CHECK BOXES
    if (isset($_POST['reserve1']))
      $reserve1 = 1;
    else
      $reserve1 = 0;

    if (isset($_POST['estate1']))
      $estate1 = 1;
    else
      $estate1 = 0;

    if (isset($_POST['future1']))
      $future1 = 1;
    else
      $future1 = 0;

    if (isset($_POST['blended1']))
      $blended1 = 1;
    else
      $blended1 = 0;

      $winequery->bind_param("sissssissisissssisss", $name1, $vintage1, $varietal1, $sweetness1, $storage1, $stopper1, $reserve1, $producer1, $notes1, $future1, $finish1, $estate1, $color1, $size1, $image1, $body1, $blended1, $abv1, $appellation1, $_SESSION['username']);
      $winequery->execute();
      $wine1BottleNumber = $dbconnection->insert_id;
      $addTransactionQuery->bind_param("dii", $price1, $wine1BottleNumber, $purchaseID);
      $addTransactionQuery->execute();
      $transaction1Number = $dbconnection->insert_id;
  }

  //DEFAULT WINE BOTTLE
  $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
  $vintage = filter_var($_POST['vintage'], FILTER_SANITIZE_STRING);
  $varietal = filter_var($_POST['varietal'], FILTER_SANITIZE_STRING);
  $storage = filter_var($_POST['storage'], FILTER_SANITIZE_STRING);
  $price = filter_var($_POST['price'], FILTER_SANITIZE_STRING);
  $sweetness = filter_var($_POST['sweetness'], FILTER_SANITIZE_STRING);
  $stopper = filter_var($_POST['stopper'], FILTER_SANITIZE_STRING);
  $producer = filter_var($_POST['producer'], FILTER_SANITIZE_STRING);
  $finish = filter_var($_POST['finish'], FILTER_SANITIZE_STRING);
  $color = filter_var($_POST['color'], FILTER_SANITIZE_STRING);
  $size = filter_var($_POST['size'], FILTER_SANITIZE_STRING);
  $body = filter_var($_POST['body'], FILTER_SANITIZE_STRING);
  $abv = filter_var($_POST['abv'], FILTER_SANITIZE_STRING);
  $appellation = filter_var($_POST['appellation'], FILTER_SANITIZE_STRING);
  $notes = filter_var($_POST['notes'], FILTER_SANITIZE_STRING);

  //SET IMAGE UPLOAD (TO-DO)
  // if (isset($_POST['image']))
  //   $image = filter_var($_POST['label'], FILTER_SANITIZE_STRING);
  // else
    $image = "";

  //SET CHECK BOXES
  if (isset($_POST['reserve']))
    $reserve = 1;
  else
    $reserve = 0;

  if (isset($_POST['estate']))
    $estate = 1;
  else
    $estate = 0;

  if (isset($_POST['future']))
    $future = 1;
  else
    $future = 0;

  if (isset($_POST['blended']))
    $blended = 1;
  else
    $blended = 0;

  $winequery->bind_param("sissssissisissssisss", $name, $vintage, $varietal, $sweetness, $storage, $stopper, $reserve, $producer, $notes, $future, $finish, $estate, $color, $size, $image, $body, $blended, $abv, $appellation, $_SESSION['username']);
  $winequery->execute();
  $wine0BottleNumber = $dbconnection->insert_id;
  $addTransactionQuery->bind_param("dii", $price, $wine0BottleNumber, $purchaseID);
  $addTransactionQuery->execute();
  $transaction0Number = $dbconnection->insert_id;

  if (!$dbconnection->commit())
  {
    header('Location: /wines/addwine.php?failed=1');
    exit;
  }
  $winequery->close();
  $dbconnection->close();
  header('Location: /wines/addwine.php?success=1');
  exit;


?>
