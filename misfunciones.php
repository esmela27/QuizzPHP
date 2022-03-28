<?php

//función para realizar la conexión a la BBDD
function conectaBBDD(){
    $direccion =  "localhost";
    $usuario_BBDD = "pruebaTEST";
    $password_BBDD = "nvhMe-m4!p)9UQ)e";
    $nombre_BBDD = "ejemploquiz";
    $puerto = "3306";

    $conexion = new mysqli( $direccion,
                            $usuario_BBDD,
                            $password_BBDD,
                            $nombre_BBDD,
                            $puerto);
    $consulta = $conexion -> query("SET NAMES UTF8");
    //el query("SET NAMES UTF8") obtiene los datos en UTF8 (caracteres unicode de longitud variable).
    return $conexion;
}