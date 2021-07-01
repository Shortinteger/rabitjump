<?php
require('fpdf/fpdf.php');
session_start();
require_once "config.php";
require("PHPMailer-master/src/PHPMailer.php");
require("PHPMailer-master/src/SMTP.php");
include("functions.php");
$pro_id= get_safe_value($conn,$_GET['pro_id']);
$transaction_id= get_safe_value($conn,$_GET['transaction_id']);
$id= get_safe_value($conn,$_GET['id']);
$email=get_safe_value($conn,$_GET['email']);


$query = "SELECT * FROM tbl_product where pro_id ='$pro_id'";
$query_run = mysqli_query($conn, $query);
if(mysqli_num_rows($query_run) > 0)        
{
    while($row = mysqli_fetch_assoc($query_run))
    {

            $invoice=$id;     
            $file_name = md5(rand()) . '.pdf';
            $amount = $row['Price'];
            $proname = $row['pro_name'];}}
            $to=$email;
            $subject="Invoice";
            $from = 'samanmumtaz18@gmail.com';
            $body="Thank you for choosing Rabit Jump. This is an invoice of your recent purchase for .$proname and your 
            Transaction ID is  $transaction_id Please see the invoice attached below.  "; 
            $file = $pdf->output();
            file_put_contents($file_name, $file);
            $headers = "From:".$from;


          

//generating pdf 






  $pdf = new FPDF();
//  $pdf->AddPage();
//  $pdf =& new FPDI();
      $pdf->addPage('P');
       $pdf->SetLineWidth(0);
 $pdf->SetDrawColor(0,80,180);
    $pdf->SetFillColor(200,220,255);
  //  $pdf->SetTextColor(220,50,50);
      $pdf->SetFont("Arial","B",19);
     $pdf->Cell(10,10, $pdf->Image($img, $pdf->GetX(5), $pdf->GetY(10), 160.8), 0, 0, 'R', false );
      $pdf->Cell(5,10,"",0,1);
     // $pdf->Cell(260,10,"INVOICE",0,1,"C"); 
 // $pdf->Cell(190,10,"INVOICE",0,1,"C"); 
     $pdf->Cell(40,2,"",0,1);
      //$pdf->Cell(260,10,"  Dear Life BD Tours & Travel Ltd. ",0,0,"C"); 
 
       $pdf->Cell(20,10,"",0,1);
   $pdf->SetFont("Arial","B",10);
   
   $pdf->Cell(10,10,".",0,0,"L");
   
    for ($i=0; $i <0; $i++){
   
   $pdf->Cell(-30,10, $_GET["t_no"][$i],0,1,"L");
    // $pdf->Cell(-40,10, $_GET["coustomer_name"][$i],1,0,"C");
    break;
    $pdf->Cell(40,10,"Address :",0,0,"L");
    $pdf->Cell(10,10," ".$_GET["c_adress"],0,0,"L");
    break;
    }
  $pdf->Cell(240,10,"             ",0,0,"C");
    $pdf->Cell(-140,10,"  ",0,1,"C");
    $query="SELECT * FROM `tbl_order_payment` WHERE id='$id'";


 $res=mysqli_query($conn, $query);
 // $data= mysqli_fetch_field($res);
  //$data=mysqli_fetch_array($res);
while($row = $res->fetch_assoc()){
  //print_r($row);

$invoice_noo =$row ["id"];
$Company="Rabit Jump";
     
 }
   
   $pdf->Cell(55,10,"Invoice No :              ",0,0,"L");
   $pdf->Cell(10,10," $invoice_noo " ,0,1,"C");
    
   $pdf->Cell(55,10,"Issue date : ",0,0,"L");
   $pdf->Cell(40,10," ".$row["Created"],0,1,"L");
 
   $pdf->Cell(55,10,"Company Name :",0,0,"L");
   $pdf->Cell(40,10,"".$Company,0,1,"L");
 
   $pdf->Cell(55,10,"Legal License Number :",0,0,"L");
   $pdf->Cell(40,10,"".$_GET["licence"],0,1,"L");
   
   $pdf->Cell(55,10,"Customer ID :",0,0,"L");
   $pdf->Cell(40,10,"".$row["customer_id"],0,1,"L");
 
   $pdf->Cell(55,10,"Email :",0,0,"L");
   $pdf->Cell(40,10,"".$row["email_address"],0,1,"L");
   
    
    
    $pdf->SetFont("Arial","B",12);
     
   
  
   
    $pdf->Cell(35,7,"",0,1);
 // $pdf->Cell(190,10, "href="./images/ddd.PNG"",0,1,"C");
 




    $pdf->SetFont("Arial","B",10);
   
  
   // $pdf->Cell(40,10,"Customer Email",0,0);
    // $pdf->Cell(40,10," : ".$_GET["coun_name"],0,1);
   // $pdf->Cell(40,10,": ".$_GET["invoice_no"],0,1);
   
 //  $pdf->Cell(40,10," : ".$_GET["country"],0,1);
  // $pdf->Cell(40,10,"vendor",0,0);
