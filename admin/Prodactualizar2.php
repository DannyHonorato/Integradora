<?php
include("config.php");
$Id_prod=$_POST['Id_prod'];
$Nombre_prod=$_POST['Nombre_prod'];
$Precio=$_POST['Precio'];
$Marca=$_POST['Marca'];
$Descripcion=$_POST['Descripcion'];
$no_exist=$_POST['no_exist'];

$sql = "UPDATE Producto SET Nombre_prod='$Nombre_prod', Precio='$Precio', Marca='$Marca', Descripcion='$Descripcion', no_exist='$no_exist' WHERE Id_prod='$Id_prod'";
$resultado = mysqli_query($conn, $sql) or die(mysqli_error());
header("location: welcome.php");

?>