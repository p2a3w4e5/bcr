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

<?php
   if($_SESSION["role"] == "Admin" or $_SESSION["role"] == "Clerk" ) { 
//      echo '<div class="col-md-4">';
//      echo '<h2>Add New Customer</h2>';
//      echo '<p>Add New Customer to the database </p>';
//      echo '<p><a class="btn btn-primary" href="addcustomer.php">Add Customer</a> </p>';
//      echo '</div>';
      echo ' <div class="col-md-4">';
      echo ' <h2>View or Edit Customers</h2>';
      echo '<p>View or Edit Customers in the database</p>';
      echo '<p><a class="btn btn-primary" href="viewcustomers.php">View/Edit Customer</a></p>';
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
