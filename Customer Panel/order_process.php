<?php
session_start();
require_once "config.php";
include("functions.php");
$pro_id= get_safe_value($conn,$_GET['pro_id']);

$customer_id=$_SESSION['id'];
$transaction_id= rand(111111111,999999999);
$id=rand(111111111,999999999);

$query = "SELECT * FROM tbl_product where pro_id ='$pro_id'";
$query_run = mysqli_query($conn, $query);
if(mysqli_num_rows($query_run) > 0)        
{
    while($row = mysqli_fetch_assoc($query_run))
    {
       $Price=  $row['Price'];
       $pro_name=  $row['pro_name'];
    } 
}


if(isset($_POST['insert-btn']))
{


    $email_address = $_POST['email_address'];
 

    $card_cvc = $_POST['card_cvc'];
    $card_expiry_month = $_POST['card_expiry_month'];
    $card_expiry_year = $_POST['card_expiry_year'];
    $pro_name = $_POST['pro_name'];
    $Price = $_POST['Price'];
    $transaction_id = $_POST['transaction_id'];
    $customer_id= $_POST['customer_id'];
    $card_holder_number = $_POST['card_holder_number'];//************7788

    $card_holder_number =  str_pad(substr($card_holder_number, -4), strlen($card_holder_number), '*', STR_PAD_LEFT);
 


                $query = "INSERT INTO tbl_order_payment (id,email_address,card_holder_number,card_cvc,card_expiry_month,card_expiry_year,Price,pro_name,transaction_id,customer_id)
                 VALUES ('$id','$email_address','$card_holder_number','$card_cvc','$card_expiry_month','$card_expiry_year','$Price','$pro_name','$transaction_id','$customer_id')";
                    $query_run = mysqli_query($conn, $query);
                    if ($query_run)
                    {

                                                 
                     
                        header("location: download.php?pro_id=".$pro_id."&transaction_id=".$transaction_id."&id=".$id."&email=".$email_address);
                        $res=mysqli_query($conn,"Select * from tbl_order_payment where id= '$id'");
                        while($row = mysqli_fetch_assoc($res))
                            {
                        
                                $no= $row['card_holder_number'];
                                $amount= $row['Price'];
                                $name= $row['pro_name'];
                              $created= $row['Created'];
                              $transaction_id= $row['transaction_id'];
                            $to=$row['email_address'];
                            $subject="Order Details From Rabit Jump Team";
                            $body="This is the detail of your recent purchase $name  on $created of amount $amount through credit card number $no and your transaction ID is $transaction_id. You can download your order detail file from your Dashbaord. Thank you
                             ";
                                                       
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
                        
                        
                    }
                        
                    else 
                    {
              
                      header("Location: productdetail.php?pro_id=".$pro_id); 
                    }
       
                } 
               


                
 
     
            
  

?>

<!DOCTYPE html>
<html lang="en">

<head>

<?php 
 if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] != 'true'){
    header ("Location: signin.php");
    exit; // stop further executing, very important
}?>
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
                        <div class="social">
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                        </div>
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
                    <p> Please provide all the details</p>
                    <h2>Payment Form</h2>
                </div>
             
                <form method="post" action="" name="form" id="form"  >
                        <div class="control-group">
                            <input type="email" class="form-control" name="email_address" id="email" placeholder="Your Email e.g. 123@gmail.com" required="required" data-validation-required-message="Please enter your email" />
                            <p class="help-block text-danger"></p>
                        </div>
                   
                            <div class="control-group">
                                <input type="text" class="form-control" id="ccnum"  inputmode="numeric" onkeypress="return isNumberKey(event)" oninput="return a()" name="card_holder_number" maxlength="16" placeholder="Card Number e.g. 4242424242424242" required="required" />
                                <p class="help-block text-danger"></p>
                            </div>
                        
                   
                            <div class="row">
                            <div class="control-group col-4">
                            <select id="exMonth" class="form-control" name="card_expiry_month" title="select a month" oninput="return validateForm()" required>
                            <option value="0">Enter month</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                            </div>
                            <div class="control-group col-4">
                            <select id="exYear" class="form-control" name="card_expiry_year"title="select a year" oninput="return validateForm()" required>
                                <option value="0">Enter year</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                    <option value="2031">2031</option>
                                    <option value="2032">2032</option>
                                    <option value="2033">2033</option>
                                    <option value="2034">2034</option>
                                    <option value="2035">2035</option>
                                    <option value="2036">2036</option>
                                    <option value="2037">2037</option>
                                    <option value="2038">2038</option>
                                    <option value="2039">2039</option>
                                </select>
                            </div>
                        <div class="control-group col-4">
                            <input type="text" class="form-control" name="card_cvc" id="cvc" onkeypress="return isNumberKey(event)"  inputmode="numeric" maxlength="4" placeholder="Security code e.g. 123" required="required" data-validation-required-message="Please enter your card number" />
                            <p class="help-block text-danger"></p>
                        </div>
                        </div>
                        <div>
                    
                        <div class="class-wrap">
               
                        <input type="hidden" name="Price" value="<?php echo $Price; ?>" />
                    
                        <input type="hidden" name="pro_name" value="<?php echo $pro_name; ?>" />
                        <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>" />
                        <input type="hidden" name="transaction_id" value="<?php echo $transaction_id; ?>" />
                     
                          <a> <button  name="insert-btn"  style="background:#000; color:#fff" class="btn" type="submit">Submit</button>
                          </a>
                    
                    </div>
                    </form>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/es6-shim/0.35.3/es6-shim.min.js"></script>    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Contact Javascript File -->
        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>
   
        <!-- Template Javascript -->
        <script src="js/main.js"></script>

        <script> // for credit caard validation
       function a(){
        var b= document.getElementById("ccnum").value;
        if (check(b)){
        document.getElementById("ccnum").style.border = "1px solid black";
        document.getElementById("ccnum").setCustomValidity("");
            return true;
        }
        else {
            document.getElementById("ccnum").style.border = "2px dashed red";
            document.getElementById("ccnum").setCustomValidity("Please enter a valid credit card number.");
            return false;
                }
            }
            function check(ccnum) {

                var sum     = 0,
                    alt     = false,
                    i       = ccnum.length-1,
                    num;
                if (ccnum.length < 13 || ccnum.length > 16){
                    return false;
                }
                while (i >= 0){
                    num = parseInt(ccnum.charAt(i), 10);
                    if (isNaN(num)){
                        return false;
                    }
                    if (alt) {
                        num *= 2;
                        if (num > 9){
                            num = (num % 10) + 1;
                        }
                    } 
                    alt = !alt;
                    sum += num;
                    i--;
                }
                return (sum % 10 == 0);}

            </script> 

    

            <script>
            function isNumberKey(evt)
            {
                var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;

                return true;
            }
            </script>

    <script>
    function  validateForm(){

        var exMonth= document.getElementById("exMonth").value;
        var exYear= document.getElementById("exYear").value;
        if (valid()==true){
        document.getElementById("exMonth").style.border = "1px solid black";
        document.getElementById("exMonth").setCustomValidity("");
        document.getElementById("exYear").style.border = "1px solid black";
        document.getElementById("exYear").setCustomValidity("");
            return true;
        }
        else {
            document.getElementById("exMonth").style.border = "2px dashed red";
            document.getElementById("exMonth").setCustomValidity("Please enter a valid expiry date.");
            document.getElementById("exYear").style.border = "2px dashed red";
            document.getElementById("exYear").setCustomValidity("Please enter a valid expiry year.");
            return false;
                }}
        function valid(){
        var date = new Date ();
        var month = date.getMonth();
        var year = date.getFullYear();
        var exMonth= document.getElementById("exMonth").value;
        var exYear= document.getElementById("exYear").value;
        if ( exYear > year || (exYear == year && exMonth > month)){
           return true;
        }
        else
        {
            alert("The expiry date is before today's date. Please select a valid expiry date");
            return false;
        }
   
    }
</script>

    </body>
</html>

