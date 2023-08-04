<?php
include("config.php");
$Id=$_GET['id'];
$sql= "DELETE  FROM Producto WHERE Id_prod=$Id";
$resultado=mysqli_query($conn, $sql) or die(mysqli_error($conn));
header("location: welcome.php");
?>