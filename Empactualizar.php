<?php
include("config.php");
$Id_Emp=$_GET['id'];
$sql=" SELECT * FROM Empleado WHERE Id_Emp=$Id_Emp";
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
        <div class="row"><form action="Empactualizar2.php" method="post">
            <input type="hidden" name="Id_Emo" id="" value="<?php echo $fila['Id_prod']?>"/>
            <input type="text" name="nombre1" id="" value="<?php echo $fila['nombre1'];?>"/>
            <input type="text" name="nombre2" id="" value="<?php echo $fila['nombre2'];?>"/>
            <input type="text" name="apellido1" id="" value="<?php echo $fila['apellido1'];?>"/>
            <input type="text" name="apellido2" id="" value="<?php echo $fila['apellido2'];?>"/>
            <input type="text" name="Direccion" id="" value="<?php echo $fila['Direccion'];?>"/>
            <input type="text" name="Cel" id="" value="<?php echo $fila['Cel'];?>"/>
            <input type="text" name="Correo" id="" value="<?php echo $fila['Correo'];?>"/>
            <input type="submit" value="Actualizar registro"/>

        </form></div>
    </div>
</body>
</html>