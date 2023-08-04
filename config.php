<?php
$server="localhost";
$user="root";
$pwd="";
$bd="version13";

// se crea la conexion
$conn=new mysqli($server,$user,$pwd,$bd);

// revisar la conexion

if($conn->connect_error){

  die ("Fallo la conexion: ".$conn->connect_error);
}

?>