<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUIZZ PHP</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">QUIZZ PHP</a>
  </div>
</nav>
<br>
    <div class="container-flex">
        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-8" id="partida">
                <?php
                include('misfunciones.php'); //Incluye el archivo misfunciones
                $mysqli = conectaBBDD(); // la variable $mysqli coge la funcion conectaBBDD() de misfuncones
                $consulta = $mysqli->query("SELECT * FROM `preguntas`  GROUP BY `tema`");
                $num_filas = $consulta->num_rows;// forma de hacer consult en php.

                for ($i = 0; $i < $num_filas; $i++) {
                    $r = $consulta->fetch_array(); // leee una fila entera y eso lo guarda en la r
                    echo '<button onclick ="cargaTema(\''.$r["tema"] .'\')" type="button" class="btn btn-primary col-12" >'.$r["tema"] .'</button><br><br>';
                    // Si quieres añadir cosas de html a php va con echo seguido de comillas y el codigo
                }
                ?>
            </div>
            <div class="col-2">
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