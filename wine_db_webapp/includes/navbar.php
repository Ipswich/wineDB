<!--
Author: Benjamin Steele
Project: CIS275 Wine Database Webapp - L'Enfant
Path: wine_db_app/includes/navbar.php
Date: 11/17/2017
Description: Server script for generating the navbar.
Local Files Used: wine_db_app/home.php
                  wine_db_app/admin/adduser.php
                  wine_db_app/admin/listuser.php
                  wine_db_app/admin/removeuser.php
                  wine_db_app/admin/updateuser.php
                  wine_db_app/logout.php
-->
<?php
//NOTE: Visibility ONLY changes visibility, not ACCESSIBILITY. This must be
//changed on a case by case basis on the desired page.
//ADMIN VISIBILITY CONTROLS
$MINADMINLEVEL = 3; //Level of permissions at and above which admin tools menu will appear.
$MINADDUSERLEVEL = 4; //Level of permissions required to view add a user
$MINLISTUSERLEVEL = 3; //Level of permissions required to view list users
$MINREMOVEUSERLEVEL = 4; //Level of permissions required to view remove a user
$MINUPDATEUSERLEVEL = 4; //Level of permissions required to view update a user
//WINE VISIBILITY CONTROLS
$MINSEARCHWINESLEVEL = 1; //Level of permissions required to view list wines
$MINADDWINELEVEL = 1; //Level of permissions required to view add wines
$MINREMOVEWINELEVEL = 2; //Level of permissions required to view remove wines
//VARIETALS VISIBILITY CONTROLS
$MINADDVARIETALLEVEL = 1; //Level of permissions required to view add varietal
$MINREMOVEVARIETALLEVEL = 2; //Level of permissions required to view remove varietal
$MINLISTVARIETALSLEVEL = 1; //Level of permissions required to view list varietal
?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand">
        WineDB
      </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <?php
          $location = $_SERVER['REQUEST_URI'];
          //Home
          if($location == "/home.php")
          {
           echo '<li class="active"><a href="/home.php">Home</a></li>';
          }
          else
          {
           echo '<li><a href="/home.php">Home</a></li>';
          }
//*********************************WINES TAB*********************************
          if(($location == '/wines/searchwines.php' && $_SESSION['authenticated'] >= $MINSEARCHWINESLEVEL)
          || ($location == '/wines/addwine.php' && $_SESSION['authenticated'] >= $MINADDWINELEVEL)
          || ($location == '/wines/removewine.php' && $_SESSION['authenticated'] >= $MINREMOVEWINELEVEL))
          {
            echo '<li class="active dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  Wines
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">';
            //Whether or not list varietals is included in the menulist and who it's visible to.
            if($location == '/wines/searchwines.php' && $_SESSION['authenticated'] >= $MINSEARCHWINESLEVEL)
            {
            echo '<li class="active">
              <a href="/wines/searchwines.php">Search Wines</a>
            </li>';
            }
            else if ($_SESSION['authenticated'] >= $MINSEARCHWINESLEVEL)
            {
              echo '<li>
                <a href="/wines/searchwines.php">Search Wines</a>
              </li>';
            }
            //Whether or not add varietals is included in the menulist and who it's visible to.
            if($location == '/wines/addwine.php' && $_SESSION['authenticated'] >= $MINADDWINELEVEL)
            {
              echo '<li class="active">
                <a href="/wines/addwine.php">Add Wine</a>
              </li>';
            }
            else if ($_SESSION['authenticated'] >= $MINADDWINELEVEL)
            {
              echo '<li>
                <a href="/wines/addwine.php">Add Wine</a>
              </li>';
            }
            //Whether or not remove user is included in the menulist and who it's visible to.
            if($location == '/wines/removewine.php' && $_SESSION['authenticated'] >= $MINREMOVEWINELEVEL)
            {
              echo '<li class="active">
                <a href="/wines/removewine.php">Remove Wine</a>
              </li>';
            }
            else if ($_SESSION['authenticated'] >= $MINREMOVEWINELEVEL)
            {
              echo '<li>
                <a href="/wines/removewine.php">Remove Wine</a>
              </li>';
            }
            echo '</ul>
            </li>';
          }
          //NO WINE SELECTED
          else if ($_SESSION['authenticated'] >= $MINSEARCHWINESLEVEL ||
          $_SESSION['authenticated'] >= $MINADDWINELEVEL ||
          $_SESSION['authenticated'] >= $MINREMOVEWINELEVEL)
          {
            echo '<li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      Wines
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">';
                    if ($_SESSION['authenticated'] >= $MINSEARCHWINESLEVEL)
                    {
                      echo '<li>
                        <a href="/wines/searchwines.php">Search Wines</a>
                      </li>';
                    }
                      if ($_SESSION['authenticated'] >= $MINADDWINELEVEL)
                      {
                      echo '<li>
                        <a href="/wines/addwine.php">Add Wines</a>
                      </li>';
                    }
                      if ($_SESSION['authenticated'] >= $MINREMOVEWINELEVEL)
                      {
                        echo '<li>
                          <a href="/wines/removewine.php">Remove Wine</a>
                        </li>';
                      }
                    echo '</ul>
                  </li>';
          }
