<?php
include("conexion.php");

$con = conectar();

$matricula   = $_POST['matricula'];
$nombre      = $_POST['nombre'];
$apellido_p  = $_POST['apellido_p'];
$apellido_m  = $_POST['apellido_m'];
$edad        = $_POST['edad'];

/* Consulta para insertar */
$sql = "INSERT INTO alumnos (matricula, nombre, apellido_p, apellido_m, edad)
        VALUES ('$matricula','$nombre','$apellido_p','$apellido_m','$edad')";

$query = mysqli_query($con, $sql);

if ($query) {
    header("Location: alumnos.php");
} else {
    echo "Error al insertar al alumno: " . mysqli_error($con);
}
?>
