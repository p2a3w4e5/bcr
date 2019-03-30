<?php
include("header.php");
?>

    
               <div class="container body-content">
                   <div class="jumbotron">
                     <h2>Your Rental History</h2>
                   </div>
                   
                <div class="bootstrap-iso">
                    <div id="search">     
                          <h3>Your Rental History</h3> 
<!--              	    <p>Search your rental history by date range</p> -->
                    <form  method="post" action="rentalhist.php?go"  id="searchform"> 
         
<!--                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="title">Rental Date From</label>
                                 <input type="date" class="form-control" id="txtYear" name="txtFrom" placeholder="Date From" required>  
                              </div>
                              <div class="form-group col-md-6">
                                <label for="director">Rental Date To</label>
                                 <input type="date" class="form-control" id="txtYear" name="txtTo" placeholder="Date To" required>  
                              </div>
                            </div>-->
  
                            <button type="submit" class="btn btn-primary">Search</button>
                          </form>
                    </div>
                    <br />
                    <br />
  <?php
                if($_SERVER["REQUEST_METHOD"] == "POST") {                   
                  
                        include("config.php");
        
                                 
                        $loguser = $_SESSION['login_user'];
                        
                        $sql = "SELECT ht.movie_id, ht.customer_id, ht.id, mt.title_txt, mt.gengre_txt, mt.price_txt, mt.director_txt
                                FROM rentalhist_tbl ht 
                                LEFT JOIN movies_tbl mt ON  mt.id= ht.movie_id
                                WHERE ht.customer_id ='$loguser'";
                                         
                         if (!$db)
                         {
                             die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
                         }

                     
                           $result = mysqli_query($db,$sql);
                           $total_results = mysqli_num_rows($result);
                           
                          // display data in table

                        echo "<table class='table'>";
                        echo "<thead class='thead-dark'>";
                        echo "<tr><th scope='col'>Movie Title</th><th scope='col'>Director</th><th scope='col'>Gengre</th><th scope='col'>Price</th></tr>";                   
                        echo "</thead>";


                        // loop through results of database query, displaying them in the table
                        while($row = mysqli_fetch_assoc($result)) {
                
                          // echo out the contents of each row into a table
                               echo "<tbody>";    
                               echo "<tr>";
                               echo '<td>' . $row['title_txt'] . '</td>'; 
                               echo '<td>' . $row['director_txt'] . '</td>';    
                               echo '<td>' . $row['gengre_txt'] . '</td>';
                               echo '<td>' . $row['price_txt'] . '</td>';  
                               echo "</tr>";
                               
                        }

                        // close table>
                              echo "</tbody>";     
                              echo "</table>";
                              
        
   }        


function endsWith($haystack, $needle)
{
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }

    return (substr($haystack, -$length) === $needle);
}


?>
               
                    <br />

<!--                </div>-->
                <hr />
                <div> 
                        <input type="button" value="Main Movie Page" class="btn btn-primary" onclick="window.location.href='movies.php'" />    
                </div>
                 <br />
                <footer>
                    <p>Brew City Rental 2019</p>
                </footer>
         </div>
   
</body>
</html>
