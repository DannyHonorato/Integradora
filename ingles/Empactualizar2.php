<?php
include("config.php");
$Id_Emp=$_POST['Id_Emp'];
$nombre1=$_POST['nombre1'];
$nombre2=$_POST['nombre2'];
$apellido1=$_POST['apellido1'];
$apellido2=$_POST['apellido2'];
$Direccion=$_POST['Direccion'];
$Cel=$_POST['Cel'];
$Correo=$_POST['Correo'];

$sql = "UPDATE Empleado SET nombre1='$nombre1', nombre2='$nombre2', apellido1='$apellido1', apellido2='$apellido2', Direccion='$Direccion',Cel='$Cel',Correo='$Correo' WHERE Id_Emp='$Id_Emp'";
$resultado = mysqli_query($conn, $sql) or die(mysqli_error());
header("location: Empdvista.php");

?>

