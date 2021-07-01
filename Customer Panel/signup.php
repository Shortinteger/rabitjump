<?php
session_start();
require_once "config.php";
require("PHPMailer-master/src/PHPMailer.php");
require("PHPMailer-master/src/SMTP.php");
$msg="";
if(isset($_POST['insert']))
{
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    
    $customer_password = $_POST['customer_password'];
  
    $confirm_password = $_POST['confirm_password'];




    $email_query = "SELECT * FROM tbl_clients WHERE customer_email='$customer_email' ";
    $email_query_run = mysqli_query($conn, $email_query);
    if(mysqli_num_rows($email_query_run) > 0)
    {
        $msg="Email already present";
        header('Location: signup.php');  
    }
    else
    {
        if($customer_password === $confirm_password)
        {     
           
            $db_id=rand(111111111,999999999);
            mysqli_query($conn,"INSERT INTO tbl_clients(id,customer_email,customer_password,customer_name)  VALUES('$db_id','$customer_email','$customer_password','$customer_name')");
         

            
                $to=$customer_email;
                $subject="Activation Code For Rabit Jump Team";
                $from = 'samanmumtaz18@gmail.com';
                $body="Please confirm your account registration by clicking the button or link below: <a href='http://localhost/Rabit Jump/Customer%20Panel/verify.php?id=$db_id'>http://localhost/Rabit Jump/Customer%20Panel/verify.php?id=$db_id</a>";
                $headers = "From:".$from;
          
                smtp_mailer($to,'Account Verification',$body);
                header("Location: check.php?customer_email=".$customer_email); 
              
                
                
}
         
        else{
            header("signup.php");
            $msg="Error";
        }
    }
}   
 

                        function smtp_mailer($to,$subject, $body){
                       
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
                            $mail->AddAddress($to);
                            if(!$mail->Send()){
                                return 0;
                            }else{
                                return 1;
                            }
                        }
          


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
                    <p>Get In Touch</p>
                    <h2>Sign Up</h2>
                </div>
                <div class="row">
                    <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="contact-form">
                            <div id="success"></div>
                            <form method="post" action="" name="sentMessage">
                                <div class="control-group">
                                    <input type="text" class="form-control" name="customer_name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <input type="email" class="form-control" name="customer_email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <input type="password" class="form-control" name="customer_password"  placeholder="Password" required="required" data-validation-required-message="Please enter a password upto 8 character" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <input type="password" class="form-control" name="confirm_password"  placeholder="Confirm Password" required="required" data-validation-required-message="Please enter confirm password" />
                                    <p class="help-block text-danger"></p>
                                </div>
     
                                <div>
                                    <button name="insert" style="background:#000; color:#fff" class="btn" type="submit">Sign Up</button>
                                </div>
                                <?php echo $msg?>
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
    </body>
</html>

