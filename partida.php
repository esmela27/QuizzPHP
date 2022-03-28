<?php
$tema = $_POST['tema']; // se pasan parametros con post o con get, se llama tema ya que en index.php se llama tema
// echo '<div class="alert alert-success" role="alert">
// El tema que has elegido es: ' . $tema . '</div>';

include('misfunciones.php'); //Incluye el archivo misfunciones
$mysqli = conectaBBDD(); // la variable $mysqli coge la funcion conectaBBDD() de misfuncones

$consulta = $mysqli->query("SELECT* FROM `preguntas` WHERE `tema`= '$tema' ORDER BY rand() LIMIT 1");
$num_filas = $consulta->num_rows; // forma de hacer consult en php.

//$pregunta_elegida = rand(0, $num_filas);

// for ($i = 0; $i < $pregunta_elegida; $i++) {
//     $r = $consulta->fetch_array();
// }
$r = $consulta->fetch_array();
?>
<div class='container'>
    <div class='row'>
        <div class='col-12'>
            <button class="btn btn-dark disabled col-12">
                <?php echo $r['enunciado']; ?>
            </button>
            <br><br>
            <button class="btn btn-warning col-12 "  onclick="chequeaRespuesta ('1');">
                <?php echo $r['r1']; ?>
            </button>
            <br>
            <button class="btn btn-warning col-12" onclick="chequeaRespuesta ('2');">
                <?php echo $r['r2']; ?>
            </button>
            <br>
            <button class="btn btn-warning  col-12" onclick="chequeaRespuesta ('3');">
                <?php echo $r['r3']; ?>
            </button>
            <br>
            <button class="btn btn-warning  col-12" onclick="chequeaRespuesta ('4');">
                <?php echo $r['r4']; ?>
            </button>
            <br>

        </div>

    </div>


</div>
<div id="cargaRespuesta"></div>
<script>
    function chequeaRespuesta(_respuesta){
        $('#cargaRespuesta').load();
    }
</script>