<?php
include("header.php");

?>
        <div class="container body-content">
             <div ID="MainContent">
                 <div class="jumbotron">
                    <h1>Brew City Rental</h1>
                    <p class="lead">Your favorite movies for half the price.</p>
                </div>

                        <div class="row">
                            <div class="col-md-4">
                                <h2>Rent a movie</h2>
                                <p>
                                    Rent a movie
                                </p>
                                <p>
                                    <a class="btn btn-primary" href="rentview.php">Rent</a>
                                </p>
                            </div>
 
 
<?php
  if($_SESSION["role"] == "Admin" or $_SESSION["role"] == "Clerk" ) { 
      echo '<div class="col-md-4">';
      echo '<h2>Add New Movie</h2>';
      echo '<p>Add New Movie to the database </p>';
      echo '<p><a class="btn btn-primary" href="addmovie.php">Add Movie</a> </p>';
      echo '</div>';
      echo ' <div class="col-md-4">';
      echo ' <h2>View or Edit Movies</h2>';
      echo '<p>View or Edit Movies in the database</p>';
      echo '<p><a class="btn btn-primary" href="viewmovies.php">View/Edit Movies</a></p>';
      echo '</div>';
      }
 elseif ($_SESSION["role"] == "Cust") {
     
      echo '<div class="col-md-4">';
      echo '<h2>Your Rental History</h2>';
      echo '<p>See your rental history </p>';
      echo '<p><a class="btn btn-primary" href="rentalhist.php">Rental History </a> </p>';
      echo '</div>';
      }
      
  
  ?>                        
                                         
            </div>
            <hr />
            <footer>
                <p>Brew City Rental Application</p>
            </footer>
        </div>
   
</body>
</html>