//  $pdf->Cell(40,10," : ".$_GET["fly_date"],0,0);
 //$pdf->SetX((210-$w)/2);
 
    //$pdf->SetFillColor(200,220,255);
    
    $pdf->Cell(12,10,"SL",1,0,"C"); 
    
   
   
   $pdf->Cell(35,10,"Product",1,0,"C");
 
  

   // $pdf->Cell(35,10,"Air Lines",1,0,"C");
 // $pdf->Cell(33,10,"Ticket No",1,0,"C");
   //  $pdf->Cell(28,10,"Travel Date",1,0,"C");
      //$pdf->Cell(15,10,"Unit",1,0,"C");
   $pdf->Cell(40,10,"Total Amount USD",1,1,"C");
//  $pdf->Cell(35,10, "Sadex",1,1,"C");
  $pdf->Cell(20,10, $row["Price"],1,1,"C");
//for ($i=0; $i < count($_GET["invoice_no"]); $i++){}

  
     $pdf->Cell(12,10, ($i+1),1,0,"C");
     $pdf->SetFont("Arial","B",8);
     $pdf->Cell(35,10, "".$row["pro_name"],1,0,"C");
    // $pdf->Cell(55,10, RPT,1,0,"C");
    // $pdf->Cell(45,10, One,1,0,"C");
    // $pdf->Ln( );
     //$pdf->Cell(35,10, $_GET["air"][$i],1,0,"C");
 //  $pdf->Cell(33,10, $_GET["t_no"][$i],1,0,"C");
    // $pdf->Cell(28,10, $_GET["fly_d"][$i],1,0,"C");
    // $pdf->Cell(15,10, $_GET["qty"][$i],1,0,"C");
     //$pdf->Cell(40,10, ($_GET["qty"][$i] * .$_GET["net_total"][$i]),1,1,"C");
     
  // }
//$fpdf->LN;

 $pdf->Cell(147,8,"Product Name",1,0,"R");
