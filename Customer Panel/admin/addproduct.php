<?php
session_start();
require_once "config.php";



if(isset($_POST['insert']))
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
   
    {
            if(file_exists("uploads/" . $_FILES["image1"]['name'])&& (file_exists("..uploads/" . $_FILES["file"]['name'])))
                    {
                            $store= $_FILES["image1"]["name"];
                            $_SESSION['status']= "image already exists '.$store.'";
                            $alert= $_FILES["file"]["name"] . " already exists. ";
                            header("location: addproduct.php");

                    }
             else
                { 
                $query = "INSERT INTO tbl_product 
                (pro_name,cat_id,description,image1,pro_type,Price,file)
                 VALUES ('$pro_name','$cat_id','$description','$image1','$pro_type','$Price','$file')";
                        $query_run = mysqli_query($conn, $query);
                    if ($query_run)
                      {
        
                            move_uploaded_file($_FILES["image1"]["tmp_name"], "uploads/".$_FILES["image1"]["name"]);
                            move_uploaded_file($file_loc,$folder.$final_file);
                        
                            // echo "Saved";
                            $_SESSION['success'] = "Successfully Inserted";
                            $_SESSION['status_code'] = "success";
                            header('Location: product.php'); 
                       }
                
                    else 
                    {
                    $_SESSION['status2'] = "Not Inserted!";
                    $_SESSION['status_code'] = "error";  
                      header('Location: addproduct.php'); 
                    }
       
                 }
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
    <meta name="author" content="Rabit Jump">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <title>Rabit Jump- Dashboard</title>

    <link href="css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">


<style>
input{
  
  padding: 7px;

}


</style>


</head>

<body>
    <div class="wrapper">
    <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="index.html">
                    <span class="align-middle" style="font-family: 'Sui Generis';">Rabit Jump</span>
                </a>

                <ul class="sidebar-nav">
               
                <li class="sidebar-header">
                    Dashboard
                    </li>
                    <li class="sidebar-item active">
                        <a class="sidebar-link" href="index.php">
                            <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                        </a>
                    </li>
                    
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="message.php">
                        <i class="align-middle " data-feather="inbox"></i> <span class="align-middle">Messages</span>
                        </a>
                    </li>

                   

                    <li class="sidebar-header">
                    Task Management
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="project.php">
                        <i class="align-middle " data-feather="layers"></i> <span class="align-middle">Projects</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                    Employee Management
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="employee.php">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Employees</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                    Order Management
                    </li>

                
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="product.php">
                            <i class="align-middle" data-feather="book"></i> <span class="align-middle">Products</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="orders.php">
                        <i class="align-middle " data-feather="file"></i> <span class="align-middle">Orders</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="clients.php">
                        <i class="align-middle" data-feather="users"></i> <span class="align-middle">Clients</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                    Update Website
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="contactus.php">
                            <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Contact us Page</span>
                        </a>
                    </li>

                </ul>

            
            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                      
                        <li class="nav-item dropdown">
                          
                         
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>

                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                                <span class="text-dark">User</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                
                                <a class="dropdown-item" href="pages-settings.html"><i class="align-middle me-1" data-feather="settings"></i>Settings</a>
                             
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" >Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content">
            <div class="container-fluid p-0">

            <div class="mb-3">
                <h1 class="h3 d-inline align-middle">Add Product Details</h1>
            
            </div>
            <div class="row">
  
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


?>
            <div class="col-md-8 col-xl-10">
                <div class="card">
                <div class="card-header">

                        <h5 class="card-title mb-0">Product Info</h5>
                        
                        </div>
                         <div class="content">
                        <form method="post" action="" enctype="multipart/form-data">
                   
                        <p > <label style="float: left; padding:5px">Product Name</label></p>  
                        <p style="margin-left: 20%;" > <input type="text" placeholder="Product Name..."  name="pro_name" required></p>  
                        <?php         $records =  "SELECT * From tbl_category";
                                      $cat_run=mysqli_query($conn,$records);
                                    if(mysqli_num_rows($cat_run)>0)
                        {
                        ?>
                        <p > <label style="float: left; padding:5px">Product Category</label></p>   
                   
                        <p style="margin-left: 19%;padding:5px; width: 32%"><select class= "form-control" name="cat_id" id="" style="padding:8px">
                                        <option  disabled selected value="">Select Category</option>
                                        <?php
                                  

                                          foreach($cat_run as $row)
                                            {      ?> 
                                              <option value="<?php echo $row['cat_id'];?>" ><?php echo $row['cat_name'];?> </option>
                                              <?php 
                                            }	
                                         ?>
                                         
                                    </select></p>   

                                    <?php } ?>
                           <p > <label style="float: left; padding:5px">Product Type</label></p>                                           
                          <p style="margin-left: 20%;"><input  type="text" placeholder="Product Type" name="pro_type" required></p>  
                          <p > <label style="float: left; padding:5px">Product Price </label></p>                                           
                          <p style="margin-left: 20%;"><input  type="text" placeholder="Price in dollars like 150.0" name="Price" required></p>  
                          <p style="float: left; padding:5px"> <label >Upload Image 1</label></p>  
                          <p style="float: left;margin-left:4%">   <input type="file" placeholder="Upload Image"  name="image1" required></p>   
                          <p style="padding:5px; margin-top:10%"> <label style="float:left" >Upload File</label></p>  
                          <p style="margin-top:-4%; margin-left:19%">   <input type="file" placeholder="Upload file"  name="file" required></p> 
                          <p style="float: left; padding:5px; " > <label >Product Description</label></p>  
                          <p style="float:left;margin-left: 1.5%;">   <textarea  placeholder="Description " name="description" rows="2" cols="23"></textarea></p>
                         
                          <a><button type="submit" name="insert" style="margin-left:85%" class="btn btn-primary"><i class="align-middle" data-feather="plus-square"></i> <span>Submit</button></a>  </span>      
                          </div>
                         
                   
                
                   

                        </div>
                        </div>
                        </form>

                


                  
                    
                     

                         
          </main>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a class="text-muted" target="_blank"><strong>Rabit Jump TEAM</strong></a> &copy;
                            </p>
                        </div>
                   
                    </div>
                </div>
            </footer>
        </div>
    </div>

    

    <script src="js/app.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
            var gradient = ctx.createLinearGradient(0, 0, 0, 225);
            gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
            gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
            // Line chart
            new Chart(document.getElementById("chartjs-dashboard-line"), {
                type: "line",
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: "Sales ($)",
                        fill: true,
                        backgroundColor: gradient,
                        borderColor: window.theme.primary,
                        data: [
                            2115,
                            1562,
                            1584,
                            1892,
                            1587,
                            1923,
                            2566,
                            2448,
                            2805,
                            3438,
                            2917,
                            3327
                        ]
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    tooltips: {
                        intersect: false
                    },
                    hover: {
                        intersect: true
                    },
                    plugins: {
                        filler: {
                            propagate: false
                        }
                    },
                    scales: {
                        xAxes: [{
                            reverse: true,
                            gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                stepSize: 1000
                            },
                            display: true,
                            borderDash: [3, 3],
                            gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                        }]
                    }
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Pie chart
            new Chart(document.getElementById("chartjs-dashboard-pie"), {
                type: "pie",
                data: {
                    labels: ["Chrome", "Firefox", "IE"],
                    datasets: [{
                        data: [4306, 3801, 1689],
                        backgroundColor: [
                            window.theme.primary,
                            window.theme.warning,
                            window.theme.danger
                        ],
                        borderWidth: 5
                    }]
                },
                options: {
                    responsive: !window.MSInputMethodContext,
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    cutoutPercentage: 75
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Bar chart
            new Chart(document.getElementById("chartjs-dashboard-bar"), {
                type: "bar",
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: "This year",
                        backgroundColor: window.theme.primary,
                        borderColor: window.theme.primary,
                        hoverBackgroundColor: window.theme.primary,
                        hoverBorderColor: window.theme.primary,
                        data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
                        barPercentage: .75,
                        categoryPercentage: .5
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                display: false
                            },
                            stacked: false,
                            ticks: {
                                stepSize: 20
                            }
                        }],
                        xAxes: [{
                            stacked: false,
                            gridLines: {
                                color: "transparent"
                            }
                        }]
                    }
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var markers = [{
                coords: [31.230391, 121.473701],
                name: "Shanghai"
            }, {
                coords: [28.704060, 77.102493],
                name: "Delhi"
            }, {
                coords: [6.524379, 3.379206],
                name: "Lagos"
            }, {
                coords: [35.689487, 139.691711],
                name: "Tokyo"
            }, {
                coords: [23.129110, 113.264381],
                name: "Guangzhou"
            }, {
                coords: [40.7127837, -74.0059413],
                name: "New York"
            }, {
                coords: [34.052235, -118.243683],
                name: "Los Angeles"
            }, {
                coords: [41.878113, -87.629799],
                name: "Chicago"
            }, {
                coords: [51.507351, -0.127758],
                name: "London"
            }, {
                coords: [40.416775, -3.703790],
                name: "Madrid "
            }];
            var map = new jsVectorMap({
                map: "world",
                selector: "#world_map",
                zoomButtons: true,
                markers: markers,
                markerStyle: {
                    initial: {
                        r: 9,
                        strokeWidth: 7,
                        stokeOpacity: .4,
                        fill: window.theme.primary
                    },
                    hover: {
                        fill: window.theme.primary,
                        stroke: window.theme.primary
                    }
                },
                zoomOnScroll: false
            });
            window.addEventListener("resize", () => {
                map.updateSize();
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
            var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
            document.getElementById("datetimepicker-dashboard").flatpickr({
                inline: true,
                prevArrow: "<span title=\"Previous month\">&laquo;</span>",
                nextArrow: "<span title=\"Next month\">&raquo;</span>",
                defaultDate: defaultDate
            });
        });
    </script>



</body>

</html>