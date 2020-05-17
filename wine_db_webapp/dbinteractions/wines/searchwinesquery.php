<!--
Author: Benjamin Steele
Project: CIS275 Wine Database Webapp - L'Enfant
Path: wine_db_app/dbinteractions/searchwinesquery.php
Date: 11/28/2017
Description: Server script for searching the database for wines.
Local Files Used: wine_db_app/includes/DBconnection.php
                  wine_db_app/css/adminpages.css
                  wine_db_app/includes/loggedincheck.php');
                  wine_db_app/includes/pageheadline.php
                  wine_db_app/includes/navbar.php
                  wine_db_app/bootstrap-sortable-master\Scripts\bootstrap-sortable.js
-->
<!DOCTYPE html>
<html>
 <head>
   <link rel="stylesheet" href="css/adminpages.css">
   <link rel="stylesheet" href="/bootstrap-sortable-master/Contents/bootstrap-sortable.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <title>WineDB Search Results</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script src="/bootstrap-sortable-master/Scripts/bootstrap-sortable.js" type="text/javascript"></script>
   <script src="/bootstrap-sortable-master/Scripts/moment.min.js" type="text/javascript"></script>
 </head>
 <body>
<?php
  ob_start();
  session_start();
  ini_set('display_errors', 1);

  include('../../includes/DBconnection.php');
  include('../../includes/pageheadline.php');
  include('../../includes/navbar.php');

  //Helper class for making query.
  class BindParam
  {
    private $values = array(), $types = '';

    public function add( $type, &$value ){
        $this->values[] = $value;
        $this->types .= $type;
    }

    public function get(){
        return array_merge(array($this->types), $this->values);
    }
  }

  //If not whitespace or empty, set equal to posted value else equal to `%`
  //$value = posted variable.
  //Returns either the escaped, posted value, or a "%".
  function setQueryParameter($value)
  {
    if(preg_match('[\S]', $_POST[$value]) || $_POST[$value] != "")
      return filter_var($_POST[$value], FILTER_SANITIZE_STRING);
    else
      return "%";
  }

  //If set, return 1, otherwise return 0;
  //$value = posted variable.
  //Returns either a 1 (on value being posted) or a 0
  function setCheckboxParameter($value)
  {
    if (isset($_POST[$value]))
      return 1;
    else
      return 0;
  }

  //Fill in variables with posted field values
  $location = "'" . setQueryParameter('location') . "'";
  $addeddate = "'" . setQueryParameter('addeddate') . "'";
  $quantity = "'" . setQueryParameter('quantity') . "'";
  $name = "'" . setQueryParameter('name') . "'";
  $vintage = "'" . setQueryParameter('vintage') . "'";
  $varietal = "'" . setQueryParameter('varietal') . "'";
  $storage = "'" . setQueryParameter('storage') . "'";
  $price = "'" . setQueryParameter('price') . "'";
  $sweetness = "'" . setQueryParameter('sweetness') . "'";
  $stopper = "'" . setQueryParameter('stopper') . "'";
  $producer = "'" . setQueryParameter('producer') . "'";
  $finish = "'" . setQueryParameter('finish') . "'";
  $color = "'" . setQueryParameter('color') . "'";
  $size = "'" . setQueryParameter('size') . "'";
  $body = "'" . setQueryParameter('body') . "'";
  $abv = "'" . setQueryParameter('abv') . "'";
  $appellation = "'" . setQueryParameter('appellation') . "'";
  $notes = "'" . setQueryParameter('notes') . "'";
  $addedby = "'" . setQueryParameter('addedby') . "'";
  $removedby = "'" . setQueryParameter('removedby') . "'";
  $removaldate = "'" . setQueryParameter('removaldate') . "'";


  //SET CHECK BOXES (Variables)
  $reserve = "'" . setQueryParameter('reserve') . "'";
  $estate = "'" . setQueryParameter('estate') . "'";
  $future = "'" . setQueryParameter('future') . "'";
  $blended = "'" . setQueryParameter('blended') . "'";
  $instorage = "'" . setQueryParameter('instorage') . "'";

  //SET CHECK BOXES (Include in search results)
  $locationcheckbox = setCheckboxParameter('locationcheckbox');
  $addeddatecheckbox = setCheckboxParameter('addeddatecheckbox');
  $quantitycheckbox = setCheckboxParameter('quantitycheckbox');
  $namecheckbox = setCheckboxParameter('namecheckbox');
  $vintagecheckbox = setCheckboxParameter('vintagecheckbox');
  $varietalcheckbox = setCheckboxParameter('varietalcheckbox');
  $storagecheckbox = setCheckboxParameter('storagecheckbox');
  $pricecheckbox = setCheckboxParameter('pricecheckbox');
  $sweetnesscheckbox = setCheckboxParameter('sweetnesscheckbox');
  $stoppercheckbox = setCheckboxParameter('stoppercheckbox');
  $producercheckbox = setCheckboxParameter('producercheckbox');
  $finishcheckbox = setCheckboxParameter('finishcheckbox');
  $colorcheckbox = setCheckboxParameter('colorcheckbox');
  $sizecheckbox = setCheckboxParameter('sizecheckbox');
  $bodycheckbox = setCheckboxParameter('bodycheckbox');
  $abvcheckbox = setCheckboxParameter('abvcheckbox');
  $appellationcheckbox = setCheckboxParameter('appellationcheckbox');
  $reservecheckbox = setCheckboxParameter('reservecheckbox');
  $estatecheckbox = setCheckboxParameter('estatecheckbox');
  $futurecheckbox = setCheckboxParameter('futurecheckbox');
  $blendedcheckbox = setCheckboxParameter('blendedcheckbox');
  $instoragecheckbox = setCheckboxParameter('instoragecheckbox');
  $notescheckbox = setCheckboxParameter('notescheckbox');
  $addedbycheckbox = setCheckboxParameter('addedbycheckbox');
  $removedbycheckbox = setCheckboxParameter('removedbycheckbox');
  $removaldatecheckbox = setCheckboxParameter('removaldatecheckbox');

  //END VARIABLE DECLARATIONS
  $bindParam = new BindParam();
  //Subquery for generating table spanning purchases, transactions, and wines.
  $subquery = "(SELECT `purchases`.`date_of_purchase`, `purchases`.`purchase_location`, `purchases`.`quantity`, `transactions`.`bottle_price`, `wines`.*
               FROM `purchases`
                  INNER JOIN `transactions` ON `purchases`.`purchase_id`=`transactions`.`purchase_id`
                  INNER JOIN `wines` on `transactions`.`wine_bottle_number`=`wines`.`wine_bottle_number`) AS combined";
  //Select Query
  $query = "SELECT wine_bottle_number AS 'Bottle Number', ";
  //Query modification indicator
  $queryEntry = 0;
  //Query Array
  $queryArray = array();

  if($locationcheckbox == 1)
  {
    $query = $query . "purchase_location AS 'Purchase Location'";
    // $queryArray[] = "purchase_location LIKE ?";
    $queryArray[] = "purchase_location LIKE " . $location;
    $bindParam->add('s', $location);
    $queryEntry = 1;
  }

  if($addeddatecheckbox == 1)
  {
    if($queryEntry == 1)
    {
      $query = $query . ", ";
    }
    $query = $query . "date_of_purchase AS 'Date of Purchase'";
    // $queryArray[] = "date_of_purchase LIKE ?";
    $queryArray[] = "date_of_purchase LIKE " . $addeddate;
    $bindParam->add('s', $addeddate);
    $queryEntry = 1;
  }

  if($quantitycheckbox == 1)
  {
    if($queryEntry == 1)
    {
      $query = $query . ", ";
    }
    $query = $query . "quantity AS 'Quantity'";
    // $queryArray[] = "quantity LIKE ?";
    $queryArray[] = "quantity LIKE " . $quantity;
    $bindParam->add('i', $quantity);
    $queryEntry = 1;
  }

  if($namecheckbox == 1)
  {
    if($queryEntry == 1)
    {
      $query = $query . ", ";
    }
    $query = $query . "wine_name AS 'Wine Name'";
    // $queryArray[] = "wine_name LIKE ?";
    $queryArray[] = "wine_name LIKE " . $name;
    $bindParam->add('s', $name);
    $queryEntry = 1;
  }

  if($vintagecheckbox == 1)
  {
    if($queryEntry == 1)
    {
      $query = $query . ", ";
    }
    $query = $query . "vintage AS 'Vintage'";
    // $queryArray[] = "vintage LIKE ?";
    $queryArray[] = "vintage LIKE " . $vintage;
    $bindParam->add('i', $vintage);
    $queryEntry = 1;
  }

  if($varietalcheckbox == 1)
  {
    if($queryEntry == 1)
    {
      $query = $query . ", ";
    }
    $query = $query . "varietal_description AS 'Varietal'";
    // $queryArray[] = "varietal_description LIKE ?";
    $queryArray[] = "varietal_description LIKE " . $varietal;
    $bindParam->add('s', $varietal);
    $queryEntry = 1;
  }

  if($storagecheckbox == 1)
  {
    if($queryEntry == 1)
    {
      $query = $query . ", ";
    }
    $query = $query . "storage_location AS 'Storage Location'";
    // $queryArray[] = "storage_location LIKE ?";
    $queryArray[] = "storage_location LIKE " . $storage;
    $bindParam->add('s', $storage);
    $queryEntry = 1;
  }

  if($pricecheckbox == 1)
  {
    if($queryEntry == 1)
    {
      $query = $query . ", ";
    }
    $query = $query . "bottle_price AS 'Price'";
    // $queryArray[] = "bottle_price LIKE ?";
    $queryArray[] = "bottle_price LIKE " . $price;
    $bindParam->add('d', $price);
    $queryEntry = 1;
  }

  if($sweetnesscheckbox == 1)
  {
    if($queryEntry == 1)
    {
      $query = $query . ", ";
    }
    $query = $query . "sweetness_level AS 'Sweetness Level'";
    // $queryArray[] = "sweetness_level LIKE ?";
    $queryArray[] = "sweetness_level LIKE " . $sweetness;
    $bindParam->add('s', $sweetness);
    $queryEntry = 1;
  }

  if($stoppercheckbox == 1)
  {
    if($queryEntry == 1)
    {
      $query = $query . ", ";
    }
    $query = $query . "stopper AS 'Stopper'";
    // $queryArray[] = "stopper LIKE ?";
    $queryArray[] = "stopper LIKE " . $stopper;
    $bindParam->add('s', $stopper);
    $queryEntry = 1;
  }

  if($producercheckbox == 1)
  {
    if($queryEntry == 1)
    {
      $query = $query . ", ";
    }
    $query = $query . "producer AS 'producer'";
    // $queryArray[] = "producer LIKE ?";
    $queryArray[] = "producer LIKE " . $producer;
    $bindParam->add('s', $producer);
    $queryEntry = 1;
  }

  if($finishcheckbox == 1)
  {
    if($queryEntry == 1)
    {
      $query = $query . ", ";
    }
    $query = $query . "finish AS 'Finish'";
    // $queryArray[] = "finish LIKE ?";
    $queryArray[] = "finish LIKE " . $finish;
    $bindParam->add('s', $finish);
    $queryEntry = 1;
  }

  if($colorcheckbox == 1)
  {
    if($queryEntry == 1)
    {
      $query = $query . ", ";
    }
    $query = $query . "color AS 'Color'";
    // $queryArray[] = "color LIKE ?";
    $queryArray[] = "color LIKE " . $color;
    $bindParam->add('s', $color);
    $queryEntry = 1;
  }

  if($sizecheckbox == 1)
  {
    if($queryEntry == 1)
    {
      $query = $query . ", ";
    }
    $query = $query . "bottle_size AS 'Bottle Size'";
    // $queryArray[] = "bottle_size LIKE ?";
    $queryArray[] = "bottle_size LIKE " . $size;
    $bindParam->add('s', $size);
    $queryEntry = 1;
  }

  if($bodycheckbox == 1)
  {
    if($queryEntry == 1)
    {
      $query = $query . ", ";
    }
    $query = $query . "body AS 'Body'";
    // $queryArray[] = "body LIKE ?";
    $queryArray[] = "body LIKE " . $body;
    $bindParam->add('s', $body);
    $queryEntry = 1;
  }

  if($abvcheckbox == 1)
  {
    if($queryEntry == 1)
    {
      $query = $query . ", ";
    }
    $query = $query . "alcohol_level ' AS 'Alcohol Level";
    // $queryArray[] = "alcohol_level LIKE ?";
    $queryArray[] = "alcohol_level LIKE " . $abv;
    $bindParam->add('s', $abv);
    $queryEntry = 1;
  }

  if($appellationcheckbox == 1)
  {
    if($queryEntry == 1)
    {
      $query = $query . ", ";
    }
    $query = $query . "appellation AS 'Appellation'";
    // $queryArray[] = "appellation LIKE ?";
    $queryArray[] = "appellation LIKE " . $appellation;
    $bindParam->add('s', $appellation);
    $queryEntry = 1;
  }

  if($reservecheckbox == 1)
  {
    if($queryEntry == 1)
    {
      $query = $query . ", ";
    }
    $query = $query . "reserve AS 'Reserve'";
    // $queryArray[] = "reserve LIKE ?";
    $queryArray[] = "reserve LIKE " . $reserve;
    $bindParam->add('i', $reserve);
    $queryEntry = 1;
  }

  if($estatecheckbox == 1)
  {
    if($queryEntry == 1)
    {
      $query = $query . ", ";
    }
    $query = $query . "estate_bottled AS 'Estate Bottled'";
    // $queryArray[] = "estate_bottled LIKE ?";
    $queryArray[] = "estate_bottled LIKE " . $estate;
    $bindParam->add('i', $estate);
    $queryEntry = 1;
  }

  if($futurecheckbox == 1)
  {
    if($queryEntry == 1)
    {
      $query = $query . ", ";
    }
    $query = $query . "future AS 'Future'";
    // $queryArray[] = "future LIKE ?";
    $queryArray[] = "future LIKE" . $future;
    $bindParam->add('i', $future);
    $queryEntry = 1;
  }

  if($blendedcheckbox == 1)
  {
    if($queryEntry == 1)
    {
      $query = $query . ", ";
    }
    $query = $query . "blended AS 'Blended'";
    // $queryArray[] = "blended LIKE ?";
    $queryArray[] = "blended LIKE " . $blended;
    $bindParam->add('i', $blended);
    $queryEntry = 1;
  }

  if($instoragecheckbox == 1)
  {
    if($queryEntry == 1)
    {
      $query = $query . ", ";
    }
    $query = $query . "in_storage AS 'In Storage'";
    // $queryArray[] = "in_storage LIKE ?";
    $queryArray[] = "in_storage LIKE ". $instorage;

    $bindParam->add('i', $instorage);
    $queryEntry = 1;
  }

  if($notescheckbox == 1)
  {
    if($queryEntry == 1)
    {
      $query = $query . ", ";
    }
    $query = $query . "notes";
    // $queryArray[] = "notes LIKE ?";
    $queryArray[] = "notes LIKE " . $notes;
    $bindParam->add('s', $notes);
    $queryEntry = 1;
  }

  if($addedbycheckbox == 1)
  {
    if($queryEntry == 1)
    {
      $query = $query . ", ";
    }
    $query = $query . "added_by AS 'Added By'";
    // $queryArray[] = "added_by LIKE ?";
    $queryArray[] = "added_by LIKE " . $addedby;

    $bindParam->add('s', $addedby);
    $queryEntry = 1;
  }

  if($removaldatecheckbox == 1)
  {
    if($queryEntry == 1)
    {
      $query = $query . ", ";
    }
    $query = $query . "date_removed AS 'Date of Removal'";
    // $queryArray[] = "date_removed LIKE ?";
    $queryArray[] = "date_removed LIKE " . $removaldate;
    $bindParam->add('s', $removaldate);
    $queryEntry = 1;
  }

  if($removedbycheckbox == 1)
  {
    if($queryEntry == 1)
    {
      $query = $query . ", ";
    }
    $query = $query . "removed_by AS 'Removed By'";
    // $queryArray[] = "removed_by LIKE ?";
    $queryArray[] = "removed_by LIKE " . $removedby;

    $bindParam->add('s', $removedby);
    $queryEntry = 1;
  }

  //Build complete query
  $query .= " FROM " . $subquery;
  $query .= " WHERE ";
  $query .= implode(' AND ', $queryArray);

  // echo $query . "<br> <br>";
  // echo implode(", ", $bindParam->get()) . "<br><br>";

  $results = $dbconnection->query($query);
  $rowCount = $results->num_rows;


  // $selectQuery = $dbconnection->prepare($query);

  //Create references for call_user_func_array
  // $tmp = array();
  // $params = $bindParam->get();
  // foreach($params as $key => $value) $tmp[$key] = &$params[$key];

  //Bind variables to statement
  // call_user_func_array(array($selectQuery, 'bind_param'), $tmp);

  // //Execute Query
  // echo $selectQuery->execute();
  // $results = $query->get_result();
  // $row = $result->fetch_array(MYSQLI_NUM);
  $dbconnection->close();
  // $selectQuery->close();

  //DISPLAY DATA START

    if($rowCount == 0)
    {
      echo "<h2 style='text-align:center'>No data to display</h2> <br> <br>" ;
      // echo $query;
      die;
    }

    $fieldInfo = $results->fetch_fields();
    echo '<div class="col-xs-offset-1 col-xs-10">';
    echo '<table class="table table-bordered sortable table-hover table-condensed table-responsive">';
    echo "<thead>";
    echo '<tr class="info">';
    foreach ($fieldInfo as $val)
    {
      echo '<th class="data-defaultsign">' . $val->name . '</th>';
    }
    echo '</tr></thead><tbody>';
    while($row = $results->fetch_array())
    {
      echo '<tr>';
        foreach ($fieldInfo as $val)
        {
          echo '<td>'.$row[$val->name].'</td>';
        }
        echo '</tr>';
      }
      echo "</tbody>";
       ?>
    </body>
  </html>
