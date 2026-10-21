<?php
include("conexion.php");
$con = conectar();

$matricula = $_GET['id'];
$sql = "SELECT * FROM alumnos WHERE matricula='$matricula'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Alumno</title>
</head>
<body>
    <h1>Editar Alumno</h1>
    <form action="update.php" method="POST">
        <input type="hidden" name="matricula" value="<?php echo $row['matricula']; ?>">

        <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" placeholder="Nombre"><br>
        <input type="text" name="apellido_p" value="<?php echo $row['apellido_p']; ?>" placeholder="Apellido P"><br>
        <input type="text" name="apellido_m" value="<?php echo $row['apellido_m']; ?>" placeholder="Apellido M"><br>
        <input type="text" name="edad" value="<?php echo $row['edad']; ?>" placeholder="Edad"><br>

        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
