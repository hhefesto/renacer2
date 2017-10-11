	<?php
///////Start of Authorization
$realm = 'Autorization required';
$users = array('admin' => '789+63.' , 'mario' => '789+63.');

if (empty($_SERVER['PHP_AUTH_DIGEST'])) {
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Digest realm="'.$realm.
           '",qop="auth",nonce="'.uniqid().'",opaque="'.md5($realm).'"');

    die('Area Restringida.');
}
if (!($data = http_digest_parse($_SERVER['PHP_AUTH_DIGEST'])) ||
    !isset($users[$data['username']]))
    die('Datos Erroneos!');


// Generando una respuesta valida
$A1 = md5($data['username'] . ':' . $realm . ':' . $users[$data['username']]);
$A2 = md5($_SERVER['REQUEST_METHOD'].':'.$data['uri']);
$valid_response = md5($A1.':'.$data['nonce'].':'.$data['nc'].':'.$data['cnonce'].':'.$data['qop'].':'.$A2);

if ($data['response'] != $valid_response)
    die('Datos Erroneos!');

function http_digest_parse($txt)
{
    // proteger contra datos perdidos
    $needed_parts = array('nonce'=>1, 'nc'=>1, 'cnonce'=>1, 'qop'=>1, 'username'=>1, 'uri'=>1, 'response'=>1);
    $data = array();
    $keys = implode('|', array_keys($needed_parts));

    preg_match_all('@(' . $keys . ')=(?:([\'"])([^\2]+?)\2|([^\s,]+))@', $txt, $matches, PREG_SET_ORDER);

    foreach ($matches as $m) {
        $data[$m[1]] = $m[3] ? $m[3] : $m[4];
        unset($needed_parts[$m[1]]);
    }

    return $needed_parts ? false : $data;
}
////////End of Authorization



 if ($_POST['submit']) {
     // attempt a connection
     $dbh = pg_connect("host=localhost dbname=aanalizer user=analizer password=anapass");
     if (!$dbh) {
         die("Error in connection: " . pg_last_error());
     }

     // escape strings in input data

;
     $firstname = pg_escape_string($_POST['cfirstname']);
     $lastname = pg_escape_string($_POST['clastname']);
     $address1 = pg_escape_string($_POST['caddress1']);
     $address2 = pg_escape_string($_POST['caddress2']);
     $city = pg_escape_string($_POST['ccity']);
     $state = pg_escape_string($_POST['cstate']);
     $zip = pg_escape_string($_POST['czip']);
     $country = pg_escape_string($_POST['ccountry']);
     $email = pg_escape_string($_POST['cemail']);
     $phone = pg_escape_string($_POST['cphone']);
     $creditcardtype = pg_escape_string($_POST['ccreditcardtype']);
     $creditcard = pg_escape_string($_POST['ccreditcard']);
     $creditcardexpiration = pg_escape_string($_POST['ccreditcardexpiration']);
     $username = pg_escape_string($_POST['cusername']);
     $password = pg_escape_string($_POST['cpassword']);
     $organization =  pg_escape_string($_POST['corganization']);
     $userfullname =  pg_escape_string($_POST['cuserfullname']);
     $product =  pg_escape_string($_POST['cproduct']);



     // execute query
     $sql = "INSERT  into customer (firstname,lastname,address1,address2,city,state,zip,country,email,phone,creditcardtype,creditcard,creditcardexpiration,username,password,organization,userfullname,product) VALUES ( '$firstname' ,'$lastname','$address1','$address2','$city','$state','$zip','$country','$email','$phone','$creditcardtype','$creditcard','$creditcardexpiration','$username','$password','$organization','$userfullname','$product')";
     $result = pg_query($dbh, $sql);
     if (!$result) {
         die("Error in SQL query:'$sql' " . pg_last_error());
     }

     echo "Data successfully Inserted!";

     // free memory
     pg_free_result($result);

     // close connection
     pg_close($dbh);
 }
 ?>
    <H1> Insert a new Client</H1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      *Firstname: <BR> <input type="text" name="cfirstname" > <p>
      *Lastname: <BR> <input type="text" name="clastname" > <p>
      *Address1: <BR> <input type="text" name="caddress1" > <p>
      Address2: <BR> <input type="text" name="caddress2" > <p>
      *City: <BR> <input type="text" name="ccity" > <p>
      State: <BR> <input type="text" name="cstate" > <p>
      *Zip: <BR> <input type="text" name="czip" > <p>
      *Country: <BR> <input type="text" name="ccountry" > <p>
      Email: <BR> <input type="text" name="cemail" > <p>
      Phone: <BR> <input type="text" name="cphone" > <p>
      *Creditcardtype: (Numero entero) <BR> <input type="text" name="ccreditcardtype" > <p>
      Creditcard: <BR> <input type="text" name="ccreditcard" > <p>
      Creditcardexpiration: <BR> <input type="text" name="ccreditcardexpiration" > <p>
      *Username: <BR> <input type="text" name="cusername" > <p>
      *Password: <BR> <input type="text" name="cpassword" > <p>
      *Userfullname: <BR> <input type="text" name="cuserfullname" > <p>
      *Organization: <BR> <input type="text" name="corganization" > <p>
      * Product <BR> <SELECT name="cproduct">
      <OPTION value="iAAnalyzerTRIAL.exe">iAAnalyzerTRIAL.exe</OPTION>
      <OPTION value="iAAnalyzerONEyear.exe">iAAnalyzerONEyear.exe</OPTION>
      <OPTION value="iAAnalyzerTWOyear.exe">iAAnalyzerTWOyear.exe</OPTION>
      <OPTION value="iAAnalyzerTHREEyears.exe">iAAnalyzerTHREEyears.exe</OPTION>
      </SELECT>
      <input type="submit" name="submit">
      * Required Field
    </form>
     <A HREF=UserList.php> Return to Users List</A>
   </body>
 </html>
