<?php
include("header.php");
?>


<?php
   include("config.php");
//    session_start();
      // error_reporting( error_reporting() & ~E_NOTICE )
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
       
               
     // POST data
      $myusername = $_POST['user'];
      $mypassword = trim($_POST["password"]);

       
       // $_SESSION['role']="Test";
                 
      //$sql = "SELECT user_id FROM login_tbl WHERE user_id = '$myusername' and password_txt = '$mypassword'";
      $sql = "SELECT * FROM login_tbl WHERE user_id = '$myusername' and password_txt = '$mypassword'";
      
      //$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
      //$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_DATABASE);
      
    if ($db==connect_error)
    {
        die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
    }

      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
//      while($row = mysqli_fetch_array($result)){
//          
//          $_SESSION['role'] = $row['role_txt'];
//
//        }
        
      $count = mysqli_num_rows($result);    
      // If result matched $myusername and $mypassword, table row must be 1 row		
      if($count == 1) {
       
         $_SESSION['login_user'] = $myusername;
         $_SESSION['loggedIn'] = "yes";
         $_SESSION['role'] = $row['role_txt'];
       header("location: movies.php");
   //      header("location: https://czajkow8.uwmsois.com/movies.php");
      }else {
         $error = "Your Login Name or Password is invalid";
         $_SESSION['loggedIn'] = "no";
         $_SESSION['invlog'] = "yes";
         header("location: login.php");
 //         header("location: https://czajkow8.uwmsois.com/login.php");

      }
   }
?>


        <div class="container body-content">
             <div ID="MainContent">
                 <div class="jumbotron">
                    <h1>Login Page</h1>

                </div>

                        <div class="container">
                            
<?php

        if($_SESSION["invlog"] == "yes") { 
            echo '<label>Not Logined. Invalid user or password</label>';
         }
           
  
  
?>                       

                        
                            <form action = "" method = "post">
                                    <div class="form-group row">
                                    <label for="inputUser" class="col-sm-2 col-form-label">User Name</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputUser" name="user" placeholder="Username">
                              
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
                               
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                    <input type="submit" value="Sign in" name="submit" class="btn btn-primary"/>
                                    </div>
                                    </div>
                            </form>
                        </div>
                 
                  <hr />
                <div> 
                        <input type="button" value="Create Account" class="btn btn-primary" onclick="window.location.href='createacct.php'" />    
                </div>
                 <br />
            </div>
            <hr />
            <footer>
                <p>Brew City Rental 2019</p>
            </footer>
        </div>
   
</body>
</html>
