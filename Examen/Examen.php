<?php

include("conexion.php");

$con = conectar();

$sql = "SELECT * FROM productos";
$query = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen</title>
</head>
<body>
<div class="Examen">
    <header class="encabezado" style="display: flex; background-color: green;">
        <div class="aplicaciones" style="text-align: center; width: 100%;">
            <h1>EXAMEN 1ER PARCIAL - APLICACIONES WEB</h1>
        </div>
    </header>

    <main class="contenido" style="display: grid; grid-template-columns: 50% 50%; gap: 5px; background-color: white;">
        <div class="columna-formulario" style="background-color: darkolivegreen; padding 20px 40px 20px 40px; margin: 10px">
            <h1>FORMULARIO</h1>
            <form action="insertar.php" method="POST">
                <div style="display: flex; gap: 10px; flex-direction: column;">
                    <input 
                        type="text"
                        name="ID"
                        placeholder="ID"
                    >
                    <input 
                        type="text"
                        name="NOMBRE"
                        placeholder="NOMBRE"
                    >
                    <input 
                        type="text"
                        name="MARCA"
                        placeholder="MARCA"
                    >
                    <input 
                        type="text"
                        name="STOCK"
                        placeholder="STOCK"
                    >
                    <input 
                        type="text"
                        name="PRECIO"
                        placeholder="PRECIO"
                    >
                    <button type="submit">
                        GUARDAR
                    </button>
                </div>
            </form>
        </div>

        <div class="columna-tabla" style="text-align: center; padding: 20px; background-color: orange; padding 20px 40px 20px 40px; margin: 20px">
            <h1>TABLA DE PRODUCTOS</h1>
            <table border="2" style="text-align: center; margin: auto;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>MARCA</th>
                        <th>STOCK</th>
                        <th>PRECIO</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    while($row = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td>
                            <?php echo $row['ID']; ?>
                        </td>
                        <td>
                            <?php echo $row['NOMBRE']; ?>
                        </td>
                        <td>
                            <?php echo $row['MARCA']; ?>
                        </td>
                        <td>
                            <?php echo $row['STOCK']; ?>
                        </td>
                        <td>
                            <?php echo $row['PRECIO']; ?>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>

            </table>
        </div>
    </main>
    <div class="nombre" style="text-align: center; width: 100%; background-color: blue;">
            <h1>MI EXPERIENCIA A SIDO MUY BUENA EN ESTOS 4 CUATRIMESTRES</h1>
            <img src="gato f.jpg" alt="" width: 50%>
   </div>
</div>
</body>
</html>