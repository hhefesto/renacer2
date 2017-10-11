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
$txn_id=$_POST['txn_id'];
$quantity=$_POST['quantity'];
$shipping=$_POST['shipping'];
$item_number=utf8_encode($_POST['item_number']);
$status=$_POST['status'];	//Status del pago
$custom = pg_escape_string($_POST['custom']);  //ID de tu pedido
$payer_email = $_POST['payer_email'];//este es el email de tu cliente
$payment_status = $_POST['payment_status'];
$payer_status = $_POST['payer_status'];


// ID-numero licencias-anios  ID 01 2
$numlicencias= intval(substr($item_number,2,2));
$numanios= intval(substr($item_number,4,1)); 
$licanio=$numlicencias." licenses/".$numanios." year(s";
switch ($numanios) {
    case 1:
        $product= "iAAnalyzerONEyear.exe";
        break;
    case 2:
        $product= "iAAnalyzerTWOyears.exe";
        break;
    case 3:
        $product= "iAAnalyzerTHREEyears.exe";
        break;
    default:
        $product= "iAAnalyzerTRIAL.exe";
}


$file = fopen("/tmp/log-eval.txt", "a");                             
fwrite($file, "<< PAYPAL ".date("d/M/Y")." COMPRA DE LICENCIA: $numlicencias, anios: $numanios, Producto: $product>>\n");
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

function enviaCorreoComprador($correousr,$message)
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


if ($payment_status!="Completed")
{

$message= "\nYour purchase has not been completed\n";
$message.="Status payment: ".$payment_status."\n";
$message.= "Please, contact us!\n";
enviaCorreoComprador($payer_email, $message);

$file = fopen("/tmp/log-eval.txt", "a");
fwrite($file, "<< PAYPAL ".date("d/M/Y")." ERROR de compra: $numlicencias, anios: $numanios, verificar cuenta de PAYPAL>> $\n");         
fclose($file);

exit();

}




function buscaCustomer ($usernameDB) {
  		  $dbh =  mysqli_connect('localhost', 'analizer', 'anapass', 'aanalizer');
   		  $sql = "select count(customerid) from customer where username='$usernameDB';";
		  $result = mysqli_query($dbh, $sql);
		  $row = mysqli_fetch_array($result);
		  if (!$result) {
			  die("Error in SQL query: 1" .mysql_error());
		  }   

		   if ( $row[0] >0) {
			   	return true;
		   } else
		   {	
		   		return false;
		   }
	        mysqli_free_result($result);
        	mysqli_close($dbh);
}



$message= "Dear ".$first_name."<br>";
$message.= "We are pleased to electronically send you a ".$licanio." 1.27. From the computers where you are going to install AAnalyzer, please connect to  <br>";
$message.= "www.rdataa.com/download/setupE.exe <br>";
$message.= "<br>This will download the program setupE.exe. Run it (as administrator, if necessary); it will ask you some questions (just click on next or install) and then a popup window will show up asking you for your username and password. <br>";
$message.= "Another window will show the progress on the download, which should take less than a minute.  <br>";
$message.= "This will install a ".$licanio." v1.27 on your computer. Please let me know if you have any problem.<br>";
$message.= "<br> Regards</br>";
$message.= "Gloria<br><br>";   







$totusr=0;
$k=1;
$usernameDB= generaUsr(limpiaESP($first_name).' '.limpiaESP($last_name));
$Luser[$totusr]= $usernameDB;


while ($totusr < $numlicencias ) {

	if (buscaCustomer($usernameDB)==false && in_array($usernameDB, $Luser)==false) {
			//echo "CREALO <br>";
			$Luser[$totusr]= $usernameDB;
			$totusr=$totusr+1;
			
			$message.= "-----------------------------\n";
			$message.= "Login: ".$usernameDB."\n";
			$passwordDB=generaPass(6);
			$message.= "Password: ".$passwordDB."\n";
			$organization="organization";
			$userfullname= limpiaEsp($first_name).' '.limpiaESP($last_name);




	                $dbh =  mysqli_connect('localhost', 'analizer', 'anapass', 'aanalizer');
			$sql = "INSERT  into customer (customerid, firstname,lastname,address1,address2,city,state,zip,country,email,username,password,organization,userfullname,product) 
				    VALUES (NULL,'$first_name' ,'$last_name','$address_name','$address_street','$address_city','$address_state','$address_zip','$address_country','$payer_email','$usernameDB','$passwordDB','$organization','$userfullname','$product')";
			$result = mysqli_query($dbh, $sql);
			if (!$result) {
		    	 enviaError($sql, "No se agrego usuario en base de datos, y compro en Paypal. 1 ");
				 die("Error in SQL query: 2'$sql' " . mysql_error());
			 }
		
			 echo "Data successfully Inserted!";
			 
			 
			
		} else
		{ 
		    $usernameDB= limpiaESP($first_name).$k;
			$k=$k+1;
		}
	
}
$message.= "-----------------------------\n";

// *******************************************************************************
		 enviaCorreoComprador($payer_email, $message);

			

//			   enviaError($sql, "Se hizo una compra pero no se pudo actualizar la BD Paypal. 3 ");
   			   $sql= "INSERT INTO paypal (firstname,lastname,address1,city,state,country,email,product,idpaypal,descripcion) VALUES ('$first_name','$last_name','$address_name','$address_city','$address_state','$address_country','$payer_email','$item_number','$payment_status', '$licanio');";
			   $result = mysqli_query($dbh, $sql);
//			   die("Error in SQL query: " . mysql_error());		 
//	}
			
$file = fopen("/tmp/log-eval.txt", "a");
fwrite($file, "<< PAYPAL SQL $sql >> $\n");      
fclose($file);  




	$tx='VERIFICADA';
	if( !strstr( file_get_contents( $verify_url ), 'VERIFIED' ) ) $tx="NO_VERIFICADA";



	enviaCorreoVentas($sql, $first_name,$last_name,$address_name,$address_country,$address_city,$address_state,$address_street,$address_zip,$quantity,$txn_id,$shipping,$item_number,$status,$custom ,$payer_email ,$payment_status ,$payer_status );

        mysqli_free_result($result);
        mysqli_close($dbh);


echo "z1";
?>
