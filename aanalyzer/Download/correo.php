<?php
 require_once "Mail.php";

 $from = "TechSupport Service <techsupport@rdataa.com>";
 $to = "notification@rdataa.com";
 $subject = "Hi!";
 $body = "Hi,\n\nHow are you?";

 $host = "smtp.gmail.com";
 $username = "techsupport@rdataa.com";
 $password = "rddulce01";

 $headers = array ('From' => $from,
   'To' => $to,
   'Subject' => $subject);
 $smtp = Mail::factory('smtp',
   array ('host' => $host,
     'auth' => true,
     'username' => $username,
     'password' => $password));

 $mail = $smtp->send($to, $headers, $body);

 if (PEAR::isError($mail)) {
   echo("<p>" . $mail->getMessage() . "</p>");
  } else {
   echo("<p>Message successfully sent!</p>");
  }
 ?>