//*********************************VARIETAL TAB*********************************
          if(($location == '/varietals/listvarietals.php' && $_SESSION['authenticated'] >= $MINLISTVARIETALLEVEL)
           || ($location == '/varietals/addvarietal.php' && $_SESSION['authenticated'] >= $MINADDVARIETALLEVEL)
          || ($location == '/varietals/removevarietal.php' && $_SESSION['authenticated'] >= $MINREMOVEVARIETALLEVEL))
          {
            echo '<li class="active dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  Varietals
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">';
            //Whether or not list varietals is included in the menulist and who it's visible to.
            if($location == '/varietals/listvarietals.php' && $_SESSION['authenticated'] >= $MINLISTVARIETALSLEVEL)
            {
            echo '<li class="active">
              <a href="/varietals/listvarietals.php">List Varietals</a>
            </li>';
          }
            else if ($_SESSION['authenticated'] >= $MINLISTVARIETALSLEVEL)
            {
              echo '<li>
                <a href="/varietals/listvarietals.php">List Varietals</a>
              </li>';
            }
            //Whether or not add varietals is included in the menulist and who it's visible to.
            if($location == '/varietals/addvarietal.php' && $_SESSION['authenticated'] >= $MINADDVARIETALLEVEL)
            {
              echo '<li class="active">
                <a href="/varietals/addvarietal.php">Add Varietal</a>
              </li>';
            }
            else if ($_SESSION['authenticated'] >= $MINADDVARIETALLEVEL)
            {
              echo '<li>
                <a href="/varietals/addvarietal.php">Add Varietal</a>
              </li>';
            }
            //Whether or not remove user is included in the menulist and who it's visible to.
            if($location == '/varietals/removevarietal.php' && $_SESSION['authenticated'] >= $MINREMOVEVARIETALLEVEL)
            {
              echo '<li class="active">
                <a href="/varietals/removevarietal.php">Remove Varietal</a>
              </li>';
            }
            else if ($_SESSION['authenticated'] >= $MINREMOVEVARIETALLEVEL)
            {
              echo '<li>
                <a href="/varietals/removevarietal.php">Remove Varietal</a>
              </li>';
            }
            echo '</ul>
            </li>';
          }
          //NO VARIETAL SELECTED
          else if ($_SESSION['authenticated'] >= $MINLISTVARIETALSLEVEL ||
           $_SESSION['authenticated'] >= $MINADDVARIETALLEVEL ||
           $_SESSION['authenticated'] >= $MINREMOVEVARIETALLEVEL)
          {
            echo '<li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      Varietals
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">';
                    if($_SESSION['authenticated'] >= $MINLISTVARIETALSLEVEL)
                    {
                      echo '<li>
                        <a href="/varietals/listvarietals.php">List Varietals</a>
                      </li>';
                    }
                    if($_SESSION['authenticated'] >= $MINADDVARIETALLEVEL)
                    {
                      echo '<li>
                        <a href="/varietals/addvarietal.php">Add Varietal</a>
                      </li>';
                    }
                    if($_SESSION['authenticated'] >= $MINREMOVEVARIETALLEVEL)
                    {
                      echo '<li>
                        <a href="/varietals/removevarietal.php">Remove Varietal</a>
                      </li>';
                    }
                    echo '</ul>
                  </li>';
          }
