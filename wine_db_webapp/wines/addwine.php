<!--
Author: Benjamin Steele
Project: CIS275 Wine Database Webapp - L'Enfant
Path: wine_db_app/wines/addwine.php
Date: 11/22/2017
Description: Defines the webpage for adding wines.
Local Files Used: wine_db_app/includes/loggedincheck.php
                  wine_db_app/css/adminpages.css
                  wine_db_app/includes/authenticatedcheck3.php
                  wine_db_app/includes/pageheadline.php
                  wine_db_app/includes/navbar.php
                  wine_db_app/dbinteractions/wines/addwinequery.php
                  wine_db_app/javascript/jquery.maskedinput.js
                  wine_db_app/javascript/addadditionalwines.js
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
    <title>WineDB Add Wine</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/javascript/jquery.maskedinput.js" type="text/javascript"></script>
    <script src="/javascript/addadditionalwines.js" type="text/javascript"></script>

  </head>
  <body>
    <script>
      $(document).ready(
          jQuery(
            function()
            {
              $("#storage").mask("9-9-99-9-99");
            }
          )
        );
    </script>
    <?php
      include('../includes/authentications/authenticatedcheck2');
      include('../includes/pageheadline.php');
      include('../includes/navbar.php');
      include('../includes/DBconnection.php');

      //Alerts on failures or success.
      if($_GET["failed"] == "1")
      {
        echo '<div class="login-alert alert alert-danger" role="alert"> <strong>Add wine failed.</strong> Database error.</div>';
      }
      if($_GET["success"] == "1")
      {
        echo '<div class="login-alert alert alert-success" role="alert"> <strong>Success.</strong> Wine added.</div>';
      }

      //Query for populating varietal description dropdown.
      $query = "SELECT * FROM `varietals`";
      $result = $dbconnection->query($query);
    ?>


    <h2 style="text-align: center;">New Purchase</h2>
    <h6 style="text-align: center;">Wine bottles may not have purchase details (i.e. gifts, theft).</h6>
    <div class="container">
        <form name="addPurchaseForm" method="POST" action="/dbinteractions/wines/addwinequery.php">
           <div class="form-group">
            <label class="control-label col-sm-3" for="location">Purchase Location:</label>
            <div class="col-sm-7 input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
              <input type="text" class="form-control" maxlength="40" id="location" placeholder="" name="location">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="date">Purchase Date:</label>
            <div class="col-sm-4 input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              <input type="date" class="form-control" id="date" placeholder="mm/dd/yyyy" name="date">
            </div>
          </div>
          <hr>
          <h2 style="text-align: center;"> Add Wines </h2>
          <h6 style="text-align: center;"> Fields with (*) are required. </h6>


        <div id="wineFieldsWrapper">
          <!-- NEW ROW -->
          <div class="row">
            <div class="form-group col-xs-12">
              <label for="name">*Wine Name:</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
                <input type="text" class="form-control" maxlength="40" id="name" placeholder="" name="name" required>
              </div>
            </div>
          </div>

            <!-- NEW ROW -->
          <div class="row">
            <div class="form-group col-xs-4">
              <label for="vintage">*Vintage:</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-plus"></i></span>
                <input type="number" min="0" step="1" max="9999" class="form-control" id="vintage" name="vintage" required>
              </div>
            </div>
            <!-- GENERATE VARIETAL DROP DOWN FROM PREVIOUS QUERY -->
            <div class=" form-group col-xs-4">
              <label for="varietal">*Varietal:</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-cutlery"></i></span>
                <select class="form-control" id="varietal" name="varietal" required>
                <?php
                while ($row = $result->fetch_array())
                  {
                    echo '<option value="' . $row['varietal_description'] .'">' . $row['varietal_description'] . '</option>';
                  }
                  ?>
                </select>
              </div>
            </div>
          <div class="form-group col-xs-4">
            <label for="storage">*Storage Location:</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
              <input type="text" class="form-control" id="storage" placeholder="X-X-XX-X-XX" name="storage" required>
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
          <div id="optional" class="collapse">
            <!-- NEW ROW -->
            <div class="row">
              <div class="form-group col-xs-3">
                <label for="price">Bottle Price:</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                  <input type="number" min="0" step="0.01" class="form-control" id="price"name="price">
                </div>
              </div>
              <div class="form-group col-xs-5">
                <label for="sweetness">Sweetness Level:</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-ice-lolly-tasted"></i></span>
                  <input type="text" maxlength="40" class="form-control" id="sweetness" name="sweetness">
                </div>
              </div>
            <div class="form-group col-xs-4">
              <label for="stopper">Stopper Type:</label>
              <div class="input-group">
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
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" maxlength="40" class="form-control" id="producer" name="producer">
              </div>
            </div>
            <div class="form-group col-xs-5">
              <label for="finish">Finish:</label>
              <div class="input-group">
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
                <span class="input-group-addon"><i class="glyphicon glyphicon-tint"></i></span>
                <input type="text" maxlength="40" class="form-control" id="color" name="color">
              </div>
            </div>
              <div class="form-group col-xs-3">
                <label for="size">Bottle Size:</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
                  <input type="text" maxlength="40" class="form-control" id="size" name="size" value="750mL">
                </div>
              </div>
                <div class="form-group col-xs-5">
                  <label for="color">Body:</label>
                  <div class="input-group">
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
                  <span class="input-group-addon"><i class="glyphicon glyphicon-glass"></i></span>
                  <input type="text" maxlength="40" class="form-control" id="abv" name="abv">
                </div>
              </div>
                <div class="form-group col-xs-8">
                  <label for="color">Appellation:</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                    <input type="text" maxlength="40" class="form-control" id="appellation" name="appellation">
                  </div>
                </div>
              </div>

              <!-- NEW ROW -->
              <div class="row">
                <div class="form-group col-xs-12 checkbox">
                  <div class="col-xs-2">
                    <label>
                      <input type="checkbox" class="form-group-input" id="reserve"name="reserve">
                      <strong>Reserve</strong>
                    </label>
                  </div>
                  <div class="col-xs-3">
                    <label>
                      <input type="checkbox" class="form-group-input" id="estate" name="estate">
                      <strong>Estate Bottled</strong>
                    </label>
                  </div>
                  <div class="col-xs-2">
                    <label>
                      <input type="checkbox" class="form-group-input" id="future" name="future">
                      <strong>Future</strong>
                    </label>
                  </div>
                  <div class="col-xs-2">
                    <label>
                      <input type="checkbox" class="form-group-input" id="blended" name="blended">
                      <strong>Blended</strong>
                    </label>
                  </div>
                </div>
              </div>

              <!-- NEW ROW -->
              <div class="row">
                <div class="form-group col-xs-12">
                  <label for="color">Notes:</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></span>
                    <input type="text" maxlength="40" class="form-control" id="notes" name="notes">
                  </div>
                </div>
              </div>

              <!-- NEW ROW -->
              <!-- ADD IMAGE BUTTON -->
              <!-- <div class="row">
                <div class="form-group col-xs-4">
                  <label class="btn btn-info btn-file">
                    Select Image for Upload
                    <input name="image" id="image" type="file" style="display: none;">
                  </label>
                </div>
              </div> -->
            </div>
          </div>

            <!-- NEW ROW -->
            <div id="addwinesbutton">
            <div class="row">
              <div class="col-xs-3">
              </div>
              <div class="form-group input-group col-xs-6">
                <span class="input-group-addon"><i class="glyphicon glyphicon-plus"></i></span>
                <button type="button" onclick="add_more_wines();" class="btn btn-block btn-info form-control add-more-wines">Add Another Wine</button>
              </div>
            </div>
          </div>

            <!-- NEW ROW -->
            <div class="row">
              <div class="col-xs-3">
              </div>
              <div class="form-group input-group col-xs-6">
                <span class="input-group-addon"><i class="glyphicon glyphicon-ok"></i></span>
              <button type="submit" class="btn btn-block btn-success form-control">Submit</button>
              </div>
            </div>
        </form>
        <script src="/javascript/addadditionalwines.js" type="text/javascript"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
