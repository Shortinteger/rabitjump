
<?php
include('config.php');
session_start();
include("functions.php");
$id= get_safe_value($conn,$_GET['id']);


if(isset($_POST['updatebtn']))
{

    $name = $_POST['name'];
    $Job_name = $_POST['Job_name'];
    $Job_description = $_POST['Job_description'];
    $hiring_date = $_POST['hiring_date'];
    $employement_years= $_POST['employement_years'];
    $total_hours = $_POST['total_hours'];
    $leaves_allowed = $_POST['leaves_allowed'];
    $account_no = $_POST['account_no'];
    $salary= $_POST['salary'];
    $bonus = $_POST['bonus'];
    $growth = $_POST['growth'];
    $remarks = $_POST['remarks'];
    $skills=$_POST['skills'];

    $phonenumber1 = $_POST['phonenumber1'];
    $phonenumber2 = $_POST['phonenumber2'];
    $employee_email = $_POST['employee_email'];
    $employee_cnic = $_POST['employee_cnic'];
    $employee_father = $_POST['employee_father'];

    $age = $_POST['age'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $gender= $_POST['gender'];
    $marital_status = $_POST['marital_status'];
    $previous_org = $_POST['previous_org'];
    $prev_job = $_POST['prev_job'];
    $prev_start_date = $_POST['prev_start_date'];
    $prev_end_date = $_POST['prev_end_date'];
    $degree_name = $_POST['degree_name'];
    $passing_year = $_POST['passing_year'];
    $institute_name = $_POST['institute_name'];
 


    $query="UPDATE tbl_employeedata SET  name ='$name',Job_name='$Job_name',Job_description='$Job_description',hiring_date='$hiring_date',employement_years='$employement_years',total_hours='$total_hours',leaves_allowed='$leaves_allowed',account_no='$account_no',employee_cnic='$employee_cnic',salary='$salary',bonus='$bonus',growth='$growth',remarks='$remarks', skills='$skills',phonenumber1='$phonenumber1',phonenumber2='$phonenumber2',employee_email='$employee_email',employee_father='$employee_father',age='$age',address='$address',city='$city',country='$country',gender='$gender',marital_status='$marital_status',previous_org='$previous_org',prev_job='$prev_job',prev_start_date='$prev_start_date',prev_end_date='$prev_end_date',degree_name='$degree_name',passing_year='$passing_year',institute_name='$institute_name' where id='$id'";
     
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {  
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: employee.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: employee.php'); 
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
    padding:7px
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
                <h1 class="h3 d-inline align-middle">Add Employee Details</h1>
            
            </div>
            <div class="row">
  

            <div class="col-md-8 col-xl-10">
                <div class="card">
                <div class="card-header">

                        <h5 class="card-title mb-0">Current Info</h5>
                        
                        </div>
                    <div class="content">
                    <?php
              $id= get_safe_value($conn,$_GET['id']);
                $query = "SELECT * FROM tbl_employeedata where id ='$id'";
                $res = mysqli_query($conn, $query);
                foreach($res as $row){
                ?>  
                        <form method="post" action="">
                        <div >
                    
                              
                     
                        <p> <input type="text" placeholder="Employee Name..."  name="name" value="<?php echo $row['name']?>"  required></p>   
                        <p>  <input type="text" placeholder="Job Name..."  name="Job_name"  value="<?php echo $row['Job_name']?>" required></p>      
                          <p><input  type="text" placeholder="Job Description..." name="Job_description" value="<?php echo $row['Job_description']?>" required></p>  
                          <p >  <input type="date" placeholder="Hiring Date..." name="hiring_date" value="<?php echo date('Y-m-d',strtotime($row['hiring_date']))?>"required></p>      
                          <p ><input type="number" placeholder="Employement Years..."  name="employement_years"  value="<?php echo $row['employement_years']?>"  required></p>    
                          <p style="float: left; width:40%">   <input type="number" placeholder="Total Hours..."  name="total_hours"  value="<?php echo $row['total_hours']?>" required></p>   
                          <p style="float: right;width:40%">     <input type="number" placeholder="Leaves Allowed..." name="leaves_allowed" value="<?php echo $row['leaves_allowed']?>" required></p>
                          <p style="float: left; width:40%"> <input placeholder="Account No..."  name="account_no" value="<?php echo $row['account_no']?>" required></p>
                          <p style="float: right; width:40%">   <input  type="number" placeholder="Salary..."name="salary"  value="<?php echo $row['salary']?>" required></p>  
                          <p  style="float:left;width:40%"><input  type="number"  placeholder="Bonus..."name="bonus"   value="<?php echo $row['bonus']?>"required></p>  
                          <p style="float: right;width:40%" >  <input placeholder="Growth..." name="growth" value="<?php echo $row['growth']?>" required></p>  
                          <p style=" float:left">   <textarea  placeholder="Remarks " name="remarks" rows="2" cols="23" value="<?php echo $row['remarks']?>"></textarea></p>
                       
                          </div>
                          </div>
                          <hr>
                          <div class="card-header">

                    <h5 class="card-title mb-0">Skills</h5>

                    </div>
                    <div class="content">

                    <div >

                            <p >    <input type="text" placeholder="Employee's Skills" name="skills" value="<?php echo $row['skills']?>"required  />	</p>   
              
                            

                    </div>
                    </div>
                    <hr>
                          <div class="card-header">

                        <h5 class="card-title mb-0">Personal Info</h5>
        
                        </div>
                        <div class="content">
                  
                        <div >
                       
                                <p > <input type="text" placeholder="Employee Father's Name..." name="employee_father" value="<?php echo $row['employee_father']?>" required></p>   
                                <p >  <input type="text" placeholder="Employee's age" name="age" value=" <?php echo $row['age']?>" required></p> 
                                <p >  <input type="text" placeholder="Employee CNIC No." name="employee_cnic" value=" <?php echo $row['employee_cnic']?>" required></p>      
                                <p><input  type="text" placeholder="Employee's Address " name="address"  value="<?php echo $row['address']?>" required></p>  
                                <p >  <input type="text" placeholder="Employee's city" name="city"  value="<?php echo $row['city']?>"  required></p>  
                                <p >  <input type="text" placeholder="Employee's country"  name="country" value="<?php echo $row['country']?>" required></p>  
                                <p > <select placeholder="Gender" name="gender"  value="<?php echo $row['gender']?>"  required>
                                                                <option value="male">Male</option>
                                                                <option value="female">Female</option>
                                                                    </select></p>   
                                <p > <select placeholder="Marital Status" name="marital_status" value="<?php echo $row['marital_status']?>" required>
                                                                <option value="single">Single</option>
                                                                <option value="married">Married</option>
                                                                    </select></p>                                     
                                

                        </div>
                        </div>
                        <hr>

                        <div class="card-header">

                        <h5 class="card-title mb-0">Contact Info</h5>
                        </div>
                        <div class="content">
                 
                        <div style="width: 50%;">

                   
                        <p >  <input type="tel" placeholder="Employee Phone Number 1" name="phonenumber1" value="<?php echo $row['phonenumber1']?>" required></p>      
                        <p><input  type="tel" placeholder="Phone number 2" name="phonenumber2" value="<?php echo $row['phonenumber2']?>"></p>  
                        <p >  <input type="email" placeholder="Employee email" name="employee_email"   value="<?php echo $row['employee_email']?>" required></p>                                   
                                    

                        </div>
                        </div>
             
                        <hr>
                
                        <div class="card-header">

                        <h5 class="card-title mb-0">Qualification</h5>
                        
                        </div>
                        <div class="content">
                  
                        <div style="width: 50%;">

                                <p><input type="text" placeholder="Degree Name"  name="degree_name" value="<?php echo $row['degree_name']?>" required></p>
                                <p><input type="year" placeholder="Graduation Year" name="passing_year" value="<?php echo $row['passing_year']?>" required></p>
                                <p><input type="text" placeholder="Institute Name"  name="institute_name" value="<?php echo $row['institute_name']?>" required></p>
                                    
                                    

                        </div>
                        </div>
            
                        <hr>
                         <div class="card-header">

                        <h5 class="card-title mb-0">Previous Experience</h5>
                        
                        </div>
                        <div class="content">
                 
                        <div style="width: 50%;">

                            <p><input type="text" placeholder="Previous Organization Name"  value="<?php echo $row['previous_org']?>" name="previous_org"></p>
                            <p><input type="text" placeholder="Previous Job Name" name="prev_job" value="<?php echo $row['prev_job']?>"></p>
                            <p><input type="date" placeholder="Previous Job Start Date"  value="<?php echo date('Y-m-d',strtotime($row['prev_start_date']))?>"  name="prev_start_date"></p>
                            <p><input type="date" placeholder="Previous Job End Date" name="prev_end_date" value="<?php echo date('Y-m-d',strtotime($row['prev_end_date']))?>"></p>
                        </div>                             
                        <a><button   type="submit" name="updatebtn"  style="margin-left:85%" class="btn btn-primary"><i class="align-middle" data-feather="plus-square"></i> <span>Update</button></a>  </span>      

                        </div>
                        </div>
                        </form>

                        <?php   } ?>


                  
                    
                     

                         
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