//   $pdf->Cell(40,8,"Sadex",1,1,"C");
   
    $pdf->Cell(50,10,"",0,1);
 $pdf->SetFont("Arial","B",8);
   // $pdf->Cell(150,10,"Sub Total    ",0,0,"R");
   // $pdf->Cell(140,10,":        ".$_GET["sub_total"],0,1);
    //  $pdf->Cell(150,10,"Gst Tax    ",0,0,"R");
 //  $pdf->Cell(50,10,":        ".$_GET["gst"],0,1);
 // $pdf->Cell(150,10,"Discount    ",0,0,"R");
   // $pdf->Cell(50,10,":        ".$_GET["discount"],0,1);
  // $pdf->Cell(240,10,"Total Amount    ",0,0,"R");
   // $pdf->Cell(50,10,":        ".$_GET["net_total"],0,1);
   
  
      $pdf->Cell(70,10,"",0,1);
      
       
       $pdf->Cell(100,8,"                 ",0,1,"L");

       $pdf->Cell(200,8,"",0,1,"L");
       $pdf->Cell(200,8,"",0,1,"L");
       
       
        $pdf->Cell(50,10,"",0,1);
      $pdf->Cell(250,8," ",0,1,"C");
       $pdf->SetFont("Arial","B",7);
     $pdf->Cell(250,8," ",0,1,"C");
      $pdf->Cell(250,8,"",0,1,"C");

    //   $img2 = "../fpdf/imgpsh_fulsize.png";
  //$pdf->Output();                  
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(); 
    $mail->SMTPDebug = 1; 
    $mail->SMTPAuth = true; 
    $mail->SMTPSecure = 'TLS'; 
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587; 
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Username = "samanmumtaz18@gmail.com";
    $mail->Password = "samesi@comsats21";
    $mail->SetFrom("samanmumtaz18@gmail.com");
    $mail->Subject = $subject;
    $mail->Body =$body;
    $mail->AddAttachment($file_name);  
    $mail->AddAddress($to);
    if(!$mail->Send()){
        return 0;
    }else{
        return 1;
    }
    unlink($file_name);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Rabit Jump</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Software Developement" name="keywords">
    <meta content="Software developement Company" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="css/fonts/flaticon.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

   <style> 
   .navbar.nav-sticky {
        padding: 10px 60px;
        background: #000 !important;
    }

    @media (max-width: 991.98px) {
    .navbar {
        padding: 15px;
        background: #000 !important;
    }
    .navbar .navbar-brand span {
        color: #ffffff;
    }
    .navbar a.nav-link {
        padding: 5px;
    }
    .navbar .dropdown-menu {
        box-shadow: none;
    }

}
.footer .container-fluid {
    padding: 90px 0 0 0;
    background: linear-gradient(rgba(52, 49, 72, .9), rgba(52, 49, 72, .9)), url(../img/photo-1553877522-43269d4ea984.jpg);
    background-position: center;
    background-repeat: no-repeat;
    background-size: contain;
}
.page-header {
    position: relative;
    margin-bottom: 45px;
    padding: 150px 0 90px 0;
    text-align: center;
    background: #000;
}
.page-header h2 {
    position: relative;
    color: #fff;
    font-size: 60px;
    font-weight: 700;
}

.page-header a {
    position: relative;
    padding: 0 12px;
    font-size: 22px;
    color: #fff;
}
.section-header p::after {
    position: absolute;
    content: "";
    height: 2px;
    top: 11px;
    right: -30px;
    left: -30px;
    background: #000;
    z-index: -1;
}
</style> 
</head>

<body>
    <!-- Top Bar Start -->
    <div style="background-color:#000" class="top-bar d-none d-md-block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="top-bar-left">
                       
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="top-bar-right">
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Bar End -->
        <!-- Contact Start -->
        <div class="contact">
            <div class="container">
                <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                    <p>Thank you for choosing us</p>
                    <h2>Your Download is Ready</h2>
                </div>
                <div class="row">
                    <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="contact-form">
                            <div id="success"></div>
                          
                  
                    
                            <form method="POST"  enctype="multipart/form-data">
                        
                            <p style="margin-left:30%">An invoice email has been sent to you <?php $email ?> </p>
                          
 
                            <br>
                     
                                <div>
   
                                <a>   <button name="download" type="submit" style="background:#000; color:#fff; margin-left:40%" class="btn" type="submit">Download</button>
                                </a>
                                </div>
                     
                           </form>
            
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

    

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/isotope/isotope.pkgd.min.js"></script>
        <script src="lib/lightbox/js/lightbox.min.js"></script>
        
        <!-- Contact Javascript File -->
        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>

        <script> $(document).on('submit', 'form', function() {
  setTimeout(function() {
    window.location = "dashboard.php";
  }, 1000);
});</script>


<script>
    (function (global) {

if(typeof (global) === "undefined") {
    throw new Error("window is undefined");
}

var _hash = "!";
var noBackPlease = function () {
    global.location.href += "#";

    // Making sure we have the fruit available for juice (^__^)
    global.setTimeout(function () {
        global.location.href += "!";
    }, 50);
};

global.onhashchange = function () {
    if (global.location.hash !== _hash) {
        global.location.hash = _hash;
    }
};

global.onload = function () {
    noBackPlease();

    // Disables backspace on page except on input fields and textarea..
    document.body.onkeydown = function (e) {
        var elm = e.target.nodeName.toLowerCase();
        if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
            e.preventDefault();
        }
        // Stopping the event bubbling up the DOM tree...
        e.stopPropagation();
    };
}
})(window);
    </script>
    </body>
</html>

