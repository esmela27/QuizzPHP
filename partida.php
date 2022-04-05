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
            <br><br><br>
            <button id ="boton1" class="btn btn-warning col-12 "  onclick="botonPulsado (); chequeaRespuesta ('1','<?php echo $r['numero']; ?>'); ">
                <?php echo $r['r1']; ?>
            </button>
            <br><br>
            <button id ="boton2" class="btn btn-warning col-12" onclick=" botonPulsado (); chequeaRespuesta ('2','<?php echo $r['numero']; ?>');">
                <?php echo $r['r2']; ?>
            </button>
            <br><br>
            <button id ="boton3" class="btn btn-warning  col-12" onclick=" botonPulsado (); chequeaRespuesta ('3','<?php echo $r['numero']; ?>');">
                <?php echo $r['r3']; ?>
            </button>
            <br><br>
            <button  id ="boton4" class="btn btn-warning  col-12" onclick=" botonPulsado (); chequeaRespuesta ('4','<?php echo $r['numero']; ?>');">
                <?php echo $r['r4']; ?>
            </button>
            <br><br>

        </div>
    </div>

</div>
<div id="cargaRespuesta"></div>
<br><br><br>
<div class="row">
<div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"> <button id="siguiente" class="btn btn-secondary  col-12"><h4 style="color: #FFC133;"><strong>SIGUIENTE</strong><svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-play-fill" viewBox="0 0 16 16">
  <path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/></h4> 
</svg></button></div>
        </div>
<script>
    $('#siguiente').hide();
    function chequeaRespuesta(_respuesta, _numero){
        $('#cargaRespuesta').load('chequeaRespuesta.php', {
            respuesta: _respuesta,
            numeroPregunta: _numero,
        });
    }
    function botonPulsado (){
        const botones1 = document.getElementById("boton1");
        const botones2 = document.getElementById("boton2");
        const botones3 = document.getElementById("boton3");
        const botones4 = document.getElementById("boton4");
        botones1.disabled= true;
        botones2.disabled= true;
        botones3.disabled= true;
        botones4.disabled= true;
        $('#siguiente').toggle('show');

    }
</script>