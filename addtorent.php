<?php

include("header.php");
include("config.php");

if (isset($_GET['id']) && $_GET['id'] <> '')

{

// query db

$id = $_GET['id'];
$guid = bin2hex(openssl_random_pseudo_bytes(16));
$loguser = $_SESSION['login_user'];
$daterented = date("m-d-Y");
$status ="sel" ;   

$sql= "INSERT INTO `rentalhist_tbl` (`customer_id`, `date_rented`, `id`, `movie_id`, `rent_status_txt`) 
                 VALUES ('$loguser','$daterented','$guid','$id','$status')";

$result = mysqli_query($db,$sql);

 if (!$db)
{
    die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
}


}

header("Location: rentview.php?sel=s");

?>