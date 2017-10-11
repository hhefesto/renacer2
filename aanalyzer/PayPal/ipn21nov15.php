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
$status=$_POST['status'];	//Status del pago
$custom = pg_escape_string($_POST['custom']);  //ID de tu pedido
$payer_email = $_POST['payer_email'];//este es el email de tu cliente
$payment_status = $_POST['payment_status'];
$payer_status = $_POST['payer_status'];


$option_selection1 = $_POST['option_selection1'];

$file = fopen("/tmp/log-eval.txt", "a");
fwrite($file, "<< PAYPAL $option_selection1>> $\n");
fclose($file);


function generaUsr ($NombreApellido)
{
    if(!empty ($NombreApellido))
    {
        $Apellido = explode (" ",$NombreApellido);
        $Apellido = strtolower($Apellido[count($Apellido) -1]);
        $Inicial = substr($NombreApellido,0,1);
        $Nick = strtolower($Inicial.$Apellido);
        
        return $Nick;
    }
    else
    {
        echo "Debe escribir un nombre y apellido";
    }
} 

function generaPass($longi){
	//Se define una cadena de caractares. 
	$cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
	//Obtenemos la longitud de la cadena de caracteres
	$longitudCadena=strlen($cadena);

	//Se define la variable que va a contener la contraseña
	$pass = "";
	$longitudPass=$longi;

	//Creamos la contraseña
	for($i=1 ; $i<=$longitudPass ; $i++){
		//Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
		$pos=rand(0,$longitudCadena-1);

		$pass .= substr($cadena,$pos,1);
	}
	return $pass;
}

function limpiaESP($cadena){
    $cadena = str_replace(' ', '', $cadena);
    return $cadena;
}

function enviaError($sql, $errores )
{

		  $from = "TechSupport Service <techsupport@rdataa.com>";
		  $to = "notification@rdataa.com";
$to ="omarcv@gmail.com";
		  $subject = "Error en Compra con PayPal";
		  
		  $message= "Se ha detectado un error. \n";
		  $message.="------------------------------------------------\n\n";
		  $message.="SQL :".$sql."\n";
		  $message.=$errores."\n";
		  
		  $host = "smtp.gmail.com";
		  $username = "techsupport@rdataa.com";
		  $password = "rddulce01";
		  $headers = array ('From' => $from,
			'To' => $to,
			'Subject' => $subject);
		  $smtp = Mail::factory('smtp',
			array ('host' => $host,
			  'auth' => true,
			  'username' => $username,
			  'password' => $password));
	
			  $mail = $smtp->send($to, $headers, $message);
		 if (PEAR::isError($mail)) {
	        echo("<p>" . $mail->getMessage() . "</p>");
	        } else {
	        echo("<p>Message successfully sent!</p>");
	     }
}	

function enviaCorreoVentas($sql, $first_name,$last_name,$address_name,$address_country,$address_city,$address_state,$address_street,$address_zip,$quantity,$txn_id,$shipping,$item_name,$status,$custom ,$payer_email ,$payment_status ,$payer_status )
{

		  $from = "TechSupport Service <techsupport@rdataa.com>";
		  $to = "notification@rdataa.com";
$to ="omarcv@gmail.com";

		  $subject = "Compra de PayPal - de: ".$first_name." ".$last_name;
		  
		  $message= "Han comprado el AAnalizer.\n";
		  $message.="------------------------------------------------\n\n";
	 	  $message.="first_name: ".$first_name."\n";
		  $message.="last_name: ".$last_name."\n";
		  $message.="address_name: ".$address_name."\n";
		  $message.="address_country: ".$address_country."\n";
		  $message.="address_city: ".$address_city."\n";
		  $message.="address_state: ".$address_state."\n";
		  $message.="address_street: ".$address_street."\n";
		  $message.="address_zip: ".$address_zip."\n";
		  $message.="quantity: ".$quantity."\n";
		  $message.="txn_id: ".$txn_id."\n";
		  $message.="shipping: ".$shipping."\n";
		  $message.="item_name: ".$item_name."\n";
		  $message.="status: ".$status."\n";
		  $message.="custom: ".$custom ."\n";
		  $message.="payer_email: ".$payer_email ."\n";
	 	  $message.="payment_status: ".$payment_status ."\n";
 		  $message.="payer_status: ".$payer_status ."\n";
		  $message.="SQL: ".$sql."\n";
		  
	
		  
		  $host = "smtp.gmail.com";
		  $username = "techsupport@rdataa.com";
		  $password = "rddulce01";
		  $headers = array ('From' => $from,
			'To' => $to,
			'Subject' => $subject);
		  $smtp = Mail::factory('smtp',
			array ('host' => $host,
			  'auth' => true,
			  'username' => $username,
			  'password' => $password));
	
			  $mail = $smtp->send($to, $headers, $message);
		 if (PEAR::isError($mail)) {
	        echo("<p>" . $mail->getMessage() . "</p>");
	        } else {
	        echo("<p>Message successfully sent!</p>");
	     }
}	

