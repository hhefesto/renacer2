
<?php
$nombre_archivo = 'log.txt';
$contenido = "Añade esto al archivo\n";

if (is_writable($nombre_archivo)) {

    if (!$gestor = fopen($nombre_archivo, 'a')) {
         echo "No se puede abrir el archivo ($nombre_archivo)";
         exit;
    }

    if (fwrite($gestor, $contenido) === FALSE) {
        echo "No se puede escribir en el archivo ($nombre_archivo)";
        exit;
    }

    fclose($gestor);

} else {
    echo "El archivo $nombre_archivo no es escribible";
}



?>

