<?php
include('misfunciones.php'); //Incluye el archivo misfunciones
$mysqli = conectaBBDD(); // la variable $mysqli coge la funcion conectaBBDD() de misfuncones

$respuesta = $_POST['respuesta'];
$numeroPregunta = $_POST['numeroPregunta'];
//query mal hecha¡¡¡¡ SUSPENSO
// $consulta = $mysqli->query(" SELECT * FROM `preguntas` WHERE `numero` = '$numeroPregunta' ");
// $r = $consulta->fetch_array();

$consulta = $mysqli -> prepare("SELECT correcta FROM `preguntas` WHERE `numero` = ? ");
$consulta -> bind_param("s", $numeroPregunta);
$consulta ->execute();
$consulta ->store_result();
$consulta ->bind_result($correcta);
$consulta ->fetch();
if ($correcta == $respuesta){

    echo '<br><div class="alert alert-success" role="alert">CORRECTO</div>';
}
else{
    echo '<br><div class="alert alert-danger" role="alert">FALLASTES</div>';
}
?>