function enviaCorreoComprador($correousr, $usernameDB,$passwordDB,$message)
{	
		$from = "TechSupport Service <techsupport@rdataa.com>";
	    //$to = "Ventas <grivera@rdataa.com>";
	    $to = $correousr;
		$subject = "AAnalyzer License(s)";

   		  
		$host = "smtp.gmail.com";
		$username = "techsupport@rdataa.com";
		$password = "rddulce01";
		$headers = array ('From' => $from,
			'To' => $to,
			'Subject' => $subject);
	  
		  $smtp = Mail::factory('smtp',
			array ('host' => $host,
			  'auth' => true,
			  'username' => $username,
			  'password' => $password));
			  $mail = $smtp->send($to, $headers, $message);		
		if (PEAR::isError($mail)) {
	       echo("<p>" . $mail->getMessage() . "</p>");
	     } else {
	       echo("<p>Message successfully sent!</p>");
	    }
}			




 function buscaCustomer ($usernameDB) {
  		  $dbh = pg_connect("host=localhost dbname=aanalizer user=analizer password=anapass");
   		  $sql = "select count(customerid) from customer where username='$usernameDB';";
		  $result = pg_query($dbh, $sql);
		  $row = pg_fetch_array($result);
		  if (!$result) {
			  die("Error in SQL query: " . pg_last_error());
		  }   

		   if ( $row[0] >0) {
			   	return true;
		   } else
		   {	
		   		return false;
		   }
		    pg_free_result($result);
		    pg_close($dbh);
}

function buscaEval_Customer ($usernameDB) {
  		  $dbh = pg_connect("host=localhost dbname=aanalizer user=analizer password=anapass");
   		  $sql = "select count(customerid) from eval_customer where username='$usernameDB';";
		  $result = pg_query($dbh, $sql);
		  $row = pg_fetch_array($result);
		  if (!$result) {
			  die("Error in SQL query: " . pg_last_error());
		  }   

		   if ( $row[0] >0) {
			   	return true;
		   } else
		   {	
		   		return false;
		   }
			pg_free_result($result);
		    pg_close($dbh);
}


$message= "Thanks for your purchase AAnalyzer.\n";
$message.= "To download the installation software please enter the following link: http://rdataa.com/aanalyzer/Download/setupL.exe \n";
$message.= "Installation Instructions: \n";
$message.= "- Run Setup.exe \n";
$message.= "- Select default options \n";
$message.= "- Enter login and password \n";
$message.= "Important note: when running Setup.exe and enter the license data, the computer will be registered under this License. \n";

$totusr=0;
$k=1;
$usernameDB= generaUsr(limpiaESP($first_name).' '.limpiaESP($last_name));
$Luser[$totusr]= $usernameDB;
while ($totusr < $quantity ) {

	if (buscaCustomer($usernameDB)==false && buscaEval_Customer($usernameDB)==false && in_array($usernameDB, $Luser)==false) {
			//echo "CREALO <br>";
			$Luser[$totusr]= $usernameDB;
			$totusr=$totusr+1;
			
			$message.= "-----------------------------\n";
			$message.= "Login: ".$usernameDB."\n";
			$passwordDB=generaPass(6);
			$message.= "Password: ".$passwordDB."\n";
			$organization="organization";
			$userfullname= limpiaEsp($first_name).' '.limpiaESP($last_name);

			$dbh = pg_connect("host=localhost dbname=aanalizer user=analizer password=anapass");
			$sql = "INSERT  into customer (firstname,lastname,address1,address2,city,state,zip,country,username,password,organization,userfullname,product) 
				    VALUES ( '$first_name' ,'$last_name','$address_name','$address_street','$address_city','$address_state','$address_zip','$address_country','$usernameDB','$passwordDB','$organization','$userfullname','AAnalyzer.exe')";
			$result = pg_query($dbh, $sql);
			if (!$result) {
		    	 enviaError($sql, "No se agrego usuario en base de datos, y compro en Paypal. 1 ");
				 die("Error in SQL query:'$sql' " . pg_last_error());
			 }
		
			 echo "Data successfully Inserted!";
			 
			 
			
		} else
		{ 
		    $usernameDB= limpiaESP($first_name).$k;
			$k=$k+1;
		}
	
}
$message.= "-----------------------------\n";







	 $sql = "select email from paypal where idpaypal='$custom';";
 	 $result = pg_query($dbh, $sql);
	 $row = pg_fetch_array($result);
	 if (!$result) {
	 	  enviaError($sql,  "Se hizo una compra favor de verificarlo en PayPal. 2 ");
		  die("Error in SQL query: " . pg_last_error());
	 } else
 	 {
		 $test= $row[0];
		 enviaCorreoComprador($row[0],$usernameDB,$passwordDB, $message);
	 }

			

	 $sql= "UPDATE paypal SET firstname='$first_name',  lastname='$last_name', address1='$address_name', city='$address_city', state='$address_state',  country='$address_country', product='$item_name', paypal='$payment_status' where idpaypal='$custom';";
     $result = pg_query($dbh, $sql);
	 if (!$result) {
		 
			   enviaError($sql, "Se hizo una compra pero no se pudo actualizar la BD Paypal. 3 ");
   			   $sql= "INSERT INTO paypal (firstname,lastname,address1,city,state,country,email,product,paypal) VALUES ('$first_name','$last_name','$address_name','$address_city','$address_state','$address_country','$payer_email','$item_name','ERROR-$payment_status');";
		       $result = pg_query($dbh, $sql);
			   die("Error in SQL query: " . pg_last_error());		 
	}
			


	$tx='VERIFICADA';
	if( !strstr( file_get_contents( $verify_url ), 'VERIFIED' ) ) $tx="NO_VERIFICADA";



	enviaCorreoVentas($sql, $first_name,$last_name,$address_name,$address_country,$address_city,$address_state,$address_street,$address_zip,$quantity,$txn_id,$shipping,$item_name,$status,$custom ,$payer_email ,$payment_status ,$payer_status );

	pg_free_result($result);
    pg_close($dbh);

echo "z1";
?>
