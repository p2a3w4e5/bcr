<?php

function renderForm($id, $title, $director, $actors, $year, $price, $gengre, $copies, $error)
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
                     <h2>Edit movie data</h2>
                   </div>
                   
                <div class="bootstrap-iso">
                    <div id="search">     
                          <h3>Edit  Movies Details</h3> 
              	    
                                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
                                    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
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
                                        <input type="text" class="form-control" id="txtTitle" name="txtTitle" value="<?php echo $title; ?>" placeholder="Movie Title" required>       
                                    </div>

                                    <div class="form-group ">
                                     <label class="control-label requiredField" for="txtDirector">
                                      Director
                <!--                      <span class="asteriskField">
                                      * <?php echo $directorErr;?>
                                      </span>-->
                                     </label>
                                        <input type="text" class="form-control" id="txtDirector" name="txtDirector" value="<?php echo $director; ?>"  placeholder="Director" required>          


                                    </div>

                                    <div class="form-group ">
                                     <label class="control-label requiredField" for="txtActors">
                                      Actors
                <!--                      <span class="asteriskField">
                                       * <?php echo $actorsErr;?>
                                      </span>-->
                                     </label>

                                         <input type="text" class="form-control" id="txtActors" name="txtActors" value="<?php echo $actors; ?>" placeholder="Actors" required>          


                                    </div>

                                    <div class="form-group ">
                                     <label class="control-label requiredField" for="txtYear">
                                      Release Year
                <!--                      <span class="asteriskField">
                                       * <?php echo $nameErr;?>
                                      </span>-->

                                     </label>

                                        <input type="date" class="form-control" id="txtYear" name="txtYear" value="<?php echo $year; ?>" placeholder="Year" required>          

                                    </div>

                                    <div class="form-group ">
                                     <label class="control-label " for="txtPrice">
                                      Price
                <!--                       <span class="asteriskField">
                                       * <?php echo $priceErr;?>
                                      </span>-->
                                     </label>

                                      <input type="text" class="form-control" id="txtPrice" name="txtPrice" value="<?php echo $price; ?>" placeholder="Price" required>       

                                    </div>

                                    <div class="form-group ">
                                     <label class="control-label requiredField" for="cmbGengre">
                                     Movie Gengre
                <!--                      <span class="asteriskField">
                                       * <?php echo $gengreErr;?>
                                      </span>-->
                                     </label>

                                         <select name="cmbGengre" ID="cmbGengre" class="select form-control" value="<?php echo $gengre; ?>" required>
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


                                       <input type="number" class="form-control" id="txtCopies" name="txtCopies" value="<?php echo $copies; ?>" placeholder="Copies" min="1" max="5" required>  

                                    </div>
                                    <div class="form-group">
                                     <div>
                                         <input ID="btnUpdate" type="submit" value="Update Movie" name="submit" class="btn btn-primary"/>
                                         <input type="button" value="Main Movie Page" class="btn btn-primary" onclick="window.location.href='movies.php'" />      

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

        $title = $_POST['txtTitle'];
        $director = $_POST['txtDirector'];
        $actors = $_POST['txtActors'];
        $year = $_POST['txtYear'];
        $price = $_POST['txtPrice'];
        $gengre = $_POST['cmbGengre'];
        $copies = $_POST['txtCopies'];

// save the data to the database
    $sql = "UPDATE `movies_tbl` SET `title_txt`='$title',`actors_txt`='$actors',`year_txt`='$year',`gengre_txt`='$gengre',`copies_txt`='$copies',
            `price_txt`='$price',`director_txt`='$director' WHERE `id`='$id'";
    
       if(mysqli_query($db, $sql)){
            //echo "Records inserted successfully.";
            $insertStatus = "Records updated successfully.";
        } else{
         echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
        }

// once saved, redirect back to the view page

header("Location: viewmovies.php");



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
$sql = "SELECT * FROM movies_tbl WHERE id = '$id'";  

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

        $title = $row['title_txt'];
        $director = $row['director_txt'];
        $actors = $row['actors_txt'];
        $year = $row['year_txt'];
        $price = $row['price_txt'];
        $gengre = $row['gengre_txt'];
        $copies = $row['copies_txt'];

// show form

renderForm($id, $title, $director, $actors, $year, $price, $gengre, $copies, '');

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
                        <input type="button" value="Movie Search Page" class="btn btn-primary" onclick="window.location.href='viewmovies.php'" />    
                </div>
                 <br />
                <footer>
                    <p>Brew City Rental 2019</p>
                </footer>
         </div>
   
</body>
</html>
