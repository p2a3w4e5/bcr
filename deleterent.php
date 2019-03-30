<?php


include("header.php");

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

$sql = "DELETE FROM rentalhist_tbl WHERE id='$id'";

if(mysqli_query($db, $sql)){
      
      $insertStatus = "Rental deleted successfully.";
  } else{
   echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
  }

// redirect back to the view page

header("Location: checkout.php");
;
}

else

// if id isn't set, or isn't valid, redirect back to view page

{

header("Location: checkout.php");

}

?>