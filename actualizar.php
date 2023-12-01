<?php

$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "proyecto";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}


if (isset($_POST['submit'])) {

    $primaryKey = $_POST['primary_key'];
    $nuevoDato = $_POST['nuevo_dato'];
    $datoCambiar = $_POST['dato_cambiar'];




    $sql = "UPDATE registro SET $datoCambiar = '$nuevoDato' WHERE id = '$primaryKey'";


    if (mysqli_query($conn, $sql)) {
        $mensaje = "Dato actualizado correctamente.";
    } else {
        $error = "Error al actualizar el dato: " . mysqli_error($conn);
    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Actualizar dato</title>
</head>
<body>
     <style>
		body{font-family: Arial; background-color: #18A383; box-sizing: border-box;}

		form{
			background-color: white;
			border-radius: 3px;
			color: #999;
			font-size: 0.8em;
			padding: 20px;
			margin: 0 auto;
			width: 300px;
		}

		input, textarea{
			border: 0;
			outline: none;

			width: 280px;
		}

		.field{
			border: solid 1px #ccc;
			padding: 10px;


		}

		.field:focus{
			border-color: #18A383;
		}

		.center-content{
			text-align: center;
		}
        .btn{
	border-radius: 3px;
	display: inline-block;
	padding: 20px 15px;
	text-decoration: none;
	text-shadow: 0 1px 0 rgba(255,255,255,0.3);
	box-shadow: 0 1px 1px rgba(0,0,0,0.3); 
}

.btn-green{
	color: white;
	background-color: #3CC93F;
}
.btn-green:hover{
	background-color: #37B839;	
}
.btn-green:active{
	background-col

	</style>
    <?php if (isset($mensaje)) { ?>
        <p><?php echo $mensaje; ?></p>
    <?php } ?>

    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>

    <form method="POST" action="">
        <label for="primary_key">Id registro:</label>
        <input type="text" class="field" name="primary_key" id="primary_key" required>
        <br>
        <label for="dato_cambiar">Dato a cambiar:</label>
        <input type="text" class="field" name="dato_cambiar" id="dato_cambiar" required>
        <br>
        <label for="nuevo_dato">Nuevo dato:</label>
        <input type="text" class="field" name="nuevo_dato" id="nuevo_dato" required>
        <br>
        <input type="submit" class= "btn btn-green" name="submit" value="Actualizar">
    </form>
</body>
</html>

<?php

mysqli_close($conn);
?>