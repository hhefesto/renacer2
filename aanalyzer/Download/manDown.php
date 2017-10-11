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
			<h2 class="Estilo1">AAnalyzer®: Manual License.</h2>
			<h2 class="Estilo1">&nbsp;            </h2>
			<?php
 require_once "Mail.php";


     	?>
        
            <blockquote>
              <h3>Please use this form to download the product</h3>
            </blockquote>
            <form action="activator.php" method="post">
 <table width="46%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td>*Username:</td>
        <td><input type="text" name="cusername" /></td>
      </tr>
      <tr>
        <td>*Password:</td>
        <td><input type="password" name="cpassword" /></td>
      </tr>
      <tr>
        <td>
<?php
if( $_GET["ses"]  )
  {
     echo " ";
  }
else
  {
     echo "*Serial number";
  }
?>

</td>
        <td>

<?php
if( $_GET["ses"]  )
  {
     echo "<input type=hidden name=ses value=". $_GET['ses']." >";
  }
else 
  {
     echo "<input type=\"text\" name=\"ses\" />";
  }
?>

</td>
      </tr>
      <tr>
        <td rowspan="2">* Required Field <br>(please remember username and password )</td>
        <td><input type="submit" name="submit" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
  </table>
</form>
			
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