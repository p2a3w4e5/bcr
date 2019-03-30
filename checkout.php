<?php
include("header.php");
?>

    
               <div class="container body-content">
                   <div class="jumbotron">
                     <h2>Checkout</h2>
                   </div>
                   
                <div class="bootstrap-iso">
                    <div id="search">     
                          <h3>Your Current Checkout selection</h3>             	   
                    </div>
                    <br />
                    <br />
  <?php
                   
                        include("config.php");
                                 
                        $loguser = $_SESSION['login_user'];
                        $status ="sel" ; 
                        
                        $sql = "SELECT ht.movie_id, ht.customer_id, ht.id, mt.title_txt, mt.gengre_txt, mt.price_txt, mt.director_txt
                                FROM rentalhist_tbl ht 
                                LEFT JOIN movies_tbl mt ON  mt.id= ht.movie_id
                                WHERE ht.customer_id ='$loguser' AND ht.rent_status_txt ='$status'";
                                         
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
                               echo '<td><a href="deleterent.php?id=' . $row['id'] . '" onclick="return checkDeleteRental()">Delete</a></td>' ;
                               echo "</tr>";
                               
                        }

                        // close table>
                              echo "</tbody>";     
                              echo "</table>";
                       
            
                         

        
           

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
                        <input type="button" value="Add more movies" class="btn btn-primary" onclick="window.location.href='rentview.php'" />  
                        <input type="button" value="Pay" class="btn btn-primary" onclick="window.location.href='ccpay.php'" />  
                </div>
                 <br />
                <footer>
                    <p>Brew City Rental 2019</p>
                </footer>
         </div>
   
</body>
</html>
