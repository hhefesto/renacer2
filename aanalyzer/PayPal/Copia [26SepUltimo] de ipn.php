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

function enviaCorreoVentas()
{

		  $from = "TechSupport Service <techsupport@rdataa.com>";
		  //$to = "Ventas <grivera@rdataa.com>";
		  $to = "ocastillo@qro.cinvestav.mx";
		  $subject = "Compra de PayPal";
		  $message = "Han comprado el AAnalizer,\n";
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

function enviaCorreoComprador($usernameDB,$passwordDB)
{	
		$from = "TechSupport Service <techsupport@rdataa.com>";
	    //$to = "Ventas <grivera@rdataa.com>";
	    $to = "ocastillo@qro.cinvestav.mx";
		$subject = "AAnalyzer License(s)";

		$message = "Thanks, please login at http://rdataa.com/aanalyzer/Download/Login.php\n";
  		$message.= "for downloading AAnalyzer:\n";
   		$message.= "Login: ".$usernameDB."\n";
   		$message.= "Password: ".$passwordDB."\n";
   		  
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


function escribeLog($contenido)
{
	$nombre_archivo = 'log.txt';
	if (is_writable($nombre_archivo)) {			
		if (!$gestor = fopen($nombre_archivo, 'a')) {
//			 echo "No se puede abrir el archivo ($nombre_archivo)";
			 exit;
		}
		if (fwrite($gestor, $contenido.chr(13).chr(10)) === FALSE) {
//			echo "No se puede escribir en el archivo ($nombre_archivo)";
			exit;
		}
		fclose($gestor);
	} else {
		echo "El archivo $nombre_archivo no es escribible";
	}

}


	 $dbh = pg_connect("host=localhost dbname=aanalizer user=analizer password=anapass");
	 if (!$dbh) {
		 die("Error in connection: " . pg_last_error());
	 }
	 $passwordDB= generaPass(6);
	 $usernameDB= generaUsr(limpiaESP($first_name).' '.limpiaESP($last_name));
	 $userfullname= limpiaEsp($first_name).' '.limpiaESP($last_name);
     $ok=false;
	 $k=1;
	 while ($ok==false) {		
		  $sql = "select count(customerid) from customer where username='$usernameDB';";
		  $result = pg_query($dbh, $sql);
		  $row = pg_fetch_array($result);
		  if (!$result) {
			  die("Error in SQL query: " . pg_last_error());
		  }   
		   if ( $row[0] <=0)  {
					 $ok=true;
		   } else {
					 $usernameDB= limpiaESP($first_name).$k;
					 $k=k+1;
		   } 
 	 }

	escribeLog($sql);



	$sql = "USUARIO: INSERT  into customer (firstname,lastname,address1,address2,city,state,zip,country,username,password,organization,userfullname,product) 
	VALUES ( '$first_name' ,'$last_name','$address_name','$address_street','$address_city','$address_state','$address_zip','$address_country','$usernameDB','$passwordDB','$organization','$userfullname','$item_name')";

/*
			 //$result = pg_query($dbh, $sql);
			 if (!$result) {
				 die("Error in SQL query:'$sql' " . pg_last_error());
			 }
		
			 echo "Data successfully Inserted!";

*/

	 $sql = "select email from paypal where idpaypal='$custom';";
 	 $result = pg_query($dbh, $sql);
	 $row = pg_fetch_array($result);
	 if (!$result) {
		  die("Error in SQL query: " . pg_last_error());
	 }

enviaCorreoComprador($usernameDB,$passwordDB);


			

	 $sql= "UPDATE paypal SET firstname='$first_name',  lastname='$last_name', address1='$address_name', city='$address_city', state='$address_state',  country='$address_country', email='$payer_email', product='$item_name', paypal='$payment_status' where idpaypal='$custom'";
     $row = pg_fetch_array($result);
	 if (!$result) {
		 //$sql= "INSERT INTO paypal (firstname, paypal) VALUES ('$first_name', '1ERROR:$custom')";
			   die("Error in SQL query: " . pg_last_error());		 
		 }else
		 {     
			   $sql= "INSERT INTO paypal (firstname,lastname,address1,city,state,country,email,product,paypal) VALUES ('$first_name','$last_name','$address_name','$address_city','$address_state','$address_country','$payer_email','$item_name','ERROR-$payment_status')";
		 }
			


	$tx='VERIFICADA';
	if( !strstr( file_get_contents( $verify_url ), 'VERIFIED' ) ) $tx="NO_VERIFICADA";


escribeLog('ROW'.$row[0].$tx.' '.$payer_status.' '.$sql);
enviaCorreoVentas();

	pg_free_result($result);
    pg_close($dbh);

echo "z1";
?>
