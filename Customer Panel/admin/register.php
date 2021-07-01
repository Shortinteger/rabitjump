<?php
session_start();
require_once "config.php";



if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $email_query = "SELECT * FROM tbl_users WHERE email='$email' ";
    $email_query_run = mysqli_query($conn, $email_query);
    if(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status1'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');  
    }
    else
    {
        if($password === $confirm_password)
        {
            $sql = "INSERT INTO tbl_users (username, password, email) VALUES (?, ?,?)";
           $stmt = mysqli_prepare($conn, $sql);
        if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_password,$param_email);

        // Set these parameters
        $param_username = $username;
        $param_password = $password;
        $param_email = $email;
        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
             // echo "Saved";
             $_SESSION['status'] = "Successfully registered! Please Login";
             $_SESSION['status_code'] = "success";
             header('Location: login.php');
        }
        else 
        {
            $_SESSION['status2'] = "Not Registered!";
            $_SESSION['status_code'] = "error";
            header('Location: register.php');  
        }
    }
    } 
    else 
    {
        $_SESSION['status3'] = "Password and Confirm Password Does Not Match";
        $_SESSION['status_code'] = "warning";
        header('Location: register.php');  
    }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);


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
                            <h1 class="h2">Get started</h1>
                            <p class="lead">
                                Start creating the best possible user experience for you customers.
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">

<?php
if(isset($_SESSION['success'])&& $_SESSION['success'] !='')
{
    echo '<h2> '.$_SESSION['success'].' </h2>';
    unset($_SESSION['success']);
}

if(isset($_SESSION['status'])&& $_SESSION['status'] !='')
{
    echo '<h2> '.$_SESSION['status'].' </h2>';
    unset($_SESSION['status']);
}

if(isset($_SESSION['status1'])&& $_SESSION['status1'] !='')
{
    echo '<h2> '.$_SESSION['status1'].' </h2>';
    unset($_SESSION['status1']);
}

if(isset($_SESSION['status2'])&& $_SESSION['status2'] !='')
{
    echo '<h2> '.$_SESSION['status2'].' </h2>';
    unset($_SESSION['status2']);
}

if(isset($_SESSION['status3'])&& $_SESSION['status3'] !='')
{
    echo '<h2> '.$_SESSION['status3'].' </h2>';
    unset($_SESSION['status3']);
}

?>
                
                                <div class="m-sm-4">
                                    <form  name =" form1" action="" method="post" >
                                        <div class="mb-3">
                                            <label class="form-label">Username</label>
                                            <input class="form-control form-control-lg" type="text" name="username" placeholder="Enter your username" required/>
                                        </div>
                                     
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" required/>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input class="form-control form-control-lg" type="password" name="password" placeholder="Enter password" required/>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label"> Confirm Password</label>
                                            <input class="form-control form-control-lg" type="password" name="confirm_password" placeholder="Enter confirm password" required/>
                                        </div>

                  
                                           
                                        </div>
                                        <div class="text-center mt-3">
                                            <button type="submit" name="registerbtn" class="btn btn-lg btn-primary">Sign up</button>
                                         
                                            <!-- <button type="submit" class="btn btn-lg btn-primary">Sign up</button> -->
                                            <br>
                                            <br>
                                        <small>
              <p> Already a member?  <a href="login.php"> Sign in  </a>  </p>
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