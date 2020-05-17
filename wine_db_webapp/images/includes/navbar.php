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
          //HOME
          if($location == "/home.php")
          {
           echo '<li class="active"><a href="/home.php">Home</a></li>';
          }
          else
          {
           echo '<li><a href="/home.php">Home</a></li>';
          }
          //Admin home page selected
          if($_SESSION['authenticated'] >= 3)
          {
            if($location == "/admin.php")
            {
              echo '<li class="active dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="admin.php">
                        Admin Tools
                        <span class="caret"></span>
                      </a>
                      <ul class="dropdown-menu">
                        <li>
                          <a href="/admin/adduser.php">Add User</a>
                        </li>
                      </ul>
                    </li>';
            }
            //Admin tool selected
            else if($location == '/admin/adduser.php')
            {
              echo '<li class="active dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="admin.php">
                        Admin Tools
                        <span class="caret"></span>
                      </a>
                      <ul class="dropdown-menu">';
                        if($location == '/admin/adduser.php')
                        {
                          echo '<li class="active">
                            <a href="/admin/adduser.php">Add User</a>
                          </li>';
                        }
                        else
                        {
                          echo '<li>
                            <a href="/admin/adduser.php">Add User</a>
                          </li>';
                        }
                      echo '</ul>
                    </li>';
            }
            //No admin selected
            else
            {
              echo '<li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="admin.php">
                        Admin Tools
                        <span class="caret"></span>
                      </a>
                      <ul class="dropdown-menu">
                        <li>
                          <a href="/admin/adduser.php">Add User</a>
                        </li>
                      </ul>
                    </li>';
            }
          }
        ?>
        <li><a href="/logout.php">Log out</a></li>
      </ul>
    </div>
  </div>
</nav>
