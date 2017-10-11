<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
 <html>
   <head></head>
   <body>       

 <?php

$realm = 'Autorization required';
$users = array('admin' => '789+63.' , 'mario' => 'aabb123');

if (empty($_SERVER['PHP_AUTH_DIGEST'])) {
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Digest realm="'.$realm.
           '",qop="auth",nonce="'.uniqid().'",opaque="'.md5($realm).'"');

    die('Area Restringida.');
}
if (!($data = http_digest_parse($_SERVER['PHP_AUTH_DIGEST'])) ||
    !isset($users[$data['username']]))
    die("Datos Erroneos! ");


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

 // attempt a connection
 $dbh = pg_connect("host=localhost dbname=aanalizer user=analizer password=anapass");
 if (!$dbh) {
     die("Error in connection: " . pg_last_error());
 }       

 // execute query
 $sql = "select firstname,lastname,address1,address2,city,state,zip,country,email,phone,creditcardtype,creditcard,creditcardexpiration,username,organization,userfullname,customerid  from customer ;";
 $result = pg_query($dbh, $sql);
 if (!$result) {
     die("Error in SQL query: " . pg_last_error());
 }       
 // iterate over result set print each row
 while ($row = pg_fetch_array($result)) {
     echo "FirstName : " . $row[0] . "<br />";
     echo "LatName : " . $row[1] . "<br />";
     echo "Adress  : " . $row[2] . "<br />";
     echo "Adress : " . $row[3] . "<br />";
     echo "City : " . $row[4] . "<br />";
     echo "State : " . $row[5] . "<br />";
     echo "Zip : " . $row[6] . "<br />";
     echo "Country : " . $row[7] . "<br />";
     echo "mail : " . $row[8] . "<br />";
     echo "phone : " . $row[9] . "<br />";
     echo "Creadit Card Type : " . $row[10] . "<br />";
     echo "Credit Card : " . $row[11] . "<br />";
     echo "Expiration : " . $row[12] . "<br />";
     echo "Login : " . $row[13] . "<br />";
     echo "Organization : " . $row[14] . "<br />";
     echo "User Full Name : " . $row[15] . "<br />";
     echo "<A HREF=Delete.php?id=$row[16]>Eliminar </A> <br />";
     echo "<HR>";
 }       

 // free memory
 pg_free_result($result);       

 // close connection
 pg_close($dbh);
 ?>       

      <A HREF='Edit.php'> Add a new user` </A><p />
   </body>
 </html>
