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
.Estilo6 {color: #FFFFFF; font-weight: bold; }
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
								<a href="">Licensed version </a></li>
						</ul>
				  </li>
					
					<li class="selected collapse">
						<ul>
							  
							
				      </ul>
					</li>
				</ul>
		  </div>
			<div id="section">
				<h2 class="Estilo1">Licensed version </h2>

				<table width="100%" border="0" cellspacing="10" cellpadding="0">
                  <tr>
                    <td width="100%" height="120" align="char" valign="top">
                      <p align="justify" class="Estilo2"><strong><strong><strong><img src="../images/paypal.gif" width="131" height="72" hspace="8" vspace="5" align="right"></strong></strong></strong><img src="../images/aana/news.gif" width="90" height="79" hspace="8" vspace="5" align="left"><br>
                      </p>
                      <p align="center" class="Estilo2"><strong>License Cost: US$700<strong></strong></strong></p>
                      <p align="center" class="Estilo2"><em>(celebrating the launch of the web page</em>)<br>
                    </p>
                    </td>
                  </tr>
              </table>
				<?php
 require_once "Mail.php";
 $fillform = true;
 if ($_POST['submit']) {

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
     $username = pg_escape_string($_POST['cusername']);
     $password = pg_escape_string($_POST['cpassword']);
     $organization =  pg_escape_string($_POST['corganization']);
     $payment =  pg_escape_string($_POST['payment']);
     $copies =  pg_escape_string($_POST['copies']);

 
 
     // attempt a connection
     $dbh = pg_connect("host=localhost dbname=aanalizer user=analizer password=anapass");
     if (!$dbh) {
         die("Error in connection: " . pg_last_error());
     } 
     // execute query
     $IdPay= md5($firstname.$lastname.$email);	
     $paypal="standby";
     $sql = "INSERT  into paypal (firstname,lastname,address1,address2,city,state,zip,country,email,phone,username,password,organization,idpaypal,paypal) VALUES ( '$firstname' ,'$lastname','$address1','$address2','$city','$state','$zip','$country','$email','$phone','$username','$password','$organization','$IdPay','$paypal')";
//     $sql = "INSERT into  paypal (firstname) VALUES ('$firstname')";
//  $sql = "SELECT * from paypal";
  
     $result = pg_query($dbh, $sql);
     if (!$result) {
        echo "Review the Required Fields !";
        $fillform = true;
     }
//	 echo ">>".$sql;
	 
     // free memory
     pg_free_result($result);

     // close connection
     pg_close($dbh);

     // Usuario creado exitosamente notificar a Ventas. techsupport.. de la creaci&oacute;n del usuario
      $from = "TechSupport Service <techsupport@rdataa.com>";
      //$to = "Ventas <grivera@rdataa.com>";
      $to = "notification@rdataa.com";
$to="omarcv@gmail.com";
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
      $message .="modo de pago :".$payment ." \n";
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

    $mail = $smtp->send($to, $headers, $message);
	  echo ' <p align="justify" class="Estilo2"><strong> Your request was Successfully created ! <BR>shortly you will be contacted by Sales and will give to you the next steps to receive your invoice and download instructions if you are not contacted by sales in a period of 2 days please send an email to techsupport@rdataa.com for assistance</strong></p><br>';


if ($_POST['sel']==1) {
	echo ' <strong>BANK DETAILS: </strong><hr>
	RDATA S de RL MI <br> (ABA USA) BNMXMXMM  002150700234812335 <br> Checking Account 9332470 <br> BANAMEX Banco Nacional de Mexico, S.A. <br>Sucursal Banamex 0838';
}
if ($_POST['sel']!=1) {
/*   echo '
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
	  <div align="center">
	  <input type="hidden" name="cmd" value="_s-xclick">
	  <input type="hidden" name="hosted_button_id" value="GKTHKB3C55ZZE">
	  <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
	  <img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
	  </div>
	</form>
*/


echo '


HOLA
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="SF3FU744LZUP2">
<table>
<tr><td><input type="hidden" name="on0" value="Select your best option">Select your best option</td></tr><tr><td><select name="os0">
	<option value="1 license for 1 year">1 license for 1 year $1.00 MXN</option>
	<option value="1 licence for 2 years">1 licence for 2 years $1.20 MXN</option>
	<option value="1 licence for 3 years">1 licence for 3 years $1.30 MXN</option>
	<option value="2 licences for 1 year">2 licences for 1 year $2.10 MXN</option>
	<option value="2 licences for 2 year">2 licences for 2 year $2.20 MXN</option>
	<option value="2 licences for 3 year">2 licences for 3 year $2.30 MXN</option>
	<option value="3 licences for 1 year">3 licences for 1 year $2.40 MXN</option>
	<option value="3 licences for 2 year">3 licences for 2 year $2.50 MXN</option>
	<option value="3 licences for 3 year">3 licences for 3 year $3.30 MXN</option>
</select> </td></tr>
</table>
<input type="hidden" name="currency_code" value="MXN">
<input type="image" src="https://www.paypalobjects.com/es_XC/MX/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal, la forma m�s segura y r�pida de pagar en l�nea.">
<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
</form>








';

}


     	$fillform = false;
     }
     // free memory
     pg_free_result($result);

     // close connection
     pg_close($dbh);

 if ($fillform) {

 ?>
                <table width="100%" border="0" cellspacing="10" cellpadding="0">
                  <tr> 
                    <td>
                      
					  
					  <form action="<?php echo $_SERVER['../PHP_SELF']; ?>" method="POST" >
					    <h2>Step 3. Fill the following form </h2>
                        <p>&nbsp;</p>
                        <table width="297" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td width="96" rowspan="2"><p class="Estilo2"><strong>Payment Option:</strong></p></td>
                            <td width="27" rowspan="2">
                              <p>
                                <input name="sel" type="radio" value="1">
</p>
                              <p>&nbsp;                              </p>
                              <p>
                                <input name="sel" type="radio" value="2">
                              </p>
                            </td>
                            <td width="225" height="42"><div align="center"><strong>Wire transfer</strong></div></td>
                          </tr>
                          <tr>
                            <td><div align="center"><span class="Estilo2"><strong><br>
                            <img src="../images/aana/paypal.jpg" width="105" height="42" hspace="7" align="absmiddle"></strong></span></div></td>
                          </tr>
                        </table>         
                        <p>&nbsp;</p>
                        
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
						  
                            <td height="29" align ="right">*Firstname: </td>
                            <td><input type="text" name="cfirstname" /></td>
                          </tr>
                          <tr>
                            <td height="29" align ="right">*Lastname:</td>
                            <td><input type="text" name="clastname" /></td>
                          </tr>
                          <tr>
                            <td height="29" align ="right">*Address (line 1):</td>
                            <td><input type="text" name="caddress1" /></td>
                          </tr>
                          <tr>
                            <td  height="29" align ="right">Address (line 2):</td>
                            <td><input type="text" name="caddress2" /></td>
                          </tr>
                          <tr>
                            <td  height="29"  align ="right">*City:</td>
                            <td><input type="text" name="ccity" /></td>
                          </tr>
                          <tr>
                            <td  height="29" align ="right">State:</td>
                            <td><input type="text" name="cstate" /></td>
                          </tr>
                          <tr>
                            <td  height="29"  align ="right">*Zip:</td>
                            <td><input type="text" name="czip" /></td>
                          </tr>
                          <tr>
                            <td  height="29" align ="right">*Country:</td>
                            <td><input type="text" name="ccountry" /></td>
                          </tr>
                          <tr>
                            <td  height="29" align ="right">*Email:</td>
                            <td><input type="text" name="cemail" /></td>
                          </tr>
                          <tr>
                          
                          <tr>
                          
                          <tr>
                            <td rowspan="3">&nbsp;</td>
                            <td><input type="hidden" name="amount"  value="<?php echo $_POST["amount"]; ?>">
                            <input type="hidden" name="quantity"  value="<?php echo $_POST["quantity"]; ?>"></td>
                          </tr>
                          <tr>
                            <td><input name="submit" type="submit" value="Proceed to Ordering" /></td>
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
