<?php

function renderForm($id, $firstname, $lastname, $email, $address1, $address2, $city, $zip, $state, $accstatus)
{


?>


      
<?php
include("header.php");

  if($_SESSION["role"] == "Admin") { 
      
  }
  
    elseif($_SESSION["role"] == "Clerk") { 

  }
  
      elseif($_SESSION["role"] == "Cust") { 
      header("Location: index.php");
  }
 else 
      {
           header("Location: index.php");
      }
?>
               <div class="container body-content">
                   <div class="jumbotron">
                     <h2>Edit customer data</h2>
                   </div>
                   
                <div class="bootstrap-iso">
                    <div id="search">     
                          <h3>Edit customer details</h3> 
              	    
                                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
                                    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                                    <div class="container-fluid">
                                 <div class="row">
                                     
                                  <div class="col-md-6 col-sm-6 col-xs-12">

                                    <div class="form-group ">
                                     <label class="control-label requiredField" for="txtFirstname">
                                      First Name
                <!--                      <span class="asteriskField">
                                       * <?php echo $titleErr;?>
                                      </span>-->
                                     </label>
                                        <input type="text" class="form-control" id="txtFirstname" name="txtFirstname" value="<?php echo $firstname; ?>" placeholder="First Name" required>       
                                    </div>

                                    <div class="form-group ">
                                     <label class="control-label requiredField" for="txtLastname">
                                      Last Name
                <!--                      <span class="asteriskField">
                                      * <?php echo $directorErr;?>
                                      </span>-->
                                     </label>
                                        <input type="text" class="form-control" id="txtLastname" name="txtLastname" value="<?php echo $lastname; ?>"  placeholder="Last Name" required>          


                                    </div>

                                    <div class="form-group ">
                                     <label class="control-label requiredField" for="txtEmail">
                                      Email
                <!--                      <span class="asteriskField">
                                       * <?php echo $actorsErr;?>
                                      </span>-->
                                     </label>

                                         <input type="text" class="form-control" id="txtEmail" name="txtEmail" value="<?php echo $email; ?>" placeholder="Email" required>          


                                    </div>

                                    <div class="form-group ">
                                     <label class="control-label requiredField" for="txtAddress1">
                                      Address 1
                <!--                      <span class="asteriskField">
                                       * <?php echo $nameErr;?>
                                      </span>-->

                                     </label>

                                        <input type="text" class="form-control" id="txtAddress1" name="txtAddress1" value="<?php echo $address1; ?>" placeholder="Address 1" required>          

                                    </div>

                                    <div class="form-group ">
                                     <label class="control-label " for="txtAddress2">
                                      Address 2
                <!--                       <span class="asteriskField">
                                       * <?php echo $priceErr;?>
                                      </span>-->
                                     </label>

                                      <input type="text" class="form-control" id="txtAddress2" name="txtAddress2" value="<?php echo $address2; ?>" placeholder="Address 2">       

                                    </div>
                                      
                                     <div class="form-group ">
                                     <label class="control-label " for="txtCity">
                                      City
                <!--                       <span class="asteriskField">
                                       * <?php echo $priceErr;?>
                                      </span>-->
                                     </label>

                                      <input type="text" class="form-control" id="txtCity" name="txtCity" value="<?php echo $city; ?>" placeholder="City" required>       

                                    </div>

                                    <div class="form-group ">
                                     <label class="control-label requiredField" for="cmbState">
                                     State
                <!--                      <span class="asteriskField">
                                       * <?php echo $gengreErr;?>
                                      </span>-->
                                     </label>
                                        
                                       <select name="cmbState" ID="cmbState" class="select form-control" value="<?php echo $state; ?>" required> 
<?php                                   
                                       $theArray = array("Alabama","Alaska","Illinois","Minnesota","Wisconsin","Wyoming"); 
                                       
                                       foreach ($theArray as $key => $stat) {
                                            if ($state == $stat) {
                                                echo('<option selected="selected" value='.$stat.'>'.$stat.'</option>');
                                            } else {
                                                echo('<option value='.$stat.'>'.$stat.'</option>');
                                            }
                                        }
                                       
?>       
                                      </select>
                                        

                                    </div>

                                      <div class="form-group ">
                                          
                                            <label class="control-label " for="txtZip">
                                             Zip
                       <!--                       <span class="asteriskField">
                                              * <?php echo $priceErr;?>
                                             </span>-->
                                            </label>

                                             <input type="text" class="form-control" id="txtZip" name="txtZip" value="<?php echo $zip; ?>" placeholder="Zip" required>       

                                    </div>

                                    <div class="form-group ">
                                     <label class="control-label requiredField" for="cmbAccStatus">
                                      Account Status
                <!--                      <span class="asteriskField">
                                       * <?php echo $statusErr;?>
                                      </span>-->
                                     </label>
                                
                                    <select name="cmbAccStatus" ID="cmbAccStatus" class="select form-control" value="<?php echo $accstatus; ?>" required> 
<?php                                   
                                       $theArray = array("Active","Suspended","Cancelled"); 
                                       
                                       foreach ($theArray as $key => $stat) {
                                            if ($accstatus == $stat) {
                                                echo('<option selected="selected" value='.$stat.'>'.$stat.'</option>');
                                            } else {
                                                echo('<option value='.$stat.'>'.$stat.'</option>');
                                            }
                                        }
                                       
?>       
                                      </select>
                                        
                                 
                                    </div>
                                      
                                      
                                    <div class="form-group">
                                     <div>
                                         <input ID="btnUpdate" type="submit" value="Update Customer" name="submit" class="btn btn-primary"/>
                                         <input type="button" value="Main Customer Page" class="btn btn-primary" onclick="window.location.href='customers.php'" />      

                                     </div>
                                    </div>

                                  </div>
                                 </div>

                                    <label class="control-label"><?php echo $insertStatus; ?></label>


                                </div>


                            </form>
                    
                    </div>
                    <br />
<?php

}

