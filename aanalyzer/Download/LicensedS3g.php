<!DOCTYPE HTML>
<!--  -->
<html><!-- InstanceBegin template="/Templates/Platilla2.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
	<meta charset="UTF-8">
	<!-- InstanceBeginEditable name="doctitle" -->
	<title>RDATAA.COM</title>
	<!-- InstanceEndEditable --><link rel="stylesheet" href="../css/style.css" type="text/css">
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-1746053-4']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript';
	ga.a
	sync = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : '
	http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0];
	s.parentNode.insertBefor
	e(ga, s);
  })();
</script>	
	<!--[if IE 7]>
		<link rel="stylesheet" href="css/ie7.css" type="text/css">
	<![endif]-->
    <!-- InstanceBeginEditable name="head" -->
    <style type="text/css">
<!--
.Estilo2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 16px;
}
.Estilo7 {font-family: Verdana, Arial, Helvetica, sans-serif}
-->
    </style>
    <!-- InstanceEndEditable -->
    <style type="text/css">
<!--

-->
    </style>
	
<script type="text/javascript">
<!--
function CargarFoto(img, ancho, alto){
  derecha=(screen.width-ancho)/2;
  arriba=(screen.height-alto)/2;
  string="toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=1,width="+ancho+",height="+alto+",left="+derecha+",top="+arriba+"";
  fin=window.open(img,"",string);
}
// -->
</script>	
	
	
</head>
<body>
	<div id="header">
		<div>
			<div>
				<span> </span>
				<a href="../aanaHome.htm" class="logo"><img src="../images/aana/logo.png" alt="" width="200" height="100" border="0"></a>
				<span class="tagline"> </span>
			</div>
			<ul>

<!-- InstanceBeginEditable name="menup" -->			
				<li><a href="../aanaHome.htm">Home</a></li>	
				<li class="selected"><a href="../aanaGet.htm">Getting AAnalyzer </a></li>
				<li><a href="../aanaManual.htm">Manual &amp; Support </a></li>	
				<li><a href="../aanaWhy.htm">Why AAnalyzer? </a></li>
				<li><a href="../aanaForum.htm">Forum &amp; Faqs</a></li>
				<li><a href="../aanaMore.htm"> Info </a></li>
	
<!-- InstanceEndEditable --></ul>
		</div>
	</div>
<!-- InstanceBeginEditable name="menuizq" -->		
	<div id="body">

		<div id="content">

			<div id="sidebar">
	
				<h3>/home/getting </h3>
				<ul>
					<li >
						<a href="../aanaGet.htm">Getting AAnalyzer </a>
						<ul>
							
							<li>
								<a href="CreateUser.php">Trial version </a></li>
							<li class="selected">
								<a href="Licensed.php">Licensed version </a></li>
						</ul>
				  </li>
					
					<li class="selected collapse">
						<ul>
							  
							
				      </ul>
					</li>
				</ul>
		  </div>
			<div id="section">
				<h2 class="Estilo1">Getting a GROUP License </h2>






<?php 
				$ok=false;
				function validar_email($email) {
					// Primero revisamos que exista el símbolo @,
					// y que la longitud sea correcta.
					if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
						// Inválido por un incorrecto número de caracteres
						// en la misma sección o falta el #.
						return false;
					}
					// Lo separamos en secciones para hacerlo más facil
					$email_array = explode("@", $email);
					$local_array = explode(".", $email_array[0]);
					for ($i = 0; $i < sizeof($local_array); $i++) {
						if(!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$",$local_array[$i])) {
							return false;
						}
					}
					// Revisar si el domino es o no una IP,
					// Si es debe de ser un dominio válido
					if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) {
						$domain_array = explode(".", $email_array[1]);
						if (sizeof($domain_array) < 2) {
							return false; // No tiene suficientes partes el dominio
						}
						for ($i = 0; $i < sizeof($domain_array); $i++) {
							if(!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$",$domain_array[$i])) {
								return false;
							}
						}
					}
					$domain = explode('@', $email);
					if (!checkdnsrr($domain[1]))
					{ return false;
				
					}
					return true;
				}				
				
				
				
				require_once('recaptchalib.php');
				
//********************RDATAA*******************************

  $publickey = "6LdLyOYSAAAAAB_dgivMUDMyZitTBQNnflzKqlAu";
  $privatekey = "6LdLyOYSAAAAAKpV9HYTA8vI-8wxdtuSlTlAIf7T";
//********************AANALYZER****************************

