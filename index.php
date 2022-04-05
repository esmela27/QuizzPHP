<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUIZZ PHP</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style type="text/css">
  body {
    height: 400px;
    background-position: center center;
	background-image: url('imagen/fondo.jpg');
	background-repeat: no-repeat;
	background-size: cover;

     }
  </style>
</head>

<body>
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid"> 
    <a class="navbar-brand" href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
  <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
</svg> <strong>QUIZZ PHP </strong></a>
  </div>
</nav>
<br><br><br>
    <div class="container-flex">
        <div class="row">
            <div class="col-3">
            </div>
            <div class="col-6" id="partida">
                <?php
                include('misfunciones.php'); //Incluye el archivo misfunciones
                $mysqli = conectaBBDD(); // la variable $mysqli coge la funcion conectaBBDD() de misfuncones
                $consulta = $mysqli->query("SELECT * FROM `preguntas`  GROUP BY `tema`");
                $num_filas = $consulta->num_rows;// forma de hacer consult en php.

                for ($i = 0; $i < $num_filas; $i++) {
                    $r = $consulta->fetch_array(); // leee una fila entera y eso lo guarda en la r
                    echo '<button onclick ="cargaTema(\''.$r["tema"] .'\')" type="button" class="btn btn-danger col-12" >'.$r["tema"] .'</button><br><br><br>';
                    // Si quieres añadir cosas de html a php va con echo seguido de comillas y el codigo
                }
                ?>
            </div>
            <div class="col-3">
            </div>
        </div>
    </div>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script>
        function cargaTema(_tema){// _tema puede ser cualquier nombre recoge el tema
               $('#partida').load('partida.php', {tema: _tema});// cargar otra pagina
        }
    </script>

</body>




</html>