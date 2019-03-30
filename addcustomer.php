<?php
include("header.php");

  if($_SESSION["role"] == "Admin") { 
      
  }
  
    elseif($_SESSION["role"] == "Clerk") { 
     header("Location: index.php");
  }
  
      elseif($_SESSION["role"] == "Cust") { 
      header("Location: index.php");
  }
 else 
      {
           header("Location: index.php");
      }
?>

<?php
   include("config.php");

   $insertStatus ="";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
     
       //validate the inputs
//            if (empty($_POST["txtTitle"])) {
//          $titleErr = "Title is required";
//        } else {
//          $title = test_input($_POST["txtTitle"]);
//        }
//
//        if (empty($_POST["txtDirector"])) {
//          $directorErr = "Director is required";
//        } else {
//          $director = test_input($_POST["txtDirector"]);
//        }
//
//        if (empty($_POST["txtActors"])) {
//           $actorsErr = "Actor is required";
//        } else {
//          $actors = test_input($_POST["txtActors"]);
//        }
//
//        if (empty($_POST["txtYear"])) {
//          $yearErr = "Release year is required";
//        } else {
//          $year = test_input($_POST["txtYear"]);
//        }
//
//        if (empty($_POST["txtPrice"])) {
//          $priceErr = "Gender is required";
//        } else {
//          $price = test_input($_POST["txtPrice"]);
//        }
//        
//         if (empty($_POST["cmbGengre"])) {
//          $gengreErr = "Gengre is required";
//        } else {
//          $gengre = test_input($_POST["cmbGengre"]);
//        }
//        
//         if (empty($_POST["txtCopies"])) {
//          $copiesErr = "Copies is required";
//        } else {
//          $copies = test_input($_POST["txtCopies"]);
//        }
  
        
        $guid = bin2hex(openssl_random_pseudo_bytes(16));
        $firstname = $_POST['txtFirstName'];
        $lastname = $_POST['txtLastName'];
        $email = $_POST['txtEmail'];
        $address1 = $_POST['txtAddress1'];
        $address2 = $_POST['txtAddress2'];
        $city = $_POST['txtCity'];
        $zip = $_POST['txtZip'];
        $state = $_POST['cmbState'];
        $accstatus = "Active";
        
       $sql= "INSERT INTO `customers_tbl`(`id`, `first_name_txt`, `last_name_txt`, `email_txt`, `address1_txt`, `address2_txt`, `city_txt`, `zip_txt`,`state_txt`,`account_status_txt`) 
                 VALUES ('$guid','$firstname','$lastname','$email','$address1','$address2','$city','$zip','$state','$accstatus')";
       
         if (!$db)
        {
            die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
        }      
  
   
      if(mysqli_query($db, $sql)){
            //echo "Records inserted successfully.";
            $insertStatus = "Records inserted successfully.";
        } else{
         echo "ERROR: Could not execute $sql. " . mysqli_error($db);
        }
 
   }
   
?>

        <div class="container body-content">
            <div class="jumbotron">
              <h2>Enter new customer data</h2>
            </div>
                <div class="bootstrap-iso">


    <br />
<!--        <form action = "" method = "post">-->
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
                <div class="container-fluid">
                 <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-12">

                    <div class="form-group ">
                     <label class="control-label requiredField" for="txtFirstName">
                      First Name
<!--                      <span class="asteriskField">
                       * <?php echo $titleErr;?>
                      </span>-->
                     </label>
                        <input  pattern=".{3,50}" type="text" class="form-control" id="txtFirstName" name="txtFirstName" placeholder="First Name" required>       
                    </div>

                    <div class="form-group ">
                     <label class="control-label requiredField" for="txtLastName">
                      Last Name
<!--                      <span class="asteriskField">
                      * <?php echo $directorErr;?>
                      </span>-->
                     </label>
                        <input pattern=".{3,50}" type="text" class="form-control" id="txtLastName" name="txtLastName" placeholder="Last Name" required>          


                    </div>

                    <div class="form-group ">
                     <label class="control-label requiredField" for="txtEmail">
                      Email
<!--                      <span class="asteriskField">
                       * <?php echo $actorsErr;?>
                      </span>-->
                     </label>

                         <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="Email" required>          


                    </div>

                    <div class="form-group ">
                     <label class="control-label requiredField" for="address1_txt">
                      Address 1