//  $publickey = "6LdFMwYTAAAAAGpR3AOK6uxyycY2gClk0dTh6Q3f";
//  $privatekey = "6LdFMwYTAAAAAMWVucA5MA6IFhpG2lZqCke9vn15";				


				# the response from reCAPTCHA
				$resp = null;
				# the error code from reCAPTCHA, if any
				$error = null;
				
				# was there a reCAPTCHA response?
				
				if ($_POST["recaptcha_response_field"] ) {

						$resp = recaptcha_check_answer ($privatekey,
								$_SERVER["REMOTE_ADDR"],
							$_POST["recaptcha_challenge_field"],
								$_POST["recaptcha_response_field"]);
				
				if ($resp->is_valid) {
							
					$ok=true;
			
					require_once "Mail.php";
					// $fillform = true;
					if ( isset($_POST['paga'])) {
					
						
						$PaypalEmail= pg_escape_string($_POST['ccorreo']);
						$IdPay= date("Hidmy").md5($PaypalEmail.date("Hidmy"));
						$paypal='standby';
$cantTm= explode(",",$_POST['ccantidad']);
$cantTipo= (int) pg_escape_string($cantTm[1]);
$cant= (int) pg_escape_string($cantTm[0]);
$copies=$cant;
						//$cant=1;

						if ($cant==0) echo("<script>alert(\"Quantity must be different.\");history.go(-1)</script>");
						if (validar_email($PaypalEmail)== false) {
							echo("<script>alert(\"This email is wrong !\");history.go(-1)</script>");
							exit;
						}
						// onchange="this.form.submit()"
						
						echo '
						 <br><h2>Review and Pay with credit card or PayPal </h2>
						 <table width="116" border="0" cellspacing="0" cellpadding="0">
							<tr>
							  <td>Email:</td>
							  <td align="right">'.pg_escape_string($_POST['ccorreo']).'</td>
							</tr>
							<tr>
							  <td>Licenses:</td>
							  <td align="right">'.$cant.' for  '.$cantTipo.' year(s)</td>
							</tr>
						  </table>
						  <p><br></p>	
						  <p>Please note that paying with a credit card requires having or creating a PayPal account. The option of creating a PayPal account, if you do not have one, will be provided when you click on Pay Now</p>
						  <p><br></p>			
';

if ($cantTipo==1 && $cant==5)
echo  
'
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="KHTL4L7SJ9KFJ">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
</form>
';



if ($cantTipo==2 && $cant==5)
echo
'
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="G3W4N9S2GPZ98">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
</form>
';


if ($cantTipo==3 && $cant==5)
echo
'
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="R7TK6YTPM2PES">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
</form>
';


if ($cantTipo==1 && $cant==10)
echo
'
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="ZZWF9KKD2D9BN">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
</form>
';


if ($cantTipo==2 && $cant==10)
echo
'
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="M3UTJD2JVHA32">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
</form>
';

if ($cantTipo==3 && $cant==10)
echo
'
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="9JZHE7ZG8YLJ6">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
</form>

';

if ($cantTipo==1 && $cant==20)
echo
'
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="PFEASFJRRZJY4">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
</form>
';

if ($cantTipo==2 && $cant==20)
echo
'
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="WNWTH2YMSLWCL">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
</form>
';

if ($cantTipo==3 && $cant==20)
echo
'
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="BKJLLF8A62EFY">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
</form>

';



					
						$dbh = pg_connect("host=localhost dbname=aanalizer user=analizer password=anapass");
						if (!$dbh) {
							die("Error in connection: " . pg_last_error());
						}
						$sql = "INSERT  into paypal (email, quantity, idpaypal, paypal) VALUES ( '$PaypalEmail','$copies','$IdPay','$paypal')";
						$fillform = false;
						$result = pg_query($dbh, $sql);
						if (!$result) {
							pg_free_result($result);
							pg_close($dbh);
							echo("<script>alert(\"Error to update data !\");history.go(-1)</script>");
							$fillform = true;
						}
						pg_free_result($result);
						pg_close($dbh);
					
						// Usuario creado exitosamente notificar a Ventas. techsupport.. de la creaci&oacute;n del usuario
						$from = "TechSupport Service <techsupport@rdataa.com>";
						//$to = "Ventas <grivera@rdataa.com>";
						$to = "notification@rdataa.com";
$to="omarcv@gmail.com";					
						$subject = "Nueva VENTA de producto";
						$message = "Hola Ventas han pedido AAnalizer por medio de PayPal,\n";
						$message .="Deberas revisar el estatus de compra\n";
						$message .="los datos del usuario de evaluaci&oacute;n son:\n";
						$message .="Correo electr&oacute;nico :".$PaypalEmail."\n";
						$message .="modo de pago : PayPal (pendiente de pago) \n";
						$message .="Numero de licencias :".pg_escape_string($_POST['ccantidad']) ." \n";
						$message .= "Este es un mensaje generado automaticamente por sistema.\n";
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
					
						//   $mail = $smtp->send($to, $headers, $message);
					
					
					}
							
			
					
					
					
					
		
	} else {
	# set the error code so that we can display it
					$error = $resp->error;
					
					echo("<script>alert(\"Write the correct CAPTCHA code !\");history.go(-1)</script>");
					
		}
				
}



