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
				<h2 class="Estilo1">Getting a single license</h2>
<?php 


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
 
 require_once "Mail.php";
// $fillform = true;

	
	if ($_POST['sel']!=1) {
		
	echo '				<h2>Step 2. Fill the following form </h2>
						  <form action="LicensedS3.php" method="POST" >
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
								<td  height="29" align ="right">*Number of licenses:</td>
								<td><input type="text" name="copies"><input type="hidden" name="sel" value="'.$_POST['sel'].'"></td>
							  </tr>
							  <tr>
							  
							  <tr>
							  
							  <tr>
								<td rowspan="3">&nbsp;</td>
								<td></td>
							  </tr>
							  <tr>
								<td><div align="left">
							';						

					  echo recaptcha_get_html($publickey, $error);
				
					  echo '<br> <input name="submit2" type="submit" value="Proceed to ordering" />
								</div></td></tr>
							  <tr>
								<td>&nbsp;</td>
							  </tr>
							</table>	
							</form>
		
	';	
		
		
	}
	if ($_POST['sel']==1) {
	
	echo ' <br><h2>Step 2. Pay with credit card or Paypal. </h2>
	please enter the number of licenses and click on "Proceed to ordering"
	
	<p>&nbsp;</p>
<form name="form1" method="POST" action="LicensedS3.php">
  <table width="100" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>Email:</td>
      <td><input name="ccorreo" type="text" id="ccantidad2"></td>
    </tr>
    <tr>
      <td>Licenses:</td>
      <td><input name="ccantidad" type="text" size="5" maxlength="3"></td>
	
    </tr>
  </table><br>
  <p>Please note that paying with a credit card requires having or creating a PayPal account. The option of creating a PayPal account, if you do not have one, will be provided when you click on Proceed to ordering</p>
  <p>&nbsp;</p>';
  
		
echo recaptcha_get_html($publickey, $error);


echo ' 

 <p>&nbsp;</p><p><input name="paga" type="submit" id="paga" value="Proceed to ordering ">
  <input type="hidden" name="sel" value="'.$_POST['sel'].'">
  </p>
</form>



	';



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
