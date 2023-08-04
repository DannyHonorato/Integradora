<?php 
include ("config.php");
$Nombre_prod=$_POST['Nombre_prod'];
$Precio=$_POST['Precio'];
$Marca=$_POST['Marca'];
$Descripcion=$_POST['Descripcion'];
$no_exist=$_POST['no_exist'];


$sql="INSERT INTO  Producto (Id_prod,Nombre_prod,Precio,Marca,Descripcion,no_exist) 
values (0,'$Nombre_prod','$Precio','$Marca','$Descripcion','$no_exist')";

if ($conn-> query ($sql)===true) {
  header("Location: welcome.php");
}
else {
  header("Location: prodreg2.html");
}
$conn->close(); 

?>

