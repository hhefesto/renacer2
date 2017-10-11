<?php

/*
	Aqui poner todo tu codigo para guardar el usuario y el pedido en la BD.
	Si hay un error lo puedes devolver a la web anterior asi:
	header("Location: http://tuweb.com/pagina.php");
	exit;
	
	debes tambien obtener el ID del registro creado en la BD y ponerlo en sesion.
	y, por ejemplo, en esta variable
	$user_id = ....
*/


$PayPalData = array();
$PayPalData[0] = "cmd=_xclick";
$PayPalData[1] = "upload=1";
$PayPalData[2] = "business=tu@cuenta_paypal.com";   //cambia esto
$PayPalData[3] = "currency_code=EUR";//cambia esto
$PayPalData[4] = "return=".urlencode("http://www.tuweb.com/gracias.php");//cambia esto
$PayPalData[5] = "cancel=".urlencode("http://www.tuweb.com/anterior.html");//cambia esto
$PayPalData[6] = "notify_url=".urlencode("http://www.tuweb.com/ipn.php");//aqui esta el IPN
$PayPalData[7] = "custom=".urlencode($user_id); //el id q te dije antes (para q el ipn y tu reconozcan el origen del pago)
$PayPalData[8] = "amount=".urlencode($total); //cambia esto
$PayPalData[9] = "item_name=".urlencode($descripcion); //el nombre del pedido tipo "pago por x cosa"
$PayPalData[10] = "rm=2";			


$stringToSend = "?";
foreach( $PayPalData as $item ){
	$stringToSend.=$item."&";
}

header("Location: https://www.paypal.com/es/cgi-bin/webscr".$stringToSend);
exit;
?>
