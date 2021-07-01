<?php
session_start();
require_once "config.php";

if(isset($_SESSION['username']))
{
    header("location: index.php");
    exit;
}

if(isset($_POST['login-btn']))
{
    $username = $_POST['username'];
  
    $password = $_POST['password'];


    $username_query = "SELECT * FROM tbl_users WHERE username='$username' and password='$password'";
    $username_query_run = mysqli_query($conn, $username_query);
    if(mysqli_fetch_array($username_query_run) )
    {
        $_SESSION['username'] = $username;
 
        header('Location: index.php');  
    }
    else
    {
       
      
            $_SESSION['status'] = "Username or password is not valid!";
        
            header('Location: login.php');  
        
    }
} 
    

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="STARCT">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <title>Register | STARCT</title>

    <link href="css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2">Welcome,</h1>
                            <p class="lead">
                                Please Sign in to get started
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">

                        <?php
                        if(isset($_SESSION['status']) && $_SESSION['status'] !='') 
                        {
                            echo '<h2> '.$_SESSION['status'].' </h2>';
                            unset($_SESSION['status']);
                        }

                        ?>
                
                                <div class="m-sm-4">
                                    <form  action="" method="post" >
                                        <div class="mb-3">
                                            <label class="form-label">Username</label>
                                            <input class="form-control form-control-lg" type="text" name="username" placeholder="Enter your username" required/>
                                        </div>
                                     
                                     
                                        
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input class="form-control form-control-lg" type="password" name="password" placeholder="Enter password" required/>
                                        </div>

                                    
                  
                                           
                                        </div>
                                        <div class="text-center mt-3">
                                            <button type="submit" name="login-btn" class="btn btn-lg btn-primary">Sign in</button>
                                         
                                            <!-- <button type="submit" class="btn btn-lg btn-primary">Sign up</button> -->
                                            <br>
                                            <br>
                                        <small>
              <p> Don't have an account?  <a href="register.php"> Sign up  </a>  </p>
          </small>
                                        </div>
                                 
                                  
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="js/app.js"></script>

 

</body>

</html>