<?php
include('vendor/autoload.php');
require('config.php');
require('functions.php');

$order_id=get_safe_value($conn,$_GET['id']);


$css=file_get_contents('css/style.css');


$html=' <div class="container-fluid p-0">
<div class="container">
    <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                            <h2>STARCT Team</h2>     
                            <p><strong>Location:</strong> Karachi,Pakistan</p>
                            <p><strong>Phone#:</strong> 090078601</p>
                            <p><strong>Email:</strong> info@starct.com</p>
                           
        <h3>Order Details</h3>

    <div class="table">
   <table>
      <thead class="thead-dark">
         <tr>
            <th scope="col">Order ID</th>
            <th scope="col">Customer ID</th>
            <th scope="col">Product Name</th>
            <th scope="col">Price</th>
            <th scope="col">Purchased</th>
          
         </tr>
      </thead>
      <tbody>
      ';
	
   
          
      $query = "SELECT * FROM tbl_order_payment where id= '$order_id'";
      $res = mysqli_query($conn, $query);
  	if(mysqli_num_rows($res)==0){
        die();
    }
   
	
		while($row=mysqli_fetch_assoc($res)){

         $html.='<tr>
            <td>'.$row['id'].'</td>
         
            <td>'.$row['customer_id'].'</td>
            <td>'.$row['pro_name'].'</td>
            <td>$'.$row['Price'].'</td>
            <td>'.$row['Created'].'</td>
       
         </tr>
       ';
        }
		 
		 
      $html.='</tbody>
   </table>
</div>
</div>
</div>';  
$mpdf=new \Mpdf\Mpdf();
$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML($html,2);
$file=time().'.pdf';
$mpdf->Output($file,'D');
?>
