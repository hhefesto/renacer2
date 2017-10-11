<?php



function escribeLog($contenido)
{ echo $contenido;
	$nombre_archivo = 'log.txt';
	if (is_writable($nombre_archivo)) {			
		if (!$gestor = fopen($nombre_archivo, 'a')) {
//			 echo "No se puede abrir el archivo ($nombre_archivo)";
			 exit;
		}
		if (fwrite($gestor, $contenido.chr(13).chr(10)) === FALSE) {
//			echo "No se puede escribir en el archivo ($nombre_archivo)";
			exit;
		}
		fclose($gestor);
	} else {
		echo "El archivo $nombre_archivo no es escribible";
	}

}

	escribeLog('HOLA');

echo "z1";
?>
