<?PHP
 require_once "Mail.php";

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
  $sql = "select count(customerid) from eval_customer where username='$username' AND
password='$passwd';";
  $result = pg_query($dbh, $sql);
  $row = pg_fetch_array($result);
  if (!$result) {
      die("Error in SQL query: " . pg_last_error());
  }
// Prepare a Query


// Busca el Usuario
  $sql = "select COUNT(customerid), MAX(customerid) from eval_customer where username='$username' AND
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
$product="AAnalyzer.exe";



// Busca el numero de Downloads
  $sql = "SELECT count(username) FROM eval_customer,eval_download WHERE eval_customer.customerid = eval_download.customerid AND username='$username';";
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
     $sql = "insert into eval_download (customerid,computerid,download_date,computer_ip) VALUES('$customerid','$autentica','$today','$remoteaddress');";
     $result = pg_query($dbh, $sql);
     }
   else {

     $sql = "select count (computerid) FROM eval_download where customerid='$customerid' and computerid ='$autentica';";
     $result = pg_query($dbh, $sql);
     $row = pg_fetch_array($result);
     if ( $row[0] != 1 ) {
        if ( $ACTUALCOUNT >= $MAXCOUNT)  {
           echo "Error License already Used";
           die("");
           }
        $today = date("Ymd");
        $remoteaddress = $_SERVER['REMOTE_ADDR'];
        $sql = "insert into eval_download (customerid,computerid,download_date,computer_ip) VALUES('$customerid','$autentica','$today','$remoteaddress');";
        $result = pg_query($dbh, $sql);
        }



     }

  if (!$result) {
      die("Error in SQL Query: " . pg_last_error());
  }




// execute query
  $dbh = pg_connect("host=localhost dbname=aanalizer user=analizer password=anapass");
  $sql = "SELECT organization,CONCAT(CONCAT( firstname ,cast(' ' as varchar)), lastname) FROM eval_customer where username='$username' AND password='$passwd';";
  $result = pg_query($dbh, $sql);
  $row = pg_fetch_array($result);
$NAME=str_pad($row[0],32);
$COMPANY=str_pad($row[1],32);
$remoteaddress = $_SERVER['REMOTE_ADDR'];

      // Download Exitoso notificar a Ventas. techsupport.del Download
      $from = "TechSupport Service <techsupport@rdataa.com>";
      //$to = "Alberto Herrera <albertoherreragomez@prodigy.net.mx>";
      $to = "notification@rdataa.com";


      $subject = "Nuevo Download de producto";
      $message = "Hola Ventas El Usuario" .$NAME ." ha creado realizado el download de AAnalizer,\n";
      $message .="Es que pasas unas semanas lo contactes para realizar un seguimiento \n";
      $message .="el siguienento consiste en obtener opciones definir precios realizar propuestas\n";
      $message .="los datos del usuario de evaluaci�n son:\n";
      $message .="Nombre :".$NAME ." \n";
      $message .="Compa�ia :".$COMPANY ."\n";
      $message .="IP Remota :".$remoteaddress ." \n";
      $message .="Localizaci�n del Cliente basado en IP : http://www.geoiptool.com/es/?IP=".$remoteaddress ."\n";
      $message .= "Este es un mensaje generado automaticamente por sistema.\n";
      $host = "smtp.gmail.com";
	  $username = "techsupport@rdataa.com";
	  $password = "rddulce01";


      // Correo a Ventas

	  $headers = array ('From' => $from,
	    'To' => $to,
	    'Subject' => $subject);
	  $smtp = Mail::factory('smtp',
	    array ('host' => $host,
	      'auth' => true,
	      'username' => $username,
	      'password' => $password));
      $mail = $smtp->send($to, $headers, $message);







$OutputFile = "/tmp/$product$autentica";
//$base="cat /home/web/Documents/AAnalyzer.exe|sed 's/aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/$autentica/'>$OutputFile";
$base="cat /home/web/Documents/trialAAnalyzer.exe|sed 's/11111111111111111111111111111111/$COMPANY/'|sed 's/22222222222222222222222222222222/$NAME/'>$OutputFile";
$output = shell_exec($base);
$fp = fopen($OutputFile,"r") ;
header( "Content-type: application/bin");
while (! feof($fp)) {
       $buff = fread($fp,4096);
       print $buff;
       }
?>
