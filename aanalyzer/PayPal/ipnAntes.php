<?php


require_once "Mail.php";

$verify_url = 'https://www.paypal.com/cgi-bin/webscr?cmd=_notify-validate&' . http_build_query( $_POST );   


$first_name=utf8_encode($_POST['first_name']);
$last_name=utf8_encode($_POST['last_name']);
$address_name=utf8_encode($_POST['address_name']);
$address_country=utf8_encode($_POST['address_country']);
$address_city=utf8_encode($_POST['address_city']);
$address_state=utf8_encode($_POST['address_state']);
$address_street=utf8_encode($_POST['address_street']);
$address_zip=$_POST['address_zip'];
$quantity=$_POST['quantity'];
$txn_id=$_POST['txn_id'];
$shipping=$_POST['shipping'];
$item_name=utf8_encode($_POST['item_name']);
$status=$_POST['status'];       //Status del pago
$custom = pg_escape_string($_POST['custom']);  //ID de tu pedido
$payer_email = $_POST['payer_email'];//este es el email de tu cliente
$payment_status = $_POST['payment_status'];
$payer_status = $_POST['payer_status'];


$file = fopen("/tmp/log-eval.txt", "a");
fwrite($file, "<< PAYPAL $payer_email $item_name $payment_status >> $\n");
fclose($file);

     $firstname = utf8_encode($_POST['first_name']);
     $lastname = utf8_encode($_POST['last_name']);
     $address1 = utf8_encode($_POST['address_name']);
     $address2 = utf8_encode($_POST['address_street']);;
     $city = utf8_encode($_POST['address_city']);
     $state = utf8_encode($_POST['address_state']);
     $zip = $_POST['address_zip'];
     $country = utf8_encode($_POST['address_country']);
     $email = $_POST['payer_email'];
     $copies =  (int) pg_escape_string($_POST['copies']);


 //   $dbh = pg_connect("host=localhost dbname=aanalizer user=analizer password=anapass");
 //   if (!$dbh) {
 //        die("Error in connection: " . pg_last_error());
 //    }

$dbh = mysqli_connect('localhost', 'analizer', 'anapass', 'aanalizer');
if (!$dbh) {
    die('Could not connect: ' . mysqli_error($dbh));
    echo " Ask for support";
}


     $IdPay= date('Hidmy');
     $paypal='WIRE';
     $sql = "INSERT  into paypal (customerid, firstname,lastname,address1,address2, zip, city,state,country,email, quantity, idpaypal) VALUES (NULL,'$firstname' ,'$lastname','$address1','$address2','$zip','$city','$state','$country','$email','$quantity','$payment_status')";
      //echo "<br><br>". $sql;
     $fillform = false;
//         $result = pg_query($dbh, $sql);
$result = mysqli_query($dbh, $sql);

         if (!$result) {
                //pg_free_result($result);
                //pg_close($dbh);
                die("Error in SQL query: " . mysqli_error($dbh));
		echo("<script>alert(\"Complete and review the *required fields -*!\");history.go(-1)</script>");
                $fillform = true;
         }




?>
