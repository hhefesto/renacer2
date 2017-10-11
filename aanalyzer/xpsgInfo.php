<!DOCTYPE HTML>
<!--  -->
<html><!-- InstanceBegin template="/Templates/PlatillaGeo.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
	<meta charset="UTF-8">
	<!-- InstanceBeginEditable name="doctitle" -->
	<title>RDATAA.COM</title>
	<!-- InstanceEndEditable --><link rel="stylesheet" href="css/style2.css" type="text/css">
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
.Estilo2 {font-family: Verdana, Arial, Helvetica, sans-serif}
-->
    </style>
    <!-- InstanceEndEditable -->
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
				<a href="aanaHome.htm" class="logo"><img src="images/xpsg/logo.png" alt="" width="200" height="100" border="0"></a>
				<span class="tagline"> </span>
			</div>
			<ul>

<!-- InstanceBeginEditable name="menup" -->			
				<li class="selected"><a href="xpsgHome.htm">home</a></li>	
				<li ><a href="xpsgInfo.php"> Contact information </a></li>
				<li></li>
		  <!-- InstanceEndEditable --></ul>
		</div>
	</div>
<!-- InstanceBeginEditable name="menuizq" -->		
	<div id="body">

		<div id="content">

			<div id="sidebar">
	
				<h3>/home/</h3>
				<ul>
					<li >
						<a href="">Home</a>
						<ul>
							
							<li>
								<a href="xpsgHome.htm">XPSGeometry</a></li>
							<li class="selected">
								<a href="">Contact information</a></li>
						</ul>
					</li>
					
					<li class="selected collapse">
						
						<ul>
							
							
					  </ul>
					</li>
			  </ul>
			</div>
			<div id="section">
				<h2 class="Estilo1 Estilo2">Contact Information </h2>
		        <p class="Estilo2"> <br>
                    <span class="article">Pascual Orozco 909-18, Col. San Felipe </span></p>
		        <p class="article Estilo2">Chihuahua, Chihuahua, C.P. 31203, Mexico &#13;</p>
		        <p class="article Estilo2">Phone +052 614 423 5004 Fax +052 614 423 5004 <br>
                </p>
		        <p class="Estilo2"><span class="article"><strong>Email us:</strong><br>
  admin @ rdataa.com<br>
  sales @ rdataa.com<br>
  techsupport @ rdataa.com</span></p>
		        <p class="Estilo2">&nbsp;</p>
		        <p class="Estilo2">or send us a message <br>
                </p>
		        <span class="Estilo2">
                <?php
    require_once "Mail.php";
    $fillform = true;
    if ($_POST['submit']) {
     // escape strings in input data
     $faqtext    = pg_escape_string($_POST['ContactText']);
     // Informacion capturada exitosamente
     $from = "TechSupport Service <techsupport@rdataa.com>";
     //$to = "Ventas <grivera@rdataa.com>";
     $to = "Ventas <mario.rendon@gmail.com>";
     $subject = "Nueva Entrada en el Contact Entry";
     $message = "Hola hay una nueva entrada en el Contact ,\n";
     $message .="Nombre :".$faqtext  ."\n";
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
                Your request was Successfully created! <BR>
thanks for your questions <BR>
if you are not receiving a reply in a period of 2 days please send an email to techsupport@rdataa.com for assistance </span>
                <span class="Estilo2">
                <?php
     	$fillform = false;
        }
       if ($fillform) {
    ?>
                </span>              
                <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                  <p>
                    <textarea name="textfield" cols="65" rows="10"></textarea>
                  </p>
                  <p>&nbsp; </p>
                  <p>
                    <input type="submit" name="submit" value="Send">
                  </p>
                </form>
                <?php } ?>
                <p></p>
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
					<a href="xpsgHome.htm">home</a>
				</li>
				<li>
					<a href="xpsgHome.htm"> XPSGeometry </a>
				</li>
				<li>
					<a href="aanaInfo.php"> Contact Information</a>
				</li>

			</ul>
			<div>
				<span>.</span>
			</div>
		</div>
	</div>
</body>
<!-- InstanceEnd --></html>