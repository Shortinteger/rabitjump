<?php

//payment.php

include('config.php');

session_start();


{
 require_once 'stripe_vendor/autoload.php ';

 \Stripe\Stripe::setApiKey('sk_test_51J336UFX6YGqP6VYAeehxC0pG3gbuEOzxSAp6KW0xAnsM6hELiJaYg0t6nhk6tEktiehy7dfvL8VtXoWOKPDsj4w00ZSx6RIS2');

 $customer = \Stripe\Customer::create(array(
  'email'   => $_POST["email_address"],
  'source'  => $_POST["token"],
  'name'   => $_POST["customer_name"],

 ));

 $order_number = rand(100000,999999);

 $charge = \Stripe\Charge::create(array(
  'customer'  => $customer->id,
  'amount'  => $_POST["total_amount"] * 100,
  'currency'  => $_POST["currency_code"],
  'description' => $_POST["item_details"],
  'metadata'  => array(
   'order_id'  => $order_number
  )
 ));

 $response = $charge->jsonSerialize();

 if($response["amount_refunded"] == 0 && empty($response["failure_code"]) && $response['paid'] == 1 && $response["captured"] == 1 && $response['status'] == 'succeeded')
 {
  $amount = $response["amount"]/100;

  $order_data = array(
   ':order_number'   => $order_number,
   ':order_total_amount' => $amount,
   ':transaction_id'  => $response["balance_transaction"],
   ':card_cvc'    => $_POST["card_cvc"],
   ':card_expiry_month' => $_POST["card_expiry_month"],
   ':card_expiry_year'  => $_POST["card_expiry_year"],
   ':card_holder_number' => $_POST["card_holder_number"],
   ':email_address'  => $_POST['email_address'],
   ':customer_name'  => $_POST["customer_name"],
  );

  $query = "
  INSERT INTO tbl_order_payment 
     (order_number, order_total_amount, transaction_id, card_cvc, card_expiry_month, card_expiry_year, card_holder_number, email_address, customer_name) 
     VALUES (:order_number, :order_total_amount, :transaction_id, :card_cvc, :card_expiry_month, :card_expiry_year, :card_holder_number, :email_address, :customer_name)
  ";

  $statement = $connect->prepare($query);

  $statement->execute($order_data);

  $order_id = $connect->lastInsertId();

  }


  $_SESSION["success_message"] = "Payment is completed successfully. The TXN ID is " . $response["balance_transaction"] . "";
  header('location:download.php');
 }



?>
<script src="https://js.stripe.com/v3/"></script>