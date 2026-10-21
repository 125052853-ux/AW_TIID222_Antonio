<?php

include("conexion.php");

$con = conectar();

$ID = $_POST['ID'];
$NOMBRE = $_POST['NOMBRE'];
$MARCA = $_POST['MARCA'];
$STOCK = $_POST['STOCK'];
$PRECIO = $_POST['PRECIO'];

$sql = "INSERT INTO productos(ID, NOMBRE, MARCA, STOCK, PRECIO)
VALUES ('$ID', '$NOMBRE', '$MARCA', '$STOCK', '$PRECIO')";

$query = mysqli_query($con, $sql);

if($query){

    header("Location: Examen.php");
    exit();

}else{

    echo "Error al insertar el producto: ";
    echo mysqli_error($con);

}

?>