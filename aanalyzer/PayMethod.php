
<?php

if (isset($_GET["select"]))
{

		//echo("<script>history.go(-1)</script>");
		echo "HOLA";
	
}

echo '

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
				<li class="selected">
					<a href="index.html">home</a> 
				</li>
				
				<li>
					<a href="indexinfo.php">about</a>
				</li>
				
			</ul>
		<p>&nbsp;</p>
	  </div>
	</div>
	<div id="body">
		<div class="header">
			<div>
			  <p><img src="images/paypal.jpg" width="200" height="122" align="left"></p>
			  <p>&nbsp;</p>
			  <h2> software purchase </h2>
			  <form name="form1" method="get" action="pay.php">
<table width="510" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="287"><strong>Software or service </strong></td>
                    <td width="81"><strong> 
                    Quantity</strong></td>
                    <td width="87"><strong> Delivery </strong></td>
                  </tr>
                  <tr>
                    <td><select name="select">
                      <option value="1" ';
						if ($_GET["select"]==1)
						{ echo " selected ";
						}
					echo '>AAnalyzer License or Licenses</option>
                    <option value="2" ';
						if ($_GET["select"]==2)
						{ echo " selected ";
						}
					echo '>Special amount. Requires code number.</option>
                    </select></td>
                    <td><input name="textfield" type="text" size="5" maxlength="2" value="'.$_GET["textfield"].'"></td>
                    <td><input type="checkbox" name="checkbox" value="checkbox" ';

$delivery=0;
if (isset($_GET["checkbox"])) {
	echo "checked";
	$delivery=100;
}					
					
					echo '></td>
                  </tr>

';

if (isset($_GET["Submit"]))
{
		echo '
						  <tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td><p align="right"><span class="Estilo1" >Total amount </span></p></td>
							<td colspan="2"><p align="center">USD ';
/*1 license 700 dlls
2 licences 1200 dlls
3 1500 dlls
4 1700 dlls
n licences: n (n-4)*100 + 1700
*/

$costo=1;
$num=  $_GET["textfield"];
switch ($num) {
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

echo $costo;							
							
echo 						'</p></td>
						  </tr>
		
		';
}

echo '
                </table><p align="center">
  <input type="submit" name="Submit" value="Calculate">
  
  
</p>
			    <p><br>
                </p>
			  </form>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			</div>
		    <p>&nbsp;</p>
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



';

?>
