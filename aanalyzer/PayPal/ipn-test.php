<?php


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
   

$first_name="prue ba";
$last_name="ru eba";


     $dbh = pg_connect("host=localhost dbname=aanalizer user=analizer password=anapass");
	 if (!$dbh) {
		 die("Error in connection: " . pg_last_error());
	 }
	 $passwordDB= generaPass(6);
	 $usernameDB= generaUsr(limpiaESP($first_name).' '.limpiaESP($last_name));
	 $userfullname= limpiaEsp($first_name).' '.limpiaESP($last_name);
     $ok=false;
	 $k=1;
	 echo $usernameDB."<br>";
	 while ($ok==false) {
	 		
		  $sql = "select count(customerid) from customer where username='$usernameDB';";
		  echo $sql;
		  $result = pg_query($dbh, $sql);
		  $row = pg_fetch_array($result);
		  if (!$result) {
			  die("Error in SQL query: " . pg_last_error());
		  }   

		   if ( $row[0] >0) {
		   			
					 $usernameDB= limpiaESP($first_name).$k;
					 $k=$k+1;
					
		   } else
		   {
		   		$ok=true;
		   }
// 		   echo $row[0]." ".$usernameDB;
 	 }
 	echo ">>".$usernameDB."<<";

 	 
?>
