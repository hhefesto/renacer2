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
.Estilo3 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12;
}
.Estilo4 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
}
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
							
							<li class="selected">
								<a href="../aanaGet.htm">Trial version </a></li>
							<li>
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
				<h2 class="Estilo1">Get trial version </h2>
				<p>
				<table width="100%" border="0" cellspacing="10" cellpadding="0">
                  <tr>
                    <td width="100%" align="char" valign="top">
                      <p align="justify" class="Estilo3"> From this page you can get a trial version (it has all the features; will last a month and requires internet connection to work).</p>
                      <p align="justify" class="Estilo3">You can get a <a href="Licensed.php" target="Main">licensed version from this other link</a></p>
                      <p align="justify" class="Estilo3">The software runs on MS Windows. Mac users requires a Windows simulator. </p>
                    </td>
                  </tr>
              </table>


<?php
 require_once "Mail.php";

 $fillform = true;
 
 
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
	     } 
//		 else {
//	       echo("<br>Sent you an email with your username and password to install<br>");
//	    }
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

 

 if ($_POST["recaptcha_response_field"]) {
		$resp = recaptcha_check_answer ($privatekey,
		$_SERVER["REMOTE_ADDR"],
		$_POST["recaptcha_challenge_field"],
		$_POST["recaptcha_response_field"]);
				
 		if ($resp->is_valid) {

	
				 // attempt a connection
				 $dbh = pg_connect("host=localhost dbname=aanalizer user=analizer password=anapass");
				 if (!$dbh) {
					 die("Error in connection: " . pg_last_error());
				 }
				 // escape strings in input data
				 $firstname = pg_escape_string($_POST['cfirstname']);
				 $lastname = pg_escape_string($_POST['clastname']);
				 $address1 = pg_escape_string($_POST['caddress1']);
				 $address2 = pg_escape_string($_POST['caddress2']);
				 $city = pg_escape_string($_POST['ccity']);
				 $state = pg_escape_string($_POST['cstate']);
				 $zip = pg_escape_string($_POST['czip']);
				 $country = pg_escape_string($_POST['ccountry']);
				 $email = pg_escape_string($_POST['cemail']);
				 $phone = pg_escape_string($_POST['cphone']);
//				 $username = pg_escape_string($_POST['cusername']);
//				 $password = pg_escape_string($_POST['cpassword']);
				 $organization =  pg_escape_string($_POST['corganization']);
				 
				 $k=1;
				 $termina=false;
				 $passwordDB=generaPass(6);
				 $usernameDB= generaUsr(limpiaESP($firstname).' '.limpiaESP($lastname));
				 //echo $usernameDB;
			     while ($termina==false) {
					   if (buscaCustomer($usernameDB)==false && buscaEval_Customer($usernameDB)==false) 
					   {	$termina=true;
					   } else
					   {
							$usernameDB= limpiaESP($firstname).$k;
							$k=$k+1;
					   }
 				 }
	
				 if (validar_email($email)==false)
				 {
				     echo("<script>alert(\"Write the correct Email !\");history.go(-1)</script>"); 
				 }

			
				 // execute query
				 $sql = "INSERT  into eval_customer (firstname,lastname,address1,address2,city,state,zip,country,email,phone,username,password,organization) VALUES ( '$firstname' ,'$lastname','$address1','$address2','$city','$state','$zip','$country','$email','$phone','$usernameDB','$passwordDB','$organization')";
				 $result = pg_query($dbh, $sql);
				 if (!$result) {
					echo "Review the Required Fields!";
					$fillform = true;
				 } else {

$message= "AAnalyzer Trial version\n";
$message.= "Use this information for install AAnalyzer.  \n";
$message.= "Installation Instructions: \n";
$message.= "- Run Setup.exe \n";
$message.= "- Select default options \n";
$message.= "- Enter login and password \n";
$message.= "-----------------------------\n";
$message.= "Login: ".$usernameDB."\n";
$message.= "Password: ".$passwordDB."\n";
$userfullname= limpiaEsp($firstname).' '.limpiaESP($lastname);
enviaCorreoComprador($email,$usernameDB,$passwordDB, $message);						

			
				 // Usuario creado exitosamente notificar a Ventas. techsupport.. de la creaci&oacute;n del usuario
				  $from = "TechSupport Service <techsupport@rdataa.com>";
				  //$to = "Ventas <grivera@rdataa.com>";
				  $to = "notification@rdataa.com";
			
				  $subject = "Nuevo usuario de Evaluaci&oacute;n de producto";
				  $message = "Hola Ventas un Usuario ha creado una cuenta de evaluaci&oacute;n de AAnalizer,\n";
				  $message .="una vez que el usuario haya bajado el producto recibir&aacute;s una segunda notificaci&oacute;n\n";
				  $message .="si no la recibes en un tiempo de 1 d&iacute;a querr&aacute; decir que el usuario no ha podido bajar la evaluaci&oacute;n\n";
				  $message .="los datos del usuario de evaluaci&oacute;n son:\n";
				  $message .="Nombre :".$firstname ." " .$lastname ."\n";
				  $message .="Direcci&oacute;n :".$address1 ." " .$address2 ."\n";
				  $message .="Ciudad :".$city ." Estado: " .$state ."\n";
				  $message .="Codigo Postal :".$zip ." Pais: " .$country ."\n";
				  $message .="Correo electr&oacute;nico :".$email ." Tel&eacute;fono: " .$phone ."\n";
				  $message .="Clave de usuario :".$username ." Organizaci&oacute;n: " .$organization ."\n";
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
			
			
			
					?>
							<p class="Estilo3"><br>Please read your mail, and you will receive your login and password<br></p>
							<p class="Estilo3">Use this link to download the Evaluation Product!<br>
							</p>
							<A HREF ="setupE.exe">Download Setup</A>
							<?php
					$fillform = false;
				 }
				 // free memory
				 pg_free_result($result);
			
				 // close connection
				 pg_close($dbh);
			 	}else  {
				# set the error code so that we can display it
								$error = $resp->error;
								
								echo("<script>alert(\"Write the correct CAPTCHA code !\");</script>");
								
						}
 
			 }


 
 if ($fillform) {

 ?>
                <table width="100%" border="0" cellspacing="10" cellpadding="0">
                  <tr>
                    <td width="100%"><span class="Estilo3">
                      <p>Please use this form to create an evaluation account to download the product</p>
                      </span>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                          <table width="100%" border="0" cellspacing="5" cellpadding="0">
                            <tr>
                              <td width="53%" align ="right">*Firstname: </td>
                              <td><input type="text" name="cfirstname" value="<?php echo $_POST['cfirstname']; ?>"/></td>
                            </tr>
                            <tr>
                              <td align ="right">*Lastname:</td>
                              <td><input type="text" name="clastname"  value="<?php echo $_POST['clastname']; ?>"/></td>
                            </tr>
                            <tr>
                              <td align ="right">*Address1:</td>
                              <td><input type="text" name="caddress1"  value="<?php echo $_POST['caddress1']; ?>"/></td>
                            </tr>
                            <tr>
                              <td align ="right">Address2:</td>
                              <td><input type="text" name="caddress2"  value="<?php echo $_POST['caddress2']; ?>"/></td>
                            </tr>
                            <tr>
                              <td align ="right">*City:</td>
                              <td><input type="text" name="ccity"  value="<?php echo $_POST['ccity']; ?>"/></td>
                            </tr>
                            <tr>
                              <td align ="right">State:</td>
                              <td><input type="text" name="cstate"  value="<?php echo $_POST['cstate']; ?>"/></td>
                            </tr>
                            <tr>
                              <td align ="right">*Zip:</td>
                              <td><input type="text" name="czip"  value="<?php echo $_POST['czip']; ?>"/></td>
                            </tr>
                            <tr>
                              <td align ="right">*Country:</td>
                              <td><input type="text" name="ccountry"  value="<?php echo $_POST['ccountry']; ?>"/></td>
                            </tr>
                            <tr>
                              <td align ="right">*email:</td>
                              <td><input type="text" name="cemail"  value="<?php echo $_POST['cemail']; ?>"/></td>
                            </tr>
                            <tr>
                              <td align ="right">Phone:</td>
                              <td><input type="text" name="cphone"  value="<?php echo $_POST['cphone']; ?>"/></td>
                            </tr>

                           <tr>
                              <td align ="right">*Organization:</td>
                              <td><input type="text" name="corganization"  value="<?php echo $_POST['corganization']; ?>"/></td>
                            </tr>
                            <tr>
                              <td rowspan="2">* Required Field </td>
        
		                      <td>
<?php echo recaptcha_get_html($publickey, $error);?>							  
							  <br>
							  <input type="submit" name="submit" /></td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                          </table>
					  
		
					  
                    </form></td>
                  </tr>
              </table>
                <?php } ?>
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
