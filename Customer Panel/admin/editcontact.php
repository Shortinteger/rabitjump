<?php
include('config.php');
session_start();

if(isset($_POST['updatebtn']))
{

    $id=$_POST['id'];
    $location = $_POST['location'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
    $query="UPDATE contactpage SET location='$location', email='$email', phone='$phone' where id='$id'" ;
     
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: contactus.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: contactus.php'); 
    }
}

?>