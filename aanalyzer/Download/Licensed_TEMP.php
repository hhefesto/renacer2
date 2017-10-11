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
                      <p align="justify" class="Estilo2"><br>
                        <br>
                        The licensed version, once installed, wiil no require internet connection to work. The software runs on MS Windows. Mac users require a Windows simulator. </p>                      
                      
                        
                    </td>
                  </tr>
              </table>
				<?php
 
if (isset($_POST["delivery"])) { 
	$delivery=100; 
	
	} 
	else {
	$delivery=0; 
	}
$costo=1;
$num=  $_POST["quantity"];
switch ($num) {
	case 0:
        $costo=700;
        break;
	case 1:
        $costo=700+$delivery;
        break;
    case 2:
        $costo=1200+$delivery;
        break;
    case 3:
        $costo=1500+$delivery;
        break;
    case 4:
        $costo=1700+$delivery;
        break;
    default:
        $costo= $num * ($num-4) * 100 +1700+$delivery;
        break;
}
 ?>
                <table width="100%" border="0" cellspacing="10" cellpadding="0">
                  <tr> 
                    <td>
<form name="formc" method="POST" action="Licensed.php">
             
              </p> 
              <h2>Step 1: Calculate </h2>
              <table width="320" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr bgcolor="#000000">
                            <td width="40%"><span class="Estilo6">Software:</span></td>
                            <td width="30%"><span class="Estilo6">Quantity</span></td>
                            <td width="30%"><span class="Estilo6">with Delivery</span></td>
                          </tr>
                          <tr>
                            <td>AAnalyzer</td>
                            <td><input name="quantity" type="text" value="<?php echo $_POST["quantity"]; ?>" size="5" maxlength="2">
                            <input type="hidden" name="amount" value="<?php echo $costo; ?>" ></td>
							
                            <td><input name="delivery" type="checkbox" id="delivery" value="checkbox" <?php if (isset($_POST["delivery"])) { echo "checked"; } ?> ></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td><div align="right"></div></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td><div align="right">delivery:</div></td>
                            <td>
                              <div align="center"><?php echo $delivery; ?> usd </div>                            </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td><div align="right"><strong>Total Amount: </strong></div></td>
                            <td>
                              <div align="center"><strong><?php echo $costo; ?>  </strong>usd</div>
                            <div align="right"></div></td>
                </tr>
              </table>
              <p>&nbsp;              </p>
    <p align="center">
                          <input type="submit" name="calculate" value="Calculate">
                          <br>
    </p>
                      </form>  
					  <?php
					  if (isset($_POST["calculate"])) {
						echo '	  <form name="form1" method="post" action="LicensedS2.php">
								<div align="center">
								  <h2 align="left">Step 2: Continue </h2>
								  <p>
									<input name="next" type="submit" id="next" value="Next &gt;&gt;">
									<input name="quantity" type="hidden" value="'.$_POST["quantity"].'">		
									<input name="amount" type="hidden" value="'.$costo.'">		      
								  </p>
								</div>
							  </form>
							  ';
					   }
					  ?>
					  <p>&nbsp;			          </p>
					  <p>&nbsp;				      </p>
					  <p>			            <br>
			            <br>                     
                      </p>
					  <p><strong>Group-License</strong><br>
      If you are part of a group with multiple users of AAnalyzer, RDATAA encourages that every member obtain a copy of the software by offering the <strong><a href="mailto:sales@rdataa.com?please%20send%20me%20a%20quotation%20for%20a%20Group-License%20of%20AAnalyzer%20for%20%22n%22%20users">Group-License</a></strong> option. If you get (on already have) an AAnalyzer License, you could upgrade it to a <strong><a href="mailto:sales@rdataa.com?please%20send%20me%20a%20quotation%20for%20a%20Group-License%20of%20AAnalyzer%20for%20%22n%22%20users">Group-License</a></strong> later on<strong>.<br>
      </strong>
                                            </td>
                  </tr>
              </table>
            
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