//*********************************ADMIN TOOL TAB*********************************
          if($_SESSION['authenticated'] >= $MINADMINLEVEL)
          {
            if($location == '/admin/adduser.php' || $location == '/admin/listusers.php'
            || $location == '/admin/removeuser.php' || $location == '/admin/updateuser.php')
            {
              echo '<li class="active dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      Admin Tools
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">';
                    //Whether or not add user is included in the menulist and who it's visible to.
                    if($location == '/admin/adduser.php' && $_SESSION['authenticated'] >= $MINADDUSERLEVEL)
                    {
                      echo '<li class="active">
                        <a href="/admin/adduser.php">Add User</a>
                      </li>';
                    }
                    else if($_SESSION['authenticated'] >= $MINADDUSERLEVEL)
                    {
                      echo '<li>
                        <a href="/admin/adduser.php">Add User</a>
                      </li>';
                    }
                    //Whether or not list users is included in the menulist and who it's visible to.
                    if($location == '/admin/listusers.php' && $_SESSION['authenticated'] >= $MINLISTUSERLEVEL)
                    {
                      echo '<li class="active">
                        <a href="/admin/listusers.php">List Users</a>
                      </li>';
                    }
                    else if($_SESSION['authenticated'] >= $MINLISTUSERLEVEL)
                    {
                      echo '<li>
                        <a href="/admin/listusers.php">List Users</a>
                      </li>';
                    }
                    //Whether or not remove user is included in the menulist and who it's visible to.
                    if($location == '/admin/removeuser.php' && $_SESSION['authenticated'] >= $MINREMOVEUSERLEVEL)
                    {
                      echo '<li class="active">
                        <a href="/admin/removeuser.php">Remove User</a>
                      </li>';
                    }
                    else if($_SESSION['authenticated'] >= $MINREMOVEUSERLEVEL)
                    {
                      echo '<li>
                        <a href="/admin/removeuser.php">Remove User</a>
                      </li>';
                    }
                    //Whether or not update user is included in the menulist and who it's visible to.
                    if($location == '/admin/updateuser.php' && $_SESSION['authenticated'] >= $MINUPDATEUSERLEVEL)
                    {
                      echo '<li class="active">
                        <a href="/admin/updateuser.php">Update User</a>
                      </li>';
                    }
                    else if($_SESSION['authenticated'] >= $MINUPDATEUSERLEVEL)
                    {
                      echo '<li>
                        <a href="/admin/updateuser.php">Update User</a>
                      </li>';
                    }
                    echo '</ul>
                  </li>';
            }
            //No admin selected
            else
            {
              echo '<li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        Admin Tools
                        <span class="caret"></span>
                      </a>
                      <ul class="dropdown-menu">';
                      if($_SESSION['authenticated'] >= $MINADDUSERLEVEL)
                      {
                        echo '<li>
                              <a href="/admin/adduser.php">Add User</a>
                              </li>';
                      }
                      if($_SESSION['authenticated'] >= $MINLISTUSERLEVEL)
                      {
                        echo '<li>
                              <a href="/admin/listusers.php">List Users</a>
                              </li>';
                      }
                      if($_SESSION['authenticated'] >= $MINREMOVEUSERLEVEL)
                      {
                        echo '<li>
                              <a href="/admin/removeuser.php">Remove User</a>
                              </li>';
                      }
                      if($_SESSION['authenticated'] >= $MINUPDATEUSERLEVEL)
                      {
                        echo '<li>
                              <a href="/admin/updateuser.php">Update User</a>
                              </li>';
                      }
                      echo '</ul>
                      </li>';
              }
            }
          ?>
        <li><a href="/logout.php">Log out</a></li>
      </ul>
    </div>
  </div>
</nav>
