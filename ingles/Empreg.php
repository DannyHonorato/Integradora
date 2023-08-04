<?php 
include ("config.php");
$Id_Emp=$_POST['Id_Emp'];
$nombre1=$_POST['nombre1'];
$nombre2=$_POST['nombre2'];
$apellido1=$_POST['apellido'];
$apellido2=$_POST['apellido2'];
$Direccion=$_POST['Direccion'];
$Cel=$_POST['Cel'];
$correo=$_POST['correo'];

$sql="INSERT INTO  Empleado (Id_Emp,nombre1,nombre2,apellido,apellido2,Direccion,Cel,correo) 
values (0,'$nombre1','$nombre2','$apellido','$apellido2','$Direccion','$Cel','$correo')";

if ($conn-> query ($sql)===true) {
  header("Location: Empvista.php");
}
else {
  header("Location: Empreg2.html");
}
$conn->close(); 

?>