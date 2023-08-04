<?php 
include ("config.php");
$Nombre=$_POST['Nombre'];
$Username=$_POST['Username'];
$Cel=$_POST['Cel'];
$Email=$_POST['Email'];
$Password=$_POST['Password'];

$sql="INSERT INTO  registro (Id_reg,Nombre,Username,Cel,Email,Password) 
values (0,'$Nombre','$Username','$Cel','$Email','$Password')";

if ($conn-> query ($sql)===true) {
  header("Location: Ingresar.html");
}
else {
  header("Location: Registrar.html");
}
$conn->close(); 
?>
