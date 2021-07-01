<?php
session_start();
require_once "config.php";
include("functions.php");
$project_id= get_safe_value($conn,$_GET['project_id']);
$message='';

if(isset($_POST['updatebtn']))
{

    $project_name = $_POST['project_name'];
    $project_manager_id = $_POST['project_manager_id'];
    $project_remarks = $_POST['project_remarks'];
    $hourly_rate = $_POST['hourly_rate'];
    $Budget = $_POST['Budget'];
    $total_hours = $_POST['total_hours'];
    $project_sdate = $_POST['project_sdate'];
    $project_edate = $_POST['project_edate'];
    $status = $_POST['status'];

    {
      
        
        $query = "UPDATE tbl_project SET 
        project_name= '$project_name',project_manager_id='$project_manager_id',project_remarks='$project_remarks',hourly_rate='$hourly_rate',Budget='$Budget',total_hours='$total_hours',project_sdate='$project_sdate',project_edate='$project_edate',status='$status' where project_id ='$project_id'";
                $query_run = mysqli_query($conn, $query);
             if ($query_run)
              {
             // echo "Saved";
             $_SESSION['status'] = "Successfully Inserted";
             $_SESSION['status_code'] = "success";
             header('Location: project.php');  
            }
        
             else 
            {
            $_SESSION['status2'] = "Not Inserted!";
            $_SESSION['status_code'] = "error";
          
            }
    }
}
    
  
    
  




?>