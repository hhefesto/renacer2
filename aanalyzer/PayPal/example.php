<?
require_once('recaptchalib.php');
$captcha_publickey = "6LdLyOYSAAAAAB_dgivMUDMyZitTBQNnflzKqlAu";
$captcha_privatekey = "6LdLyOYSAAAAAKpV9HYTA8vI-8wxdtuSlTlAIf7T";
$error_captcha=null;
?>

<form action="example.php" method="post">
Nombre: <input type="text" name="nombre" size="30">
<br>
Edad: <input type="text" name="edad" size="3">
<br>
<?
echo recaptcha_get_html($captcha_publickey, $error_captcha);
?>
<br>
<input type="submit" value="Enviar">
</form>
