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

// connect to the database

include("config.php");



// check if the 'id' variable is set in URL, and check that it is valid

if (isset($_GET['id']) && $_GET['id'] <> '')

{

// get id value

$id = $_GET['id'];

// delete the entry
   if (!$db)
{
    die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
}

$sql = "DELETE FROM movies_tbl WHERE id='$id'";

if(mysqli_query($db, $sql)){
      //echo "Records inserted successfully.";
      $insertStatus = "Records deleted successfully.";
  } else{
   echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
  }

// redirect back to the view page

header("Location: viewmovies.php?del=d");
//header("location: https://czajkow8.uwmsois.com/viewmovies.php?del=d");
}

else

// if id isn't set, or isn't valid, redirect back to view page

{

header("Location: viewmovies.php?del=d");
//header("location: https://czajkow8.uwmsois.com/viewmovies.php?del=d");
}

?>