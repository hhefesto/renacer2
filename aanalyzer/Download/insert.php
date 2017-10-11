<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
 <html>
   <head></head>
   <body>       

 <?php
 if ($_POST['submit']) {
     // attempt a connection
     $dbh = pg_connect("host=localhost dbname=test user=postgres password=789+63.");
     if (!$dbh) {
         die("Error in connection: " . pg_last_error());
     }
    
     // escape strings in input data
     $code = pg_escape_string($_POST['ccode']);
     $name = pg_escape_string($_POST['cname']);
    
     // execute query
     $sql = "INSERT INTO Countries (CountryID, CountryName) VALUES('$code', '$name')";
     $result = pg_query($dbh, $sql);
     if (!$result) {
         die("Error in SQL query: " . pg_last_error());
     }
    
     echo "Data successfully inserted!";
    
     // free memory
     pg_free_result($result);
    
     // close connection
     pg_close($dbh);
 }
 ?>       

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      Country code: <br> <input type="text" name="ccode" size="2">  
      <p>
      Country name: <br> <input type="text" name="cname">       
      <p>
      <input type="submit" name="submit">
    </form> 
   
   </body>
 </html>
