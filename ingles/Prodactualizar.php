<?php
include("config.php");
$Id_prod=$_GET['id'];
$sql=" SELECT * FROM Producto WHERE Id_prod=$Id_prod";
$resultado=mysqli_query($conn, $sql) or die(mysqli_error($conn));
$fila=mysqli_fetch_assoc($resultado);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="header"><h1>Actualizar Registro</h1></div>
        <div class="row">
            <form action="Prodactualizar2.php" method="post">
            <input type="hidden" name="Id_prod" id="" value="<?php echo $fila['Id_prod']?>"/>
            <input type="text" name="Nombre_prod" id="" value="<?php echo $fila['Nombre_prod'];?>"/>
            <input type="text" name="Precio" id="" value="<?php echo $fila['Precio'];?>"/>
            <input type="text" name="Marca" id="" value="<?php echo $fila['Marca'];?>"/>
            <input type="text" name="Descripcion" id="" value="<?php echo $fila['Descripcion'];?>"/>
            <input type="text" name="no_exist" id="" value="<?php echo $fila['no_exist'];?>"/>
            <input type="submit" value="Actualizar registro"/>
        </form>
    </div>
</body>
</html>
