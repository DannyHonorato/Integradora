<?php
include("config.php");
$Id=$_GET['Id'];
$sql= "DELETE  FROM registro WHERE Id_reg = $Id";
$resultado=mysqli_query($conn, $sql) or die(mysqli_error($conn));
header("location:Uservista.php");

?>