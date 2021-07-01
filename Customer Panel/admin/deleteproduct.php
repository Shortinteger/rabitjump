<?php

include "config.php"; // Using database connection file here
include("functions.php");

$pro_id = get_safe_value($conn,$_GET['pro_id']); // get id through query string

$del = mysqli_query($conn,"delete from tbl_product where pro_id = '$pro_id'"); // delete query

if($del)
{
    mysqli_close($conn); // Close connection
    echo "Record Deleted Successfully";
    header("location:product.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>