<!--                      <span class="asteriskField">
                       * <?php echo $nameErr;?>
                      </span>-->
                      
                     </label>

                        <input pattern=".{3,50}" type="text" class="form-control" id="txtAddress1" name="txtAddress1" placeholder="Address 1" required>          

                    </div>

                    <div class="form-group ">
                     <label class="control-label " for="address2_txt">
                      Address 2
<!--                       <span class="asteriskField">
                       * <?php echo $priceErr;?>
                      </span>-->
                     </label>

                      <input pattern=".{3,50}" type="text" class="form-control" id="txtAddress2" name="txtAddress2" placeholder="Address 2">       

                    </div>
                      
                     <div class="form-group ">
                     <label class="control-label " for="txtCity">
                      City
<!--                       <span class="asteriskField">
                       * <?php echo $priceErr;?>
                      </span>-->
                     </label>

                      <input pattern=".{3,50}" type="text" class="form-control" id="txtCity" name="txtCity" placeholder="City" required>       

                    </div>
                      
                    <div class="form-group ">
                     <label class="control-label " for="txtZip">
                      Zip
<!--                       <span class="asteriskField">
                       * <?php echo $priceErr;?>
                      </span>-->
                     </label>

                      <input pattern=".{5,5}" type="text" class="form-control" id="txtZip" name="txtZip" placeholder="Zip" required>       

                    </div>

                    <div class="form-group ">
                     <label class="control-label requiredField" for="cmbState">
                     State
<!--                      <span class="asteriskField">
                       * <?php echo $gengreErr;?>
                      </span>-->
                     </label>
                        
                         <select name="cmbState" ID="cmbState" class="select form-control" required>
                                <option selected value="">State...</option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                                <option value="AZ">Arizona</option>
                                <option value="AR">Arkansas</option>
                                <option value="CA">California</option>
                                <option value="CO">Colorado</option>
                                <option value="CT">Connecticut</option>
                                <option value="DE">Delaware</option>
                                <option value="FL">Florida</option>
                                <option value="GA">Georgia</option>
                                <option value="HI">Hawaii</option>
                                <option value="ID">Idaho</option>
                                <option value="IL">Illinois</option>
                                <option value="IN">Indiana</option>
                                <option value="IA">Iowa</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="ME">Maine</option>
                                <option value="MD">Maryland</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MI">Michigan</option>
                                <option value="MN">Minnesota</option>
                                <option value="MS">Mississippi</option>
                                <option value="MO">Missouri</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NV">Nevada</option>
                                <option value="NH">New Hampshire</option>
                                <option value="NJ">New Jersey</option>
                                <option value="NM">New Mexico</option>
                                <option value="NY">New York</option>
                                <option value="NC">North Carolina</option>
                                <option value="ND">North Dakota</option>
                                <option value="OH">Ohio</option>
                                <option value="OK">Oklahoma</option>
                                <option value="OR">Oregon</option>
                                <option value="PA">Pennsylvania</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC">South Carolina</option>
                                <option value="SD">South Dakota</option>
                                <option value="TN">Tennessee</option>
                                <option value="TX">Texas</option>
                                <option value="UT">Utah</option>
                                <option value="VT">Vermont</option>
                                <option value="VA">Virginia</option>
                                <option value="WA">Washington</option>
                                <option value="WV">West Virginia</option>
                                <option value="WI">Wisconsin</option>
                                <option value="WY">Wyoming</option>

                                </select>
                   
                    </div>
             
                    <div class="form-group">
                     <div>
                         <input ID="btnAdd" type="submit" value="Add New Customer" name="submit" class="btn btn-primary"/>
<!--                         <input ID="btnCancel" type="reset" value="Cancel" name="cancel" class="btn btn-primary"/>-->
                         <input type="button" value="Main Customers Page" class="btn btn-primary" onclick="window.location.href='customers.php'" />      

                     </div>
                    </div>

                  </div>
                 </div>
                    
                    <label class="control-label"><?php echo $insertStatus; ?></label>
             
                    
                </div>
            
            
            </form>
</div>
         </div>

            <hr />
            <footer>
                <p>Brew City Rental Application</p>
            </footer>
        </div>
   
</body>
</html>