<?PHP

$dbh = mysqli_connect('localhost', 'analizer', 'anapass', 'aanalizer');
if (!$dbh) {
    die('Could not connect: ' . mysqli_error($dbh));
    echo " Ask for support";
}

$username = mysqli_real_escape_string($dbh, $_POST['cusername']);
$passwd = mysqli_real_escape_string($dbh, $_POST['cpassword']);
$cdate =  mysqli_real_escape_string($dbh, $_POST['cdate']);
$autentica = mysqli_real_escape_string($dbh, $_POST['ses']);
$fechamd5 = md5(mysqli_real_escape_string($dbh, $_POST['cdate']));

$sql = "select count(customerid) from customer where username='$username' AND password='$passwd';";
$result = mysqli_query($dbh, $sql);
$row = mysqli_fetch_array($result, MYSQLI_BOTH);
if (!$result) {
    die("Error in SQL query: " . mysqli_error($dbh));
}

$versionL= false;

// Busca el Usuario
$sql = "select COUNT(customerid), MAX(customerid),MAX(product) from customer where username='$username' AND  password='$passwd';";
$result = mysqli_query($dbh, $sql);
$row = mysqli_fetch_array($result, MYSQLI_BOTH);
if (!$result) {
    die("Error in SQL query: " . mysqli_error($dbh));
}
if ( $row[0] <=0)  {
//   die("Login or Password Error: '$username'" );
    $ErrorPass=true;
} else {
    $customerid=$row[1];
    $product=trim($row[2]);
    $versionL=true;
}

$insertfmd5="";

if ($versionL) {    //PARA LAS VERSIONES CON LICENCIA
    // Busca el numero de Downloads
    $sql = "SELECT count(username) FROM customer,download WHERE customer.customerid = download.customerid AND username='$username';";
    $result = mysqli_query($dbh, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_BOTH);
    if (!$result) {
        die("Error in SQL query: " . mysqli_error($dbh));
    }
    // VARIABLES DE CONTADORES DE DESCARGAS
    $ACTUALCOUNT = $row[0];
    $MAXCOUNT = 1000;
    // New Download Recording the user
    if ( $ACTUALCOUNT == 0)  {
        $today = date("Ymd");
        $insertfmd5=$cdate;
        $remoteaddress = $_SERVER['REMOTE_ADDR'];
        $system_datetime = date("Y-m-d H:i:s");
        $sql = "insert into download (customerid,computerid,download_date,computer_ip, system_datetime) VALUES('$customerid','$autentica','$insertfmd5','$remoteaddress', '$system_datetime');";
        $result = mysqli_query($dbh, $sql);
        //Registra NUEVO USUARIO Y SU PRIMERA DESCARGA
        $file = fopen("/tmp/log-eval.txt", "a");
        fwrite($file, "<< NEW from:$customerid:$autentica:$insertfmd5>>\n");
        fclose($file);
    }
    else 
    {
        $sql="select download_date from download where customerid='$customerid' limit 1;";
        $result = mysqli_query($dbh, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_BOTH);
        $insertfmd5=trim($row[0]);

        $sql= "select download_date from download where customerid='$customerid';";
        $result = mysqli_query($dbh, $sql);
        $insertfmd5= trim($row[0]);
        // REGISTRA LAS DESCARGAS
        $file = fopen("/tmp/log-eval.txt", "a");
        fwrite($file, "<< DOWNLOAD from $customerid: $autentica $insertfmd5>>\n");
        fclose($file);
    }

    if (!$result) {
        die("Error in SQL Query: " . mysqli_error($dbh));
    }

}

// PARA LAS VERSIONES DE EVALUACION *******************************************************************************************

if (!$versionL)
{
    // Busca el numero de Downloads
    $sql = "SELECT count(username) FROM eval_customer,eval_download WHERE eval_customer.customerid = eval_download.customerid AND username='$username';";
    $result = mysqli_query($dbh, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_BOTH);
    if (!$result) {
        die("Error in SQL query: " . mysqli_error($dbh));
    }
    // VARIABLES DE CONTADORES DE DESCARGAS
    $ACTUALCOUNT = $row[0];
    $MAXCOUNT = 1000;
    // New Download Recording the user
    if ( $ACTUALCOUNT == 0) {
        $today = date("Ymd");
        $insertfmd5=$cdate;
        $remoteaddress = $_SERVER['REMOTE_ADDR'];
        $sql = "insert into eval_download (customerid,computerid,download_date,computer_ip) VALUES('$customerid','$autentica','$insertfmd5','$remoteaddress');";
        $result = mysqli_query($dbh, $sql);
//Registra NUEVO USUARIO Y SU PRIMERA DESCARGA
        $file = fopen("/tmp/log-eval.txt", "a");
        fwrite($file, "<< NEW EVAL from $customerid: $autentica $insertfmd5>>\n");
        fclose($file);
    }
    else {
        $sql="select download_date from eval_download where customerid='$customerid' limit 1;";
        $result = mysqli_query($dbh, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_BOTH);
        $insertfmd5=trim($row[0]);
//Registra NUEVO USUARIO Y SU PRIMERA DESCARGA
        $file = fopen("/tmp/log-eval.txt", "a");
        fwrite($file, "<< ++ $sql $insertfmd5>>\n");
        fclose($file);
    }

    $sql= "select download_date from eval_download where customerid='$customerid';";
    $result = mysqli_query($dbh, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_BOTH);
    $insertfmd5= trim($row[0]);

// REGISTRA LAS DESCARGAS
    $file = fopen("/tmp/log-eval.txt", "a");
    fwrite($file, "<< DOWNLOAD from EVAL $customerid: $autentica $insertfmd5>>\n");
    fclose($file);

    if (!$result) {
        die("Error in SQL Query: " . mysqli_error($dbh));
    }

//exit();
} // fin sin licencia

if ($versionL)
    $sql = "SELECT organization,userfullname FROM customer where username='$username' AND password='$passwd';";
else
    $sql = "SELECT city, firstname FROM eval_customer where username='$username' AND password='$passwd';";

$result = mysqli_query($dbh, $sql);
$row = mysqli_fetch_array($result, MYSQLI_BOTH);
$NAME=str_pad($row[0],32);
$COMPANY=str_pad($row[1],32);

$file = fopen("/tmp/log-eval.txt", "a");
fwrite($file, "<< *  $sql >>\n");
fclose($file);

mysqli_close($dbh);

$OutputFile = "/tmp/$product$autentica";
$base="cat /home/web/Documents/$product|sed 's/aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/$insertfmd5/'|sed 's/11111111111111111111111111111111/$COMPANY/'|sed 's/22222222222222222222222222222222/$NAME/'>$OutputFile";

$file = fopen("/tmp/log-eval.txt", "a");
fwrite($file,"<< ** $base>>\n");
fclose($file);

$output = shell_exec($base);
$fp = fopen($OutputFile,"r") ;
header( "Content-type: application/bin");
while (! feof($fp)) {
    $buff = fread($fp,4096);
    print $buff;
}

?>
