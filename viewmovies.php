<?php
include("header.php");
?>

    
               <div class="container body-content">
                   <div class="jumbotron">
                     <h2>View or Edit movie data</h2>
                   </div>
                   
                <div class="bootstrap-iso">
                    <div id="search">     
                          <h3>Search  Movies Details</h3> 
              	    <p>You  may search either by movie title, director, actors or release date</p> 
                    <form  method="post" action="viewmovies.php?go"  id="searchform"> 
         
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                              </div>
                              <div class="form-group col-md-6">
                                <label for="director">Director</label>
                                <input type="text" class="form-control" id="director" name="director" placeholder="Director">
                              </div>
                            </div>
                        
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="actor">Actor</label>
                                <input type="text" class="form-control" id="actor" placeholder="Actor">
                              </div>
                              <div class="form-group col-md-6">
                                <label for="year">Release year</label>
                                <input type="text" class="form-control" id="year" placeholder="Release year">
                              </div>
                            </div>
                        
                            <button type="submit" class="btn btn-primary">Search</button>
                          </form>
                    </div>
                    <br />
                    <br />
  <?php
                if($_SERVER["REQUEST_METHOD"] == "POST") {                   
                  
                        include("config.php");
         
                        
                         $m=0;
                         $per_page = 2;
                         $sql = "SELECT * FROM movies_tbl WHERE";
                         $sqladd ="";
                         $ss ="0";
                         
                         $title = $_POST['title'];
                         $director = $_POST['director'];
                         $actor = $_POST['actor'];
                         $year = $_POST['year'];
                        
                         if ($title <>'')
                         
                         {
                           
                              if ($ss=="0") {
                                   $ss = "1";
                                   $sqladd= " title_txt LIKE '%$title%' ";
                                   $sql = $sql . $sqladd;
                                } else {
                                   $sqladd= " title_txt LIKE '%$title%' ";
                                   $sql = $sql . $sqladd;
                                }      
                         }
                         
                         if ($director <>'')
                         
                         {
                           
                              if ($ss=="0") {
                                   $ss = "1";
                                   $sqladd= " director_txt LIKE '%$director%' ";
                                   $sql = $sql . $sqladd;
                                } else {
                                   $sqladd= " AND director_txt LIKE '%$director%' ";
                                   $sql = $sql . $sqladd;
                                }      
                         }
                         
                         if ($actor <>'')
                         
                         {
                           
                              if ($ss=="0") {
                                   $ss = "1";
                                   $sqladd= " actors_txt LIKE '%$actor%' ";
                                   $sql = $sql . $sqladd;
                                } else {
                                   $sqladd= " AND actors_txt LIKE '%$actor%' ";
                                   $sql = $sql . $sqladd;
                                }      
                         }
                         
                         if ($actor <>'')
                         
                         {
                           
                              if ($ss=="0") {
                                   $ss = "1";
                                   $sqladd= " year_txt LIKE '%$year%' ";
                                   $sql = $sql . $sqladd;
                                } else {
                                   $sqladd= " AND year_txt LIKE '%$year%' ";
                                   $sql = $sql . $sqladd;
                                }      
                         }
                       
                         
                         if (endsWith($sql, "WHERE"))
                         {
                             $sql = "SELECT * FROM movies_tbl " ;
                         }
                         
                         if (!$db)
                         {
                             die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
                         }

                           $_SESSION['vmsql'] = $sql;
                           $result = mysqli_query($db,$sql);

                           $total_results = mysqli_num_rows($result);

                           $total_pages = ceil($total_results / $per_page);

                        if (isset($_GET['page']) && is_numeric($_GET['page']))

                         {

                          $show_page = $_GET['page'];

                          if ($show_page > 0 && $show_page <= $total_pages)

                         {

                         $start = ($show_page -1) * $per_page;

                         $end = $start + $per_page;

                         }

                         else

                         {

                         // error - show first set of results

                         $start = 0;

                         $end = $per_page;

                         }

                         }

                         else

                         {

                         // if page isn't set, show first set of results

                         $start = 0;

                         $end = $per_page;

                         }

                         // display pagination
//                         echo "<p><b>View Page:</b> ";

                         for ($i = 1; $i <= $total_pages; $i++)

                         {

//                         echo "<a href='editmovie.php?page=$i'>$i</a> ";

                         }

//                         echo "</p>";
                         
                         // display data in table

                        echo "<table class='table'>";
                        echo "<thead class='thead-dark'>";

                        echo "<tr><th scope='col'>Movie Title</th><th scope='col'>Actors</th><th scope='col'>Director</th><th scope='col'>Gengre</th><th scope='col'>Price</th><th scope='col'>Copies</th></tr>";
                        
                        echo "</thead>";


                        // loop through results of database query, displaying them in the table
                        while($row = mysqli_fetch_assoc($result)) {
                
//                            if ($m >= $start)
                            if ($m >= 0)
                         {
                                    

       //                        for ($i = $start; $i < $end; $i++)
       //
       //                        {

                               // make sure that PHP doesn't try to show results that don't exist

       //                        if ($m == $total_results) { break; }
       //                        if ($m == $start) { break; }

                               // echo out the contents of each row into a table
                               echo "<tbody>";    
                               echo "<tr>";

                               echo '<td>' . $row['title_txt'] . '</td>';

                               echo '<td>' . $row['actors_txt'] . '</td>';

                               echo '<td>' . $row['director_txt'] . '</td>';
                               
                               echo '<td>' . $row['gengre_txt'] . '</td>';
                               echo '<td>' . $row['price_txt'] . '</td>'; 
                               echo '<td>' . $row['copies_txt'] . '</td>';
                               
                               echo '<td><a href="editmovie.php?id=' . $row['id'] . '">Edit</a></td>';

                               echo '<td><a href="deletemovie.php?id=' . $row['id'] . '" onclick="return checkDelete()">Delete</a></td>' ;
            
                               echo "</tr>";
                               
                               $m++;
       //                  
//                               if ($m == $end) { break; }
                            
                             } else {  
                                 $m++;
                            } 
                        }

                        // close table>
                         echo "</tbody>";     
                        echo "</table>";
                       
            
                         
} else {
    
    include("config.php");
    
    if (isset($_GET['del']) && $_GET['del'] <> '')
        
    {
       $reload = $_GET['del'];
       
       if ($reload=="d")
           
       {
           $sql = $_SESSION['vmsql'];
           $result = mysqli_query($db,$sql);
           
                echo "<table class='table'>";
                        echo "<thead class='thead-dark'>";

                        echo "<tr><th scope='col'>Movie Title</th><th scope='col'>Actors</th><th scope='col'>Director</th><th scope='col'>Gengre</th><th scope='col'>Price</th><th scope='col'>Copies</th></tr>";
                        
                        echo "</thead>";
                        
                  while($row = mysqli_fetch_assoc($result)) {
                
//                            if ($m >= $start)
                            if ($m >= 0)
                         {
                                    

       //                        for ($i = $start; $i < $end; $i++)
       //
       //                        {

                               // make sure that PHP doesn't try to show results that don't exist

       //                        if ($m == $total_results) { break; }
       //                        if ($m == $start) { break; }

                               // echo out the contents of each row into a table
                               echo "<tbody>";    
                               echo "<tr>";

                               echo '<td>' . $row['title_txt'] . '</td>';

                               echo '<td>' . $row['actors_txt'] . '</td>';

                               echo '<td>' . $row['director_txt'] . '</td>';
                               
                               echo '<td>' . $row['gengre_txt'] . '</td>';
                               echo '<td>' . $row['price_txt'] . '</td>'; 
                               echo '<td>' . $row['copies_txt'] . '</td>';
                               
                               echo '<td><a href="editmovie.php?id=' . $row['id'] . '">Edit</a></td>';

                               echo '<td><a href="deletemovie.php?id=' . $row['id'] . '" onclick="return checkDelete()">Delete</a>' ;
            
                               echo "</tr>";
                               
                               $m++;
       //                  
//                               if ($m == $end) { break; }
                            
                             } else {  
                                 $m++;
                            } 
                        }
                        
                           echo "</tbody>";     
                        echo "</table>";
       }
        
    }
        
           
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
