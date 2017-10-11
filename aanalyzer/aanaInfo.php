<!DOCTYPE HTML>
<!--  -->
<html><!-- InstanceBegin template="/Templates/Platilla2.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
	<meta charset="UTF-8">
	<!-- InstanceBeginEditable name="doctitle" -->
	<title>RDATAA.COM</title>
	<!-- InstanceEndEditable --><link rel="stylesheet" href="css/style.css" type="text/css">
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
.Estilo3 {color: #FF0000}
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
				<a href="aanaHome.htm" class="logo"><img src="images/aana/logo.png" alt="" width="200" height="100" border="0"></a>
				<span class="tagline"> </span>
			</div>
			<ul>

<!-- InstanceBeginEditable name="menup" -->			


				<li><a href="aanaHome.htm">Home</a></li>	
				<li><a href="aanaGet.htm">Getting AAnalyzer </a></li>
				<li><a href="aanaManual.htm">Manual &amp; Support </a></li>	
				<li><a href="aanaWhy.htm">Why AAnalyzer? </a></li>
				<li><a href="aanaForum.htm">Forum &amp; Faqs</a></li>
				<li class="selected"><a href="aanaMore.htm"> Info </a></li>

				
<!-- InstanceEndEditable --></ul>
		</div>
	</div>
<!-- InstanceBeginEditable name="menuizq" -->		
	<div id="body">

		<div id="content">

			<div id="sidebar">
	
				<h3>/home/info</h3>
			  <ul>
					<li >
						<a href="aanaMore.htm">More </a>
						<ul>
							<li>
								<a href="aanaNews.htm">News </a></li>
							<li> <a href="aanaCourses.htm">Courses </a></li>
							<li> <a href="aanaEventsEven.htm">Related Events </a></li>
							<li class="selected"> <a href="aanaInfo.php">Contact Information </a></li>
						</ul>
				</li>
			    <li class="selected collapse">				  </li>
			  </ul>
		  </div>
			<div id="section">
				<h2 class="Estilo1">Contact Information </h2>
				<p>
 <br>
 <span class="article">Pascual Orozco 909-18, Col. San Felipe </span></p>
		  <p class="article">Chihuahua, Chihuahua, C.P. 31203, Mexico &#13;</p>
		        <p class="article">Phone +052 614 423 5004 Fax +052 614 423 5004 <br>
		        </p>
		        <p><span class="article"><strong>Email us:</strong><br>
		          admin @ rdataa.com<br>
		          sales @ rdataa.com<br>
	          techsupport @ rdataa.com</span></p>
		        <p>&nbsp;</p>
		        <p>or send us a message <br>
		        </p>

 
 
		         
<?php

		require_once('recaptchalib.php');
		
		// Get a key from https://www.google.com/recaptcha/admin/create
		
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
	
		if ($_POST["recaptcha_response_field"]) {
				$resp = recaptcha_check_answer ($privatekey,
												$_SERVER["REMOTE_ADDR"],
												$_POST["recaptcha_challenge_field"],
												$_POST["recaptcha_response_field"]);
		
				if ($resp->is_valid) {
							 echo '
							<span class="Estilo3"><strong>Your request was Successfully created!<strong>
							Thanks for your questions. If you are not receiving a reply in a period of 2 days please send an email to techsupport@rdataa.com for assistance </span><br> 
							';
							require_once "Mail.php";
							$fillform = true;
							if ($_POST['submit']) {
							 // escape strings in input data
							 $faqtext    = pg_escape_string($_POST['textfield']);
							 // Informacion capturada exitosamente
							 $from = "TechSupport Service <techsupport@rdataa.com>";
							 $to = "Ventas <grivera@rdataa.com>";
							 
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
							
						}
				} else {
						# set the error code so that we can display it
						$error = $resp->error;
						echo("<script>alert(\"Write the correct CAPTCHA code !\");history.go(-1)</script>");
				}
				
		}
?>
		        <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		          
		            <p><textarea name="textfield" cols="65" rows="10" ><?php echo $_POST['textfield'];?></textarea></p>

<?php		
		echo recaptcha_get_html($publickey, $error);
?>
<br>
		          <p>
		            <input type="submit" name="submit" value="Send">
                  </p>
				  
				  
		        </form>

		        <p><br>
              </p>
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
					<a href="index.html">Home</a>
				</li>
				<li>
					<a href="aanaHome.htm"> Aanalyzer</a>
				</li>
				<li>
					<a href="aanaInfo.htm"> Contact Information</a>
				</li>

			</ul>
			<div>
				<span>.</span>
			</div>
		</div>
	</div>
</body>
<!-- InstanceEnd --></html>
