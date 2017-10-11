<form name="_xclick" action="https://www.paypal.com/cgi-bin/webscr" method="post">
		<input type="hidden" name="cmd" value="_xclick">
		<input type="hidden" name="business" value="mail@paypal.com"> <!-- Tu email -->
		<input type="hidden" name="currency_code" value="EUR"> <!-- la divisa -->
		<input type="hidden" id="orderName" name="item_name" value="Pedido x"> <!-- El nombre de tu pedido, lo que quieras -->
		<input type="hidden" id="orderTotal" name="amount" value="<?php echo $total?>"> <!-- Esto se cambia por el valor total -->
		<input type="hidden" id="orderTotal" name="custom" value="<?php echo $idPedido?>"> <!-- Esto se cambia por el id del pedido -->
		
		<input type="hidden" name="return" value="http://tuweb.com/gracias.php"> <!-- Página de retorno -->
		<input type="hidden" name="cancel_return" value="http://www.tuweb.com/carrito.php">  <!-- en caso de que cancele -->
		<input type="hidden" name="notify_url" value="http://www.tuweb.com/ipn.php"> <!-- IPN -->
		
		<input type="image" src="http://www.paypal.com/es_XC/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
</form>
