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

<?php
   include("config.php");
      // error_reporting( error_reporting() & ~E_NOTICE )
//        function test_input($data) {
//            $data = trim($data);
//            $data = stripslashes($data);
//            $data = htmlspecialchars($data);
//       return $data;
//     }
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
        $title = $_POST['txtTitle'];
        $director = $_POST['txtDirector'];
        $actors = $_POST['txtActors'];
        $year = $_POST['txtYear'];
        $price = $_POST['txtPrice'];
        $gengre = $_POST['cmbGengre'];
        $copies = $_POST['txtCopies'];
        
       $sql= "INSERT INTO `movies_tbl`(`id`, `title_txt`, `actors_txt`, `year_txt`, `gengre_txt`, `copies_txt`, `price_txt`, `director_txt`) 
                 VALUES ('$guid','$title','$actors','$year','$gengre','$copies','$price','$director')";
       
         if (!$db)
        {
            die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
        }      
  
   
      if(mysqli_query($db, $sql)){
            //echo "Records inserted successfully.";
            $insertStatus = "Records inserted successfully.";
        } else{
         echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
        }
 
   }
   
?>

        <div class="container body-content">
            <div class="jumbotron">
              <h2>Enter new movie data</h2>
            </div>
                <div class="bootstrap-iso">


    <br />
<!--        <form action = "" method = "post">-->
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
                <div class="container-fluid">
                 <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-12">

                    <div class="form-group ">
                     <label class="control-label requiredField" for="txtTitle">
                      Movie Title
<!--                      <span class="asteriskField">
                       * <?php echo $titleErr;?>
                      </span>-->
                     </label>
                        <input pattern=".{3,50}" type="text" class="form-control" id="txtTitle" name="txtTitle" placeholder="Movie Title" required>       
                    </div>

                    <div class="form-group ">
                     <label class="control-label requiredField" for="txtDirector">
                      Director
<!--                      <span class="asteriskField">
                      * <?php echo $directorErr;?>
                      </span>-->
                     </label>
                        <input pattern=".{3,50}" type="text" class="form-control" id="txtDirector" name="txtDirector" placeholder="Director" required>          


                    </div>

                    <div class="form-group ">
                     <label class="control-label requiredField" for="txtActors">
                      Actor
<!--                      <span class="asteriskField">
                       * <?php echo $actorsErr;?>
                      </span>-->
                     </label>

                         <input pattern=".{3,50}" type="text" class="form-control" id="txtActors" name="txtActors" placeholder="Actors" required>          


                    </div>

                    <div class="form-group ">
                     <label class="control-label requiredField" for="txtYear">
                      Release Year
<!--                      <span class="asteriskField">
                       * <?php echo $nameErr;?>
                      </span>-->
                      
                     </label>

                        <input type="date" class="form-control" id="txtYear" name="txtYear" placeholder="Year" required>          

                    </div>

                    <div class="form-group ">
                     <label class="control-label " for="txtPrice">
                      Price
<!--                       <span class="asteriskField">
                       * <?php echo $priceErr;?>
                      </span>-->
                     </label>

                      <input type="text" class="form-control" id="txtPrice" name="txtPrice" placeholder="Price" required>       

                    </div>

                    <div class="form-group ">
                     <label class="control-label requiredField" for="cmbGengre">
                     Movie Gengre
<!--                      <span class="asteriskField">
                       * <?php echo $gengreErr;?>
                      </span>-->
                     </label>
                        
                         <select name="cmbGengre" ID="cmbGengre" class="select form-control" required>
                            <option value="Action">Action</option>
                            <option value="Adventure">Adventure</option>
                            <option value="Comedy">Comedy</option>
                            <option value="Crime">Crime</option>
                            <option value="Drama">Drama</option>
                            <option value="Horror">Horror</option>
                            <option value="Science Fiction">Science Fiction</option>
                            <option value="War">War</option>
                        </select> 
                   
                    </div>

                    <div class="form-group ">
                     <label class="control-label requiredField" for="txtCopies">
                      Number of Copies
<!--                      <span class="asteriskField">
                       * <?php echo $copiesErr;?>
                      </span>-->
                     </label>


                       <input type="number" class="form-control" id="txtCopies" name="txtCopies" placeholder="Copies" min="1" max="5" required>  

                    </div>
                    <div class="form-group">
                     <div>
                         <input ID="btnAdd" type="submit" value="Add New Movie" name="submit" class="btn btn-primary"/>
<!--                         <input ID="btnCancel" type="reset" value="Cancel" name="cancel" class="btn btn-primary"/>-->
                         <input type="button" value="Main Movie Page" class="btn btn-primary" onclick="window.location.href='movies.php'" />      

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