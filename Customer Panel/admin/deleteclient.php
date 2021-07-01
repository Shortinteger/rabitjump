<?php

include "config.php"; // Using database connection file here
include("functions.php");
$id = get_safe_value($conn,$_GET['id']); // get id through query string

$del = mysqli_query($conn,"delete from tbl_clients where id = '$id'"); // delete query

if($del)
{
    mysqli_close($conn); // Close connection
    echo "Record Deleted Successfully";
    header("location:clients.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>