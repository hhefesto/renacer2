<!DOCTYPE HTML>
<!--  -->
<html><!-- InstanceBegin template="../Templates/Platilla2.dwt" codeOutsideHTMLIsLocked="false" -->
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
body,td,th {
	font-family: 'OpenSans-Light';
}
.Estilo1 {font-weight: bold}
-->
    </style>
    <!-- InstanceEndEditable -->
    
	
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
				<a href="../aanalyzer/aanaHome.htm" class="logo"><img src="../images/aana/logo.png" alt="" width="200" height="100" border="0"></a>
				<span class="tagline"> </span>
			</div>
			<ul>

<!-- InstanceBeginEditable name="menup" -->			
				<li class="selected"><a href="../aanaHome.htm">Home</a></li>	
				<li><a href="../aanaGet.htm">Getting AAnalyzer </a></li>
				<li><a href="../aanaManual.htm">Manual &amp; Support </a></li>	
				<li><a href="../aanaWhy.htm">Why AAnalyzer? </a></li>
				<li><a href="../aanaForum.htm">Forum &amp; Faqs</a></li>
				<li><a href="../aanaMore.htm"> Info </a></li>
<!-- InstanceEndEditable --></ul>
		</div>
	</div>
<!-- InstanceBeginEditable name="menuizq" -->		
<div id="body">
  <div class="section">
			<h2 class="Estilo1">AAnalyzer®</h2>
			<h2 class="Estilo1">&nbsp;            </h2>
	           <blockquote>
 
<?php
 // attempt a connection
  $dbh = pg_connect("host=localhost dbname=aanalizer user=analizer password=anapass");
  if (!$dbh) {
      die("Error in connection: " . pg_last_error());
  }



 // Prepare a Query


 $username = pg_escape_string($_POST['cusername']);
 $passwd = pg_escape_string($_POST['cpassword']);


  // execute query

  $sql = "select count(customerid) from customer where username='$username' AND password='$passwd';";
  $result = pg_query($dbh, $sql);
  $row = pg_fetch_array($result);
  if (!$result) {
      die("Error in SQL query: " . pg_last_error());
  }
  // iterate over result set print each row
//   echo "Debugeando SQL acceso a BD-> $sql";
   if ( $row[0] <=0)  {
							if (isset($_POST['submit'])) echo("<script>alert(\"Username or password is incorrect !\");</script>");
  ?>

<HTML>
<BODY>

 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
   <p>*<strong>Login::</strong> <BR> 
        <input type="text" name="cusername" > 
      
      <br>
      <strong>*Password:: </strong><BR> <input type="password" name="cpassword" > 
      <br>
     * Required Field<br>
        <input type="submit" name="submit">
</form>
<HR>
Known Issues: <BR>
vcl50.blp <BR>
"if you get an error related to vcl50.bpl, most likely the software was already installed in another computer using your login and password"

 <?php
} else {
 ?>
<HTML>
<BODY>
 <H1>Select the product you will be downloading </H1>
 <HR>
<A HREF="http://www.rdataa.com/aanalyzer/Download/setup.exe" > Use this link to download AAnalyzer Setup Installer </A>
 <?php
}
 ?>


</BODY>
</html>
 <?php
  // free memory
  pg_free_result($result);
  // close connection
  pg_close($dbh);
  ?>	
	
        
            
            </blockquote>
           
		   
		   
		   
		   
		   
		   
		   
		   
			
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