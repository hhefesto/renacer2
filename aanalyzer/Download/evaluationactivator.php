<?PHP
 $computer = pg_escape_string($_POST['valcomp']);
 $autentica = pg_escape_string($_POST['valkey']);
 $mensaje = "Your Product Will Expire in 10 Days";
 $base= "echo Computer  $computer Autenticacion $autentica >>/tmp/authlog.log";
$output = shell_exec($base);
// attempt a connection
 $dbh = pg_connect("host=localhost dbname=aanalizer user=analizer password=anapass");
     if (!$dbh) {
     	 print "$autentica\n";
         die();
     } 
 // execute query
 $sql = "update eval_download set usagetimes = usagetimes + 1 where computerid  ='$computer'";
 $result = pg_query($dbh, $sql);
 if (!$result) {
     print "EXPIRED\n Your trial Software has expired";
     die(); 	
     }

     // Busca el Usuario
  $sql = "select usagemax - usagetimes from eval_download where computerid  ='$computer'";
  $result = pg_query($dbh, $sql);
  $row = pg_fetch_array($result);
  if (!$result) {
     print "$autentica\n";
     die();
  }
// iterate over result set print each row
  if ( $row[0] <=0)  {
     print "EXPIRED\n Your trial Software has expired due Max Ussage";
     die();  
  }     
     
     
header( "Content-type: application/bin");
       print "$autentica\n";
       print "$mensaje \nla compu es: $computer";
?>
