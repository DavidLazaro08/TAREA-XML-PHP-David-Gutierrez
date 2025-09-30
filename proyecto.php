
<?php

// PROYECTO PHP + XML - Lista de Tareas


// =====================================================================================
// CONFIGURACIÓN INICIAL Y CARGA DE NUESTRO ARCHIVO XML
// =====================================================================================

// Guardamos la ruta a nuestro XML, creado en la misma carpeta.
$archivo_xml = __DIR__ . "/tareas.xml";

$xml = null;
$mensaje = "";

if (file_exists($archivo_xml)) {

    // Lo primero será intentar cargar el XML.
    $xml = simplexml_load_file($archivo_xml);
    if ($xml === false) {
        $mensaje = "El archivo existe pero NO es un XML bien formado.";
    }
} else {
    $mensaje = "tareas.xml no está dentro de la carpeta del proyecto.";
}

// =====================================================================================
// AÑADIR NUEVA TAREA AL XML
// =====================================================================================

if (isset($_POST['nueva_tarea'])) {

    // Cogemos el texto y le quitamos espacios por delante y por detrás.
    $tarea = trim($_POST['nueva_tarea']);

    // Si no está vacío, lo metemos como <tarea> en el XML
    if ($tarea !== '') {
        $xml->addChild('tarea', $tarea);

        // Guardamos el XML actualizado en el fichero
        $xml->asXML($archivo_xml);

        // Recargamos la página para evitar que se duplique al refrescar
        header('Location: proyecto.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Lista de Tareas</title>
</head>
<body>
  <h1>MI LISTA DE TAREAS</h1>

  
  <!-- =====================================================================================
       TAREAS EXISTENTES
  ====================================================================================== -->

  <ul>
  <?php 
  if ($mensaje != "") {
      echo "<li>" . $mensaje . "</li>";
  } elseif (empty($xml->tarea)) {
      echo "<li>No hay tareas todavía.</li>";
  } else {
      foreach ($xml->tarea as $t) {
          echo "<li>" . $t . "</li>";
      }
  }
  ?>
  </ul>

  <!-- =====================================================================================
       FORMULARIO PARA AÑADIR MÁS TAREAS
  ====================================================================================== -->

  <form method="post" action="proyecto.php">
    <input type="text" name="nueva_tarea" placeholder="Escribe una nueva tarea">
    <button type="submit">Agregar</button>
  </form>

</body>
</html>
