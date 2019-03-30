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

    
               <div class="container body-content">
                   <div class="jumbotron">
                     <h2>View or Edit Employees  data</h2>
                   </div>
                   
                <div class="bootstrap-iso">
                    <div id="search">     
                          <h3>Search  Employees Details</h3> 
              	    <p>You  may search either by first name, last name or role </p> 
                    <form  method="post" action="viewempl.php?go"  id="searchform"> 
         
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="txtFirstName">First Name</label>
                                <input type="text" class="form-control" id="txtFirstName" name="txtFirstName" placeholder="First Name">
                              </div>
                              <div class="form-group col-md-6">
                                <label for="txtLastName">Last Name</label>
                                <input type="text" class="form-control" id="txtLastName" name="txtLastName" placeholder="Last Name">
                              </div>
                            </div>
                        
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="txtRole">Role</label>
                                <input type="text" class="form-control" id="txtRole" placeholder="Role">
                              </div>
                            </div>
                        

                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        
                           <div class="form-row">
                              <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-primary">Search</button>
                              </div>
                            </div>
                
                     
                          </form>
                    </div>
                    <br />
                    <br />
  <?php
                if($_SERVER["REQUEST_METHOD"] == "POST") {                   
                  
                        include("config.php");
         
                        
                         $m=0;
                         $per_page = 2;
                         $sql = "SELECT * FROM empl_tbl WHERE";
                         $sqladd ="";
                         $ss ="0";
                         
                         $firstName = $_POST['txtFirstName'];
                         $lastName = $_POST['txtLastName'];
                         $role = $_POST['txtRole'];
         
                        
                         if ($firstName <>'')
                         
                         {
                           
                              if ($ss=="0") {
                                   $ss = "1";
                                   $sqladd= " first_name_txt LIKE '%$firstName%' ";
                                   $sql = $sql . $sqladd;
                                } else {
                                   $sqladd= " first_name_txt LIKE '%$firstName%' ";
                                   $sql = $sql . $sqladd;
                                }      
                         }
                         
                         if ($lastName <>'')
                         
                         {
                           
                              if ($ss=="0") {
                                   $ss = "1";
                                   $sqladd= " last_name_txt LIKE '%$lastName%' ";
                                   $sql = $sql . $sqladd;
                                } else {
                                   $sqladd= " AND last_name_txt LIKE '%$lastName%' ";
                                   $sql = $sql . $sqladd;
                                }      
                         }
                         
                         if ($state <>'')
                         
                         {
                           
                              if ($ss=="0") {
                                   $ss = "1";
                                   $sqladd= " role_txt LIKE '%$role%' ";
                                   $sql = $sql . $sqladd;
                                } else {
                                   $sqladd= " AND role_txt LIKE '%$role%' ";
                                   $sql = $sql . $sqladd;
                                }      
                         }
                         
                                        
                         
                         if (endsWith($sql, "WHERE"))
                         {
                             $sql = "SELECT * FROM empl_tbl " ;
                         }
                         
                         if (!$db)
                         {
                             die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
                         }

                           $_SESSION['cussql'] = $sql;
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

//                

                         }

//                         echo "</p>";
                         
                         // display data in table

                        echo "<table class='table'>";
                        echo "<thead class='thead-dark'>";

                        echo "<tr><th scope='col'>Firat Name</th><th scope='col'>Last Name</th><th scope='col'>Email </th><th scope='col'>Address 1</th><th scope='col'>Address 2</th><th scope='col'>City</th><th scope='col'>State</th><th scope='col'>Zip</th><th scope='col'>SSN</th></th><th scope='col'>Phone</th></th><th scope='col'>Empl Status</th></th><th scope='col'>Role</th></tr>";
                        
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

                               echo '<td>' . $row['first_name_txt'] . '</td>';
                               echo '<td>' . $row['last_name_txt'] . '</td>';
                               echo '<td>' . $row['email_txt'] . '</td>';                    
                               echo '<td>' . $row['address1_txt'] . '</td>';
                               echo '<td>' . $row['address2_txt'] . '</td>'; 
                               echo '<td>' . $row['city_txt'] . '</td>';
                               echo '<td>' . $row['state_txt'] . '</td>';
                               echo '<td>' . $row['zip_txt'] . '</td>';
                               echo '<td>' . $row['ssn_txt'] . '</td>';
                               echo '<td>' . $row['phone_txt'] . '</td>';
                               echo '<td>' . $row['empl_status_txt'] . '</td>';
                               echo '<td>' . $row['role_txt'] . '</td>';
                               
                               echo '<td><a href="editempl.php?id=' . $row['id'] . '">Edit</a></td>';

                               echo '<td><a href="deleteempl.php?id=' . $row['id'] . '" onclick="return checkDelete()">Delete</a>' ;
            
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
           $sql = $_SESSION['cussql'];
           $result = mysqli_query($db,$sql);
           
                echo "<table class='table'>";
                        echo "<thead class='thead-dark'>";

                        echo "<tr><th scope='col'>Firat Name</th><th scope='col'>Last Name</th><th scope='col'>Email </th><th scope='col'>Address 1</th><th scope='col'>Address 2</th><th scope='col'>City</th><th scope='col'>State</th><th scope='col'>Zip</th><th scope='col'>SSN</th></th><th scope='col'>Phone</th></th><th scope='col'>Empl Status</th></th><th scope='col'>Role</th></tr>";
                     
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

                               echo '<td>' . $row['first_name_txt'] . '</td>';
                               echo '<td>' . $row['last_name_txt'] . '</td>';
                               echo '<td>' . $row['email_txt'] . '</td>';                    
                               echo '<td>' . $row['address1_txt'] . '</td>';
                               echo '<td>' . $row['address2_txt'] . '</td>'; 
                               echo '<td>' . $row['city_txt'] . '</td>';
                               echo '<td>' . $row['state_txt'] . '</td>';
                               echo '<td>' . $row['zip_txt'] . '</td>';
                               echo '<td>' . $row['ssn_txt'] . '</td>';
                               echo '<td>' . $row['phone_txt'] . '</td>';
                               echo '<td>' . $row['empl_status_txt'] . '</td>';
                               echo '<td>' . $row['role_txt'] . '</td>';
                               
                               echo '<td><a href="editempl.php?id=' . $row['id'] . '">Edit</a></td>';

                               echo '<td><a href="deleteempl.php?id=' . $row['id'] . '" onclick="return checkDelete()">Delete</a>' ;
            
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
                        <input type="button" value="Main Employee Page" class="btn btn-primary" onclick="window.location.href='employees.php'" />    
                </div>
                 <br />
                <footer>
                    <p>Brew City Rental 2019</p>
                </footer>
         </div>
   
</body>
</html>
