<?php
include('config.php');
session_start();

if(isset($_POST['updatebtn']))
{

    $cat_id=$_POST['cat_id'];
    $cat_name = $_POST['cat_name'];
    $description = $_POST['description'];
    
    
    $query="UPDATE tbl_category SET cat_name ='$cat_name',description='$description' where cat_id='$cat_id'" ;
     
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: services.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: viewserices.php'); 
    }
}

?>