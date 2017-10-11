
<?php

$quantity=15;

$first_name="John";
$last_name="smith";




function generaUsr ($NombreApellido)
{
    if(!empty ($NombreApellido))
    {
        $Apellido = explode (" ",$NombreApellido);
        $Apellido = strtolower($Apellido[count($Apellido) -1]);
        $Inicial = substr($NombreApellido,0,1);
        $Nick = strtolower($Inicial.$Apellido);
        
        return $Nick;
    }
    else
    {
        echo "Debe escribir un nombre y apellido";
    }
} 

function generaPass($longi){
	//Se define una cadena de caractares. 
	$cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
	//Obtenemos la longitud de la cadena de caracteres
	$longitudCadena=strlen($cadena);

	//Se define la variable que va a contener la contraseña
	$pass = "";
	$longitudPass=$longi;

	//Creamos la contraseña
	for($i=1 ; $i<=$longitudPass ; $i++){
		//Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
		$pos=rand(0,$longitudCadena-1);

		$pass .= substr($cadena,$pos,1);
	}
	return $pass;
}

function limpiaESP($cadena){
    $cadena = str_replace(' ', '', $cadena);
    return $cadena;
}


function buscaCustomer ($usernameDB) {
  		  $dbh = pg_connect("host=localhost dbname=aanalizer user=analizer password=anapass");
   		  $sql = "select count(customerid) from customer where username='$usernameDB';";
		  $result = pg_query($dbh, $sql);
		  $row = pg_fetch_array($result);
		  if (!$result) {
			  die("Error in SQL query: " . pg_last_error());
		  }   

		   if ( $row[0] >0) {
			   	return true;
		   } else
		   {	
		   		return false;
		   }
		    pg_free_result($result);
		    pg_close($dbh);
}

function buscaEval_Customer ($usernameDB) {
  		  $dbh = pg_connect("host=localhost dbname=aanalizer user=analizer password=anapass");
   		  $sql = "select count(customerid) from eval_customer where username='$usernameDB';";
		  $result = pg_query($dbh, $sql);
		  $row = pg_fetch_array($result);
		  if (!$result) {
			  die("Error in SQL query: " . pg_last_error());
		  }   

		   if ( $row[0] >0) {
			   	return true;
		   } else
		   {	
		   		return false;
		   }
			pg_free_result($result);
		    pg_close($dbh);
}

$message = "Thanks for your purchase AAnalyzer.\n";
$message. = "To download the installation software please enter the following link: http://rdataa.com/aanalyzer/Download/Login.php \n";
$message. = "Installation Instructions: \n";
$message. = "- Run Setup.exe \n";
$message. = "- Select default options \n";
$message. = "- Enter login and password \n";
$message. = "Important note: when running Setup.exe and enter the license data, the computer will be registered under this License. \n";

$totusr=0;
$k=1;
$usernameDB= generaUsr(limpiaESP($first_name).' '.limpiaESP($last_name));

while ($totusr < $quantity ) {

	
	if (buscaCustomer($usernameDB)==false && buscaEval_Customer($usernameDB)==false && in_array($usernameDB, $Luser)==false) {
			//echo "CREALO <br>";
			$Luser[$totusr]= $usernameDB;
			$totusr=$totusr+1;
			
			$message.= "-----------------------------\n";
			$message.= "Login: ".$usernameDB."\n";
			$message.= "Password: ".generaPass(6)."\n";


			
			//$userfullname= limpiaEsp($first_name).' '.limpiaESP($last_name);
		} else
		{ 
		    $usernameDB= limpiaESP($first_name).$k;
			$k=$k+1;
		}
	
}
$message.= "-----------------------------\n";







echo $message."<br>";




?>




