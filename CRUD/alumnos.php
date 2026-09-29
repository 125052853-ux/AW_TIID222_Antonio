<?php
/* incluye la informacion  del archivo conexion */
include("conexion.php");
$con = conectar();
/* dame todo lo que tengas en la tabla de alumnos */
$sql = "SELECT * FROM alumnos";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD ALUMNOS</title>
    TABLA DE ALUMNOS
    <P></P>
    <table>
        <tr>MATRICULA</tr>
        <tr>NOMBRE</tr>
        <tr>APELLIDO P</tr>
        <tr>APELLIDO M</tr>
        <tr>ACCIONES</tr>
    </table>
</head>
<body>
    
</body>
</html>