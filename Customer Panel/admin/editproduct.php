<?php
include('config.php');
session_start();
include("functions.php");
$pro_id= get_safe_value($conn,$_GET['pro_id']);

if(isset($_POST['updatebtn']))
{
    
    $allowed =  array('zip','rar');
    $pro_name = $_POST['pro_name'];
    $cat_id = $_POST['cat_id'];
    $pro_type = $_POST['pro_type'];
    $description = $_POST['description'];
    $image1= $_FILES["image1"]['name'];
    $file=  rand(100,100000)."-".$_FILES["file"]['name'];
    $file_loc=$_FILES['file']['tmp_name'];
    $file_type=$_FILES['file']['type'];
    $new_size=$file_size/2024;
    $folder= "uploads/";
    $new_file_name= strtolower($file);
    $final_file=str_replace('','-',$new_file_name);
    $Price = $_POST['Price'];
    $ext = pathinfo($file, PATHINFO_EXTENSION);
   

    $query="Update tbl_product SET pro_name ='$pro_name', pro_type='$pro_type',cat_id='$cat_id',description='$description', Price='$Price', image1='$image1', file='$file' where pro_id ='$pro_id' " ;
     
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
  
        move_uploaded_file($_FILES["image1"]["tmp_name"], "uploads/".$_FILES["image1"]["name"]);
        move_uploaded_file($file_loc,$folder.$final_file);
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: product.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: product.php'); 
    }
}

?>