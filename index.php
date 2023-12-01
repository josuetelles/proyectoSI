<?php
    $conexion=mysqli_connect('localhost','root', '12345678', 'proyecto')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <table>

        <tr>
            <td>ID</td>
            <td>Nombre</td>
            <td>Edad</td>
            <td>Carrera</td>
        </tr>
        <?php
            $sql= "SELECT * FROM registro";
            $result=mysqli_query($conexion,$sql);

            while($mostrar=mysqli_fetch_array($result)){

        ?>
                <tr>
                    <td><?php echo $mostrar['id'] ?></td>
                    <td><?php echo $mostrar['nombre_usuario'] ?></td>
                    <td><?php echo $mostrar['edad'] ?></td>
                    <td><?php echo $mostrar['carrera'] ?></td>

        </tr>
        <?php
            }
        ?>    
    </table>
    <a href="actualizar.php">
    <button>Actualizar un registro</button>
  </a> 
</body>
</html>