// connect to the database

include("config.php");

// check if the form has been submitted. If it has, process the form and save it to the database

if (isset($_POST['submit']))

{

// confirm that the 'id' value is a valid integer before getting the form data

if ($_POST['id'])

{

// get form data, making sure it is valid

        $id = $_POST['id'];

        $firstname = $_POST['txtFirstname'];
        $lastname = $_POST['txtLastname'];
        $email = $_POST['txtEmail'];
        $address1 = $_POST['txtAddress1'];
        $address2 = $_POST['txtAddress2'];
        $city = $_POST['txtCity'];
        $zip = $_POST['txtZip'];
        $state = $_POST['cmbState'];
        $accstatus = $_POST['cmbAccStatus'];

// save the data to the database
    $sql = "UPDATE `customers_tbl` SET `first_name_txt`='$firstname',`last_name_txt`='$lastname',`email_txt`='$email',`address1_txt`='$address1',`address2_txt`='$address2',
            `city_txt`='$city',`zip_txt`='$zip',`state_txt`='$state',`account_status_txt`='$accstatus' WHERE `id`='$id'";
    
       if(mysqli_query($db, $sql)){
            //echo "Records inserted successfully.";
            $insertStatus = "Records updated successfully.";
        } else{
         echo "ERROR: Could not execute $sql. " . mysqli_error($db);
        }

// once saved, redirect back to the view page

header("Location: viewcustomers.php");

}

else

{

// if the 'id' isn't valid, display an error

echo 'Error!';

}

}

else

// if the form hasn't been submitted, get the data from the db and display the form

{



// get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)

if (isset($_GET['id']) && $_GET['id'] <> '')

{

// query db

$id = $_GET['id'];
$sql = "SELECT * FROM customers_tbl WHERE id = '$id'";  

$result = mysqli_query($db,$sql);

 if (!$db)
{
    die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
}

$row = mysqli_fetch_array($result);

// check that the 'id' matches up with a row in the databse

if($row)

{

// get data from db

       
        $firstname = $row['first_name_txt'];
        $lastname = $row['last_name_txt'];
        $email = $row['email_txt'];
        $address1 = $row['address1_txt'];
        $address2 = $row['address2_txt'];
        $city = $row['city_txt'];
        $zip = $row['zip_txt'];
        $state = $row['state_txt'];
        $accstatus = $row['account_status_txt'];

// show form

renderForm($id, $firstname, $lastname, $email, $address1, $address2, $city, $zip, $state, $accstatus);
}

else

// if no match, display result

{

echo "No results!";

}

}

else

// if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error

{

echo 'Error!';

}

}

?>

                </div>
                <hr />
                <div> 
                        <input type="button" value="Customers Search Page" class="btn btn-primary" onclick="window.location.href='viewcustomers.php'" />    
                </div>
                 <br />
                <footer>
                    <p>Brew City Rental 2019</p>
                </footer>
         </div>
   
</body>
</html>
