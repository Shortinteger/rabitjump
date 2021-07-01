<?php
session_start();
require_once "config.php";
include("functions.php");
$pro_id= get_safe_value($conn,$_GET['pro_id']);


if (isset($_GET['file']) && basename($_GET['file']) == $_GET['file'])
{
    $file = $_GET["file"];

    $filepath = './admin/uploads/' . $file;

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../admin/uploads/' . $file['name']));
        flush(); 
        readfile('./admin/uploads/' . $file['name']);

        $newCount = $file['name'] + 1;
        $updateQuery = "UPDATE tbl_product SET downloads=$newCount WHERE pro_id=$pro_id";
        mysqli_query($conn, $updateQuery);}}
        ?>





