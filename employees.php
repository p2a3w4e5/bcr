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
  if($_SESSION["role"] == "Admin") { 
      echo '<div class="col-md-4">';
      echo '<h2>Add New Employee</h2>';
      echo '<p>Add New Employee to the database </p>';
      echo '<p><a class="btn btn-primary" href="addemployee.php">Add Employee</a> </p>';
      echo '</div>';
      echo ' <div class="col-md-4">';
      echo ' <h2>View or Edit Employees</h2>';
      echo '<p>View or Edit Employees in the database</p>';
      echo '<p><a class="btn btn-primary" href="viewempl.php">View/Edit Employee</a></p>';
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
