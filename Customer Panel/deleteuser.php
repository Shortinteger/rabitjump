<?php

include "config.php"; // Using database connection file here

session_start();
$customer_id=$_SESSION['id'];// get id through query string
include("functions.php");


$del = mysqli_query($conn,"delete from tbl_clients where id ='$customer_id'"); // delete query

if($del)
{
    mysqli_close($conn); // Close connection
    echo "Record Deleted Successfully";
    header("location:signup.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>