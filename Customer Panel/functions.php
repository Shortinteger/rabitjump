<?php 
function get_safe_value($conn,$str){
	if($str!=''){
		$str=trim($str);
		return mysqli_real_escape_string($conn,$str);
	}
}

require_once "config.php";
require("PHPMailer-master/src/PHPMailer.php");
require("PHPMailer-master/src/SMTP.php");    
require('fpdf/fpdf.php');



              
?>