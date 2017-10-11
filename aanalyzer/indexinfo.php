<!DOCTYPE HTML>
<!--  -->
<html>
<head>
	<meta charset="UTF-8">
	<title>RDATAA.COM</title>
	<link rel="stylesheet" href="css/styleIndex.css" type="text/css">
	<!--[if IE 7]>
		<link rel="stylesheet" href="css/ie7.css" type="text/css">
	<![endif]-->
    <style type="text/css">
<!--
.Estilo2 {font-family: Verdana, Arial, Helvetica, sans-serif}
.Estilo3 {color: #FF0000}
.Estilo13 {color: #000000}
-->
    </style>
</head>
<body>
	<div id="header">
	  <div>
			<div>
				<span> </span>
				<a href="index.html" class="logo"><img src="images/logoOri.png" alt="" width="200" height="100"></a>
				<span class="tagline"> </span>
			</div>
			<ul>
				<li>
					<a href="index.html">home</a> 
				</li>
				
				<li class="selected">
					<a href="indexinfo.php">about</a>
				</li>
				
			</ul>
		    <h2 class="Estilo1">Contact Information </h2>
	    <p> <br>
	      <br>
          Pascual Orozco 909-18, Col. San Felipe <br>
          Chihuahua, Chihuahua, C.P. 31203, Mexico<br>
          Phone +052 614 423 5004 Fax +052 614 423 5004 </p>
		    Email us or send us a message:</strong><br>
  admin @ rdataa.com<br>
  sales @ rdataa.com<br>
  techsupport @ rdataa.com
  <p>
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
if you are not receiving a reply in a period of 2 days please send an email to techsupport@rdataa.com for assistance
          <?php
     	$fillform = false;
        }
       if ($fillform) {
    ?>
        </p>
		    <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <p>
                <textarea name="textfield" cols="65" rows="10"></textarea>
              </p>
              
              <p>
                <input type="submit" name="submit" value="Send">
              </p>
            </form>
            <?php } ?>
<p>&nbsp;</p>
	  </div>
	</div>
	
	<div id="footer">
		<div>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>
			    www.rdataa.com</p>
			<ul>
				<li>
					<a href="index.html">home</a>
				</li>
				<li>
					<a href="#">about</a>
				</li>
			</ul>
			<div>
				<span>You are: /home </span>
			</div>
	  </div>
	</div>
</body>
</html>