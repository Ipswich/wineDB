<!--
Author: Benjamin Steele
Project: CIS275 Wine Database Webapp - L'Enfant
Path: wine_db_app/wines/searchwines.php
Date: 11/22/2017
Description: Defines the webpage for searching for a wine.
Local Files Used: wine_db_app/includes/loggedincheck.php
                  wine_db_app/css/adminpages.css
                  wine_db_app/includes/authenticatedcheck3.php
                  wine_db_app/includes/pageheadline.php
                  wine_db_app/includes/navbar.php
                  wine_db_app/dbinteractions/wines/searchwinesquery.php
-->
<?php
  ob_start();
  session_start();
  include('../includes/loggedincheck.php');
 ?>
 <!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="/css/adminpages.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>WineDB Search Wines</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/javascript/jquery.maskedinput.js" type="text/javascript"></script>

  </head>
  <body>
    <script>
      $(document).ready(
          jQuery(
            function()
            {
              $("#storage").mask("9-9-99-9-99"),{placeholder:"X-X-XX-X-XX"};
            }
          )
        );
    </script>
    <?php
      include('../includes/pageheadline.php');
      include('../includes/navbar.php');
      include('../includes/DBconnection.php');

      //Alerts on failures or success.
      if($_GET["failed"] == "2")
      {
        echo '<div class="login-alert alert alert-danger" role="alert"> <strong>Add wine failed.</strong> Database error.</div>';
      }
      if($_GET["success"] == "1")
      {
        echo '<div class="login-alert alert alert-success" role="alert"> <strong>Success.</strong> Wine added.</div>';
      }

      //Query for populating varietal description dropdown.
      $query = "SELECT * FROM `varietals`";
      $varietals = $dbconnection->query($query);
      //Query for populating added by dropdown
      $query = "SELECT DISTINCT `added_by` FROM `wines`";
      $addedby = $dbconnection->query($query);
      //Query for populating removed by dropdown
      $query = "SELECT DISTINCT `removed_by` FROM `wines`";
      $removedby = $dbconnection->query($query);
    ?>

    <h1 style="text-align: center;">Search</h1>
    <h6 style="text-align: center;">Tick a field's checkbox to include it in search results. Blank, checked fields will include all potential results.</h6>
    <h6 style="text-align: center;">Search terms are case sensitive. Additionally, the wildcards '%' (any number of characters) and '_' (single character) maybe used. </h6>

    <hr>
    <h3 style="text-align: center;">Purchase Information</h3>
    <br>
    <div class="container">
        <form name="addPurchaseForm" method="POST" action="/dbinteractions/wines/searchwinesquery.php">
           <div class="form-group">
            <label class="control-label col-sm-3" for="location">Purchase Location:</label>
            <div class="col-sm-7 input-group">
              <span class="input-group-addon">
                <input type="checkbox" name="locationcheckbox">
              </span>
              <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
              <input type="text" maxlength="40" class="form-control" id="location" placeholder="" name="location">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="addeddate">Purchase Date:</label>
            <div class="col-sm-4 input-group">
              <span class="input-group-addon">
                <input type="checkbox" name="addeddatecheckbox">
              </span>
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              <input type="date" class="form-control" id="addeddate" placeholder="mm/dd/yyyy" name="addeddate">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="quantity">Number of Bottles:</label>
            <div class="col-sm-3 input-group">
              <span class="input-group-addon">
                <input type="checkbox" name="quantitycheckbox">
              </span>
              <span class="input-group-addon"><i class="glyphicon glyphicon-plus"></i></span>
              <input type="number" min="0" max="99999999999" step="1" class="form-control" id="quantity" name="quantity">
            </div>
          </div>
          <h3 style="text-align: center;">Wine Information </h3>
          <h6 style="text-align: center;"></h6>

          <!-- NEW ROW -->
          <div class="row">
            <div class="form-group col-xs-12">
              <label for="name">Wine Name:</label>
              <div class="input-group">
                <span class="input-group-addon">
                  <input type="checkbox" name="namecheckbox">
                </span>
                <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
                <input type="text" maxlength="40" class="form-control" id="name" placeholder="" name="name" >
              </div>
            </div>
          </div>

            <!-- NEW ROW -->
          <div class="row">
            <div class="form-group col-xs-4">
              <label for="vintage">Vintage:</label>
              <div class="input-group">
                <span class="input-group-addon">
                  <input type="checkbox" name="vintagecheckbox">
                </span>
                <span class="input-group-addon"><i class="glyphicon glyphicon-plus"></i></span>
                <input type="number" min="0" max="9999" step="1" class="form-control" id="vintage" name="vintage" >
              </div>
            </div>
            <!-- GENERATE VARIETAL DROP DOWN FROM PREVIOUS QUERY -->
            <div class="form-group col-xs-4">
              <label for="varietal">Varietal:</label>
              <div class="input-group">
                <span class="input-group-addon">
                  <input type="checkbox" name="varietalcheckbox">
                </span>
                <span class="input-group-addon"><i class="glyphicon glyphicon-cutlery"></i></span>
                <select class="form-control" id="varietal" name="varietal" >
                  <option value=""></option>
                  <?php
                  while ($row = $varietals->fetch_array())
                  {
                    echo '<option value="' . $row['varietal_description'] .'">' . $row['varietal_description'] . '</option>';
                  }
                  ?>
                </select>
              </div>
            </div>
          <div class="form-group col-xs-4">
            <label for="storage">Storage Location:</label>
            <div class="input-group">
              <span class="input-group-addon">
                <input type="checkbox" name="storagecheckbox">
              </span>
              <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
              <input type="text" class="form-control" id="storage" placeholder="X-X-XX-X-XX" name="storage">
            </div>
          </div>
        </div>

        <!-- NEW ROW -->
        <div class="row">
          <div class="form-group col-xs-4">
            <button type="button" data-target="#optional" data-toggle="collapse" class="btn btn-primary form-control">
              Show/Hide Optional Fields
            </button>
          </div>
        </div>

        <!-- OPTIONAL FIELDS -->
        <div class="optionalFieldsWrapper">
          <div id="optional" class="collapse">
            <!-- NEW ROW -->
            <div class="row">
              <div class="form-group col-xs-3">
                <label for="price">Bottle Price:</label>
                <div class="input-group">
                  <span class="input-group-addon">
                    <input type="checkbox" name="pricecheckbox">
                  </span>
                  <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                  <input type="number" min="0" step="0.01" class="form-control" id="price"name="price">
                </div>
              </div>
              <div class="form-group col-xs-5">
                <label for="sweetness">Sweetness Level:</label>
                <div class="input-group">
                  <span class="input-group-addon">
                    <input type="checkbox" name="sweetnesscheckbox">
                  </span>
                  <span class="input-group-addon"><i class="glyphicon glyphicon-ice-lolly-tasted"></i></span>
                  <input type="text" maxlength="40" class="form-control" id="sweetness" name="sweetness">
                </div>
              </div>
            <div class="form-group col-xs-4">
              <label for="stopper">Stopper Type:</label>
              <div class="input-group">
                <span class="input-group-addon">
                  <input type="checkbox" name="stoppercheckbox">
                </span>
                <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
                <input type="text" maxlength="40" class="form-control" id="stopper" name="stopper">
              </div>
            </div>
          </div>

          <!-- NEW ROW -->
          <div class="row">
            <div class="form-group col-xs-7">
              <label for="producer">Producer:</label>
              <div class="input-group">
                <span class="input-group-addon">
                  <input type="checkbox" name="producercheckbox">
                </span>
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" maxlength="40" class="form-control" id="producer" name="producer">
              </div>
            </div>
            <div class="form-group col-xs-5">
              <label for="finish">Finish:</label>
              <div class="input-group">
                <span class="input-group-addon">
                  <input type="checkbox" name="finishcheckbox">
                </span>
                <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
                <input type="text" maxlength="40" class="form-control" id="finish" name="finish">
              </div>
            </div>
          </div>

          <!-- NEW ROW -->
          <div class="row">
            <div class="form-group col-xs-4">
              <label for="color">Color:</label>
              <div class="input-group">
                <span class="input-group-addon">
                  <input type="checkbox" name="colorcheckbox">
                </span>
                <span class="input-group-addon"><i class="glyphicon glyphicon-tint"></i></span>
                <input type="text" maxlength="40" class="form-control" id="color" name="color">
              </div>
            </div>
              <div class="form-group col-xs-3">
                <label for="size">Bottle Size:</label>
                <div class="input-group">
                  <span class="input-group-addon">
                    <input type="checkbox" name="sizecheckbox">
                  </span>
                  <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
                  <input type="text" maxlength="40" class="form-control" id="size" name="size">
                </div>
              </div>
                <div class="form-group col-xs-5">
                  <label for="color">Body:</label>
                  <div class="input-group">
                    <span class="input-group-addon">
                      <input type="checkbox" name="bodycheckbox">
                    </span>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
                    <input type="text" maxlength="40" class="form-control" id="body" name="body">
                  </div>
                </div>
              </div>

            <!-- NEW ROW -->
            <div class="row">
              <div class="form-group col-xs-3">
                <label for="color">Alcohol Level:</label>
                <div class="input-group">
                  <span class="input-group-addon">
                    <input type="checkbox" name="abvcheckbox">
                  </span>
                  <span class="input-group-addon"><i class="glyphicon glyphicon-glass"></i></span>
                  <input type="text" maxlength="40" class="form-control" id="abv" name="abv">
                </div>
              </div>
                <div class="form-group col-xs-8">
                  <label for="color">Appellation:</label>
                  <div class="input-group">
                    <span class="input-group-addon">
                      <input type="checkbox" name="appellationcheckbox">
                    </span>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                    <input type="text" maxlength="40" class="form-control" id="appellation" name="appellation">
                  </div>
                </div>
              </div>

              <!-- NEW ROW -->
              <div class="row">
                <div class="form-group col-xs-4">
                  <label for="reserve">Reserve:</label>
                  <div class="input-group">
                    <span class="input-group-addon">
                      <input type="checkbox" name="reservecheckbox">
                    </span>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
                    <select class="form-control" id="reserve" name="reserve">
                      <option value=""></option>
                      <option value="1">Reserve</option>
                      <option value="0">Non-Reserve</option>
                    </select>
                  </div>
                </div>
                <div class="form-group col-xs-4">
                  <label for="estate">Estate Bottled:</label>
                  <div class="input-group">
                    <span class="input-group-addon">
                      <input type="checkbox" name="estatecheckbox">
                    </span>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
                    <select class="form-control" id="estate" name="estate">
                      <option value=""></option>
                      <option value="1">Estate </option>
                      <option value="0">Non-Estate </option>
                    </select>
                  </div>
                </div>
                <div class="form-group col-xs-4">
                  <label for="future">Future:</label>
                  <div class="input-group">
                    <span class="input-group-addon">
                      <input type="checkbox" name="futurecheckbox">
                    </span>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
                    <select class="form-control" id="future" name="future">
                      <option value=""></option>
                      <option value="1">Future </option>
                      <option value="0">Non-Future </option>
                    </select>
                  </div>
                </div>
              </div>

              <!-- NEW ROW -->
              <div class="row">
                <div class="form-group col-xs-4">
                  <label for="blended">Blended:</label>
                  <div class="input-group">
                    <span class="input-group-addon">
                      <input type="checkbox" name="blendedcheckbox">
                    </span>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
                    <select class="form-control" id="blended" name="blended">
                      <option value=""></option>
                      <option value="1">Blended </option>
                      <option value="0">Non-Blended </option>
                    </select>
                  </div>
                </div>
                <div class="form-group col-xs-4">
                  <label for="instorage">In Storage:</label>
                  <div class="input-group">
                    <span class="input-group-addon">
                      <input type="checkbox" name="instoragecheckbox">
                    </span>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
                    <select class="form-control" id="instorage" name="instorage">
                      <option value=""></option>
                      <option value="1">In Storage</option>
                      <option value="0">Removed </option>
                    </select>
                  </div>
                </div>
                <div class=" form-group col-xs-4">
                  <label for="addedby">Added By:</label>
                  <div class="input-group">
                    <span class="input-group-addon">
                      <input type="checkbox" name="addedbycheckbox">
                    </span>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <select class="form-control" id="addedby" name="addedby">
                      <option value=""></option>
                    <?php
                    while ($row = $addedby->fetch_array())
                      {
                        echo '<option value="' . $row['added_by'] .'">' . $row['added_by'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>

              <!-- NEW ROW -->
              <div class="row">
                <div class="form-group col-xs-12">
                  <label for="color">Notes:</label>
                  <div class="input-group">
                    <span class="input-group-addon">
                      <input type="checkbox" name="notescheckbox">
                    </span>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></span>
                    <input type="text" maxlength="40" class="form-control" id="notes" name="notes">
                  </div>
                </div>
              </div>

              <!-- NEW ROW -->
              <div class="row">
                <div class="form-group col-xs-4">
                  <label for="date">Removal Date:</label>
                  <div class="input-group">
                    <span class="input-group-addon">
                      <input type="checkbox" name="removaldatecheckbox">
                    </span>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    <input class="form-control" type="date" id="removaldate" placeholder="mm/dd/yyyy" name="removaldate">
                  </div>
                </div>
                <div class="form-group col-xs-offset-1 col-xs-4">
                  <label for="removedby">Removed By:</label>
                  <div class="input-group">
                    <span class="input-group-addon">
                      <input type="checkbox" name="removedbycheckbox">
                    </span>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <select class="form-control" id="removedby" name="removedby">
                      <option value=""></option>
                      <?php
                      while ($row = $addedby->fetch_array())
                      {
                        echo '<option value="' . $row['removed_by'] .'">' . $row['removed_by'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <!-- NEW ROW -->
            <div class="row">
              <div class="col-xs-3">
              </div>
              <div class="form-group input-group col-xs-6">
                <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
              <button type="submit" class="btn btn-block btn-success form-control">Search</button>
              </div>
            </div>
          </div>
        </form>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
