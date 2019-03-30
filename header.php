<?php
ob_start();
session_start();
error_reporting( error_reporting() & ~E_NOTICE );
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Brew City Rental</title>

    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/custom.css">
    <link rel="stylesheet" href="styles/vd.css">
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</head>

<script language="JavaScript" type="text/javascript">
function checkDeleteRental(){
    return confirm('Remove this movie from Rental basket?');
}
</script>

<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure?');
}
</script>

<script language="JavaScript" type="text/javascript">
function confirmRent(){
    return alert('Movie has been added to the rent basket.');
}
</script>

<body>
      
<video autoplay muted loop id="myVideo">
  <source src="styles/bckvide1.mp4" type="video/mp4">
</video>

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container" bacground>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" runat="server" href="index.php">Brew City Rental</a>
                </div>
                <div class="navbar-collapse collapse">
             
                     <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
<?php
if ($_SESSION['invlog'] == "")
{
   $_SESSION['invlog'] = "ini" ;
}
  if($_SESSION["role"] == "Admin") { 
      echo '<li><a href="customers.php">Customers</a></li>';
      echo '<li><a href="movies.php">Movies</a></li>';
      echo '<li><a href="employees.php">Employees</a></li>';
      echo '<li><a href="about.php">About</a></li>';
      echo '<li><a href="contact.php">Contact</a></li>';
      echo '<li><a href="logoff.php">Log Off</a></li>';
  }
  
    elseif($_SESSION["role"] == "Clerk") { 
      echo '<li><a href="customers.php">Customers</a></li>';
      echo '<li><a href="movies.php">Movies</a></li>';
      echo '<li><a href="about.php">About</a></li>';
      echo '<li><a href="contact.php">Contact</a></li>';
      echo '<li><a href="logoff.php">Log Off</a></li>';
  }
  
      elseif($_SESSION["role"] == "Cust") { 
      echo '<li><a href="movies.php">Movies</a></li>';
      echo '<li><a href="about.php">About</a></li>';
      echo '<li><a href="contact.php">Contact</a></li>';
      echo '<li><a href="logoff.php">Log Off</a></li>';
  }
 else 
      {
           echo '<li><a href="about.php">About</a></li>';
           echo '<li><a href="contact.php">Contact</a></li>';
           echo '<li><a href="login.php">Log In</a></li>';
      }
?>

          </ul>
                    
                </div>
            </div>
        </div>