if (!$ok) echo("<script>alert(\"Write the correct CAPTCHA code !\");history.go(-1)</script>");



if ($_POST['sel']==2 && isset($_POST['submit2']))  {

     $firstname = pg_escape_string($_POST['cfirstname']);
     $lastname = pg_escape_string($_POST['clastname']);
     $address1 = pg_escape_string($_POST['caddress1']);
     $address2 = pg_escape_string($_POST['caddress2']);
     $city = pg_escape_string($$_POST['ccity']);
     $state = pg_escape_string($_POST['cstate']);
     $zip = pg_escape_string($_POST['czip']);
     $country = pg_escape_string($_POST['ccountry']);
     $email = pg_escape_string($_POST['cemail']);
     $copies =  (int) pg_escape_string($_POST['copies']);

 			
   $dbh = pg_connect("host=localhost dbname=aanalizer user=analizer password=anapass");
     if (!$dbh) {
         die("Error in connection: " . pg_last_error());
     } 
     $IdPay= date('Hidmy');	
     $paypal='WIRE';
     $sql = "INSERT  into paypal (firstname,lastname,address1,address2, zip, city,state,country,email, quantity, idpaypal,paypal) VALUES ( '$firstname' ,'$lastname','$address1','$address2','$zip','$city','$state','$country','$email','$copies','$IdPay','$paypal')";
	 //echo "<br><br>". $sql;
     $fillform = false;
	 $result = pg_query($dbh, $sql);
	
	 if (!$result) {
	 	pg_free_result($result);
	 	pg_close($dbh);
	 	echo("<script>alert(\"Complete and review the *required fields -*!\");history.go(-1)</script>");
	 	$fillform = true;
	 }
	 if (validar_email($email)==false && strlen($firtsname)>0 && strlen($lastname)>0 &&  strlen($address1)>0 && strlen($city)>0 &&  strlen($country)>0 && strlen($copies)>0 ) {
		 pg_free_result($result);
		 pg_close($dbh);
		echo("<script>alert(\"This email is wrong !\");history.go(-1)</script>");
        $fillform = true;
	 }


     pg_free_result($result);
     pg_close($dbh);

     // Usuario creado exitosamente notificar a Ventas. techsupport.. de la creaci&oacute;n del usuario
      $from = "TechSupport Service <techsupport@rdataa.com>";
      //$to = "Ventas <grivera@rdataa.com>";
      $to = "notification@rdataa.com";

      $subject = "Nueva VENTA de producto";
      $message = "Hola Ventas han pedido un producto en venta de AAnalizer,\n";
      $message .="Deberas de ponerte en contacto con el \n";
      $message .="Realizar la factura y notificar a techsupport para la creacion de la cuenta\n";
      $message .="los datos del usuario de evaluaci&oacute;n son:\n";
      $message .="Nombre :".$firstname ." " .$lastname ."\n";
      $message .="Direcci&oacute;n :".$address1 ." " .$address2 ."\n";
      $message .="Ciudad :".$city ." Estado: " .$state ."\n";
      $message .="Codigo Postal :".$zip ." Pais: " .$country ."\n";
      $message .="Correo electr&oacute;nico :".$email ." Tel&eacute;fono: " .$phone ."\n";
      $message .="Clave de usuario :".$username ." Organizaci&oacute;n: " .$organization ."\n";
      $message .="modo de pago : WIRE \n";
       $message .="Numero de licencias :".$copies ." \n";
      $message .= "Este es un mensaje generado automaticamente por sistema.\n";
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

   // $mail = $smtp->send($to, $headers, $message);  
    
	echo ' <br><p align="justify" class="Estilo2"><strong> Your request was Successfully created ! <BR>shortly you will be contacted by Sales and will give to you the next steps to receive your invoice and download instructions if you are not contacted by sales in a period of 2 days please send an email to techsupport@rdataa.com for assistance</strong></p><br>';

	}
	
	
?>
            </div>
		</div>



	</div>

<!-- InstanceEndEditable -->												
	<div id="footer">
		<div>
			<p>
			    <a href="http://www.rdataa.com">www.rdataa.com</a></p>
				<p></p>
			<ul>
				<li>
					<a href="../index.html">Home</a>
				</li>
				<li>
					<a href="../aanaHome.htm"> Aanalyzer</a>
				</li>
				<li>
					<a href="../aanaInfo.htm"> Contact Information</a>
				</li>

			</ul>
			<div>
				<span>.</span>
			</div>
		</div>
	</div>
</body>
<!-- InstanceEnd --></html>
