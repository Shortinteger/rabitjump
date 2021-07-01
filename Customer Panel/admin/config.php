<?php
/*
This file contains database configuration assuming you are running mysql using user "root" and password ""
*/

define('DB_SERVER', 'rabitjump.com');
define('DB_USERNAME', 'rabitjump_rabitjump');
define('DB_PASSWORD', '&2$lptqeSqVx');
define('DB_NAME', 'rabitjump_rabitjump');




// Try connecting to the Database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Check the connection
if($conn == false){
    dir('Error: Cannot connect');
}

?>