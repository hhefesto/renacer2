<!DOCTYPE HTML>
<!--  -->
<html><!-- InstanceBegin template="/Templates/Platilla2.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
	<meta charset="UTF-8">
	<!-- InstanceBeginEditable name="doctitle" -->
	<title>RDATAA.COM</title>
	<!-- InstanceEndEditable --><link rel="stylesheet" href="../css/style.css" type="text/css">
	<!--[if IE 7]>
		<link rel="stylesheet" href="css/ie7.css" type="text/css">
	<![endif]-->
    <!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
    <style type="text/css">
<!--
.Estilo1 {color: #000000}
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
				<a href="../index.html" class="logo"><img src="../images/aana/logo.png" alt="" width="200" height="100"></a>
				<span class="tagline"> </span>
			</div>
			<ul>

<!-- InstanceBeginEditable name="menup" -->			
				<li class="selected"><a href="../aanaHome.htm">home</a></li>	
				<li><a href="../aanaGet.htm">Getting aanalayzer </a></li>
				<li><a href="../aanaManual.htm">MANUAL &amp; Support </a></li>	
				<li><a href="../aanaWhy.htm">why analyzer </a></li>
				<li><a href="../aanaForum.htm">Peak fiting forum &amp; Faqs</a></li>
				<li><a href="../aanaMore.htm"> More </a></li>
				
<!-- InstanceEndEditable --></ul>
		</div>
	</div>
<!-- InstanceBeginEditable name="menuizq" -->		
	<div id="body">

		<div id="content">

			<div id="sidebar">
	
				<h3>Aanalyzer:</h3>
				<ul>
					<li class="selected collapse">
						<a href="">Getting Aanalyzer </a>
						<ul>
							
							<li>
								<a href="">Trial version </a></li>
							<li>
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
				<p>
					<?php
$cinvestavTitle="Getting AAnalyzer<font face=symbol><sup>&acirc;</sup></font> (Licensed  Version)";
require "/var/www/common/header.php";
?>
</p>
				<table width="74%" border="0" cellspacing="40" cellpadding="0">
                  <tr>
                    <td width="100%" align="char" valign="top">
                      <p>From this page you can get a licensed version:Once installed, it will not require internet connection to work.The cost is US$600 per machine.Special prices for group purchasesThe software runs on MS Windows. Mac users requires a Windows simulator. </p>
                    <p>&nbsp;</p></td>
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



     	?>
                <font face="Times New Roman" size=4><strong><font size="5">Your request was Successfully created ! <BR>
                shortly you will be contacted by Sales and will give to you the next steps to receive your invoice and download instructions<BR>
if you are not contacted by sales in a period of 2 days please send an email to techsupport@rdataa.com for assistance </font></strong></font>
                <?php
     	$fillform = false;
     }
     // free memory
     pg_free_result($result);

     // close connection
     pg_close($dbh);

 if ($fillform) {

 ?>
                <table width="70%" border="0" cellspacing="30" cellpadding="0">
                  <tr>
                    <td> <font face="Times New Roman" size=4><strong><font size="5">Please fill the following form to place an order (you will receive a bill of statement as well as downloading and paying instructions): </font></strong></font>
                        <form action="<?php echo $_SERVER['../PHP_SELF']; ?>" method="post">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td align ="right">*Firstname: </td>
                              <td><input type="text" name="cfirstname" /></td>
                            </tr>
                            <tr>
                              <td align ="right">*Lastname:</td>
                              <td><input type="text" name="clastname" /></td>
                            </tr>
                            <tr>
                              <td align ="right">*Address1:</td>
                              <td><input type="text" name="caddress1" /></td>
                            </tr>
                            <tr>
                              <td align ="right">Address2:</td>
                              <td><input type="text" name="caddress2" /></td>
                            </tr>
                            <tr>
                              <td align ="right">*City:</td>
                              <td><input type="text" name="ccity" /></td>
                            </tr>
                            <tr>
                              <td align ="right">State:</td>
                              <td><input type="text" name="cstate" /></td>
                            </tr>
                            <tr>
                              <td align ="right">*Zip:</td>
                              <td><input type="text" name="czip" /></td>
                            </tr>
                            <tr>
                              <td align ="right">*Country:</td>
                              <td><input type="text" name="ccountry" /></td>
                            </tr>
                            <tr>
                              <td align ="right">email:</td>
                              <td><input type="text" name="cemail" /></td>
                            </tr>
                            <tr>
                              <td align ="right">Phone:</td>
                              <td><input type="text" name="cphone" /></td>
                            </tr>
                            <tr>
                              <td align ="right">*Username:</td>
                              <td><input type="text" name="cusername" /></td>
                            </tr>
                            <tr>
                              <td align ="right">*Password:</td>
                              <td><input type="password" name="cpassword" /></td>
                            </tr>
                            <tr>
                              <td align ="right">*Organization:</td>
                              <td><input type="text" name="corganization" /></td>
                            </tr>
                            <tr>
                            <tr>
                              <td align ="right">*Other Billing Data:</td>
                              <td><input type="text" name="payment" /></td>
                            </tr>
                            <tr>
                            <tr>
                              <td align ="right">*Number of Copies of AAnalyzer:</td>
                              <td><input type="text" name="copies" /></td>
                            </tr>
                            <tr>
                              <td rowspan="2">* Required Field (please remember username and password )</td>
                              <td><input type="submit" name="submit" /></td>
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
					<a href="../index.html">home</a>
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