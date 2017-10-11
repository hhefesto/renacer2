<?php

$realm = 'Autorization required';
$users = array('admin' => '789+63.' , 'mario' => 'aabb123');
$server= "148.243.159.160";

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
 $dbh = pg_connect("host=localhost  dbname=aanalizer user=analizer password=anapass");
//echo $server;
 if (!$dbh) {
     die("Error in connection: " . pg_last_error());
 }

 // execute query
 $sql = "select firstname,lastname,address1,address2,city,state,zip,country,email,phone,creditcardtype,creditcard,creditcardexpiration,username,organization,userfullname, product, customerid from customer ;";
 $result = pg_query($dbh, $sql);
 if (!$result) {
     die("Error in SQL query: " . pg_last_error());
 }

 ?>
<TABLE ALIGN="left" BORDER=1 CELLSPACING=1 CELLPADDING=1 WIDTH="100%">
<TR ALIGN="left" VALIGN="middle">
	<TH>FirstName</TH>
	<TH>LastName </TH>
	<TH>Address</TH>
	<TH>Address 2</TH>
	<TH>City</TH>
	<TH>State</TH>
	<TH>Zip</TH>
	<TH>Country</TH>
	<TH>eMail</TH>
	<TH>Phone</TH>
	<TH>Credit Card Type</TH>
	<TH>Credit Card</TH>
	<TH>Expiration</TH>
	<TH>Login</TH>
	<TH>Organization</TH>
	<TH>User Full Name</TH>
	<TH>Product</TH>
        <TH>Action</TH>
</TR>



// iterate over result set print each row
<?php while ($row = pg_fetch_array($result)) { ?>
<TR ALIGN="left" VALIGN="middle">
	<TD><?php echo "$row[0]"?></TD>
	<TD><?php echo "$row[1]"?></TD>
	<TD><?php echo "$row[2]"?></TD>
	<TD><?php echo "$row[3]"?></TD>
	<TD><?php echo "$row[4]"?></TD>
	<TD><?php echo "$row[5]"?></TD>
	<TD><?php echo "$row[6]"?></TD>
	<TD><?php echo "$row[7]"?></TD>
	<TD><?php echo "$row[8]"?></TD>
	<TD><?php echo "$row[9]"?></TD>
	<TD><?php echo "$row[10]"?></TD>
	<TD><?php echo "$row[11]"?></TD>
	<TD><?php echo "$row[12]"?></TD>
	<TD><?php echo "$row[13]"?></TD>
	<TD><?php echo "$row[14]"?></TD>
	<TD><?php echo "$row[15]"?></TD>
	<TD><?php echo "$row[16]"?></TD>
	<TD><A HREF="=Delete.php?id=<?php echo "$row[17]"?>"> Eliminar</A></TD>

</TR>


<?php }

 // free memory
 pg_free_result($result);

 // close connection
 pg_close($dbh);
 ?>
</TABLE>
<A HREF='Edit.php'> Add a new user` </A><p />
   </body>
 </html>
