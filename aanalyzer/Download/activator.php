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
.Estilo4 {
	font-size: 12px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
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
				<a href="../aanalyzer/aanaHome.htm" class="logo"><img src="../images/aana/logo.png" alt="" width="200" height="100" border="0"></a>
				<span class="tagline"> </span>
			</div>
			<ul>

<!-- InstanceBeginEditable name="menup" -->			
				<li class="selected"><a href="aanaHome.htm">Home</a></li>	
				<li><a href="aanaGet.htm">Getting AAnalyzer </a></li>
				<li><a href="aanaManual.htm">Manual &amp; Support </a></li>	
				<li><a href="aanaWhy.htm">Why AAnalyzer? </a></li>
				<li><a href="aanaForum.htm">Forum &amp; Faqs</a></li>
				<li><a href="aanaMore.htm"> Info </a></li>
<!-- InstanceEndEditable --></ul>
		</div>
	</div>
<!-- InstanceBeginEditable name="menuizq" -->		
<div id="body">
  <div class="section">
			
			  <h2 class="Estilo1">AAnalyzer: Manual License</h2>
<blockquote>
			<?PHP


// attempt a connection
 $dbh = pg_connect("host=localhost dbname=aanalizer user=analizer password=anapass");
  if (!$dbh) {
      die("DataBase error: " . pg_last_error());
      echo " Ask for support";
  }
// Prepare a Query
 $username = pg_escape_string($_POST['cusername']);
 $passwd = pg_escape_string($_POST['cpassword']);
 $autentica = pg_escape_string($_POST['ses']);
// execute query
  $sql = "select count(customerid) from customer where username='$username' AND
password='$passwd';";
  $result = pg_query($dbh, $sql);
  $row = pg_fetch_array($result);
  if (!$result) {
      die("Error in SQL query: " . pg_last_error());
  }
// Prepare a Query


// Busca el Usuario
  $sql = "select COUNT(customerid), MAX(customerid),MAX(product) from customer where username='$username' AND
password='$passwd';";
  $result = pg_query($dbh, $sql);
  $row = pg_fetch_array($result);
  if (!$result) {
      die("Error in SQL query: " . pg_last_error());
  }
// iterate over result set print each row
   if ( $row[0] <=0)  {
 die("Login or Password Error: '$username'" );
}
$customerid=$row[1];
$product=trim($row[2]);



// Busca el numero de Downloads
  $sql = "SELECT count(username) FROM customer,download WHERE customer.customerid = download.customerid AND username='$username';";
  $result = pg_query($dbh, $sql);
  $row = pg_fetch_array($result);
  if (!$result) {
      die("Error in SQL query: " . pg_last_error());
  }

// VARIABLES DE CONTADORES DE DESCARGAS
  $ACTUALCOUNT = $row[0];
  $MAXCOUNT = 1;
// New Download Recording the user
   if ( $ACTUALCOUNT == 0)  {
     $today = date("Ymd");
     $remoteaddress = $_SERVER['REMOTE_ADDR'];
     $sql = "insert into download (customerid,computerid,download_date,computer_ip) VALUES('$customerid','$autentica','$today','$remoteaddress');";
     $result = pg_query($dbh, $sql);
     }
   else {






     $sql = "select count (computerid) FROM download where customerid='$customerid' and computerid ='$autentica';";
     $result = pg_query($dbh, $sql);
     $row = pg_fetch_array($result);
     if ( $row[0] != 1 ) {
        if ( $ACTUALCOUNT >= $MAXCOUNT)  {
           echo "Error License already Used";
           die("");
           }
        $today = date("Ymd");
        $remoteaddress = $_SERVER['REMOTE_ADDR'];
        $sql = "insert into download (customerid,computerid,download_date,computer_ip) VALUES('$customerid','$autentica','$today','$remoteaddress');";
        $result = pg_query($dbh, $sql);
        }



     }

  if (!$result) {
      die("Error in SQL Query: " . pg_last_error());
  }




// execute query
  $dbh = pg_connect("host=localhost dbname=aanalizer user=analizer password=anapass");
  $sql = "SELECT organization,userfullname FROM customer where username='$username' AND password='$passwd';";
  $result = pg_query($dbh, $sql);
  $row = pg_fetch_array($result);
$NAME=str_pad($row[0],32);
$COMPANY=str_pad($row[1],32);

$OutputFile = "/tmp/$product$autentica";
//$base="cat /home/web/Documents/AAnalyzer.exe|sed 's/aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/$autentica/'>$OutputFile";
$base="cat /home/web/Documents/$product|sed 's/aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/$autentica/'|sed 's/11111111111111111111111111111111/$COMPANY/'|sed 's/22222222222222222222222222222222/$NAME/'>$OutputFile";
$output = shell_exec($base);


$fp = fopen($OutputFile,"r") ;
header( "Content-type: application/bin");
while (! feof($fp)) {
       $buff = fread($fp,4096);
       print $buff;
       }
?>
  </div>
    </blockquote>
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
