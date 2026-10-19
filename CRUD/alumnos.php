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
    <title>CRUD ALUMNOS</title></head>
    <div>
    <h1>TABLA DE ALUMNOS</h1>
    <table border="2">
        <thead>
        <tr>
        <th>MATRICULA</th>
        <th>NOMBRE</th>
        <th>APELLIDO P</th>
        <th>APELLIDO M</th>
        <th>EDAD</th>
        <th>ACCIONES</th>
        </tr>
</thead>
<tbody>

    <?php
        while($row=mysqli_fetch_array($query)){
    ?>
        <tr>
            <td><?php echo $row ['matricula']?></td>
            <td><?php echo $row ['nombre']?></td>
            <td><?php echo $row ['apellido_p']?></td>
            <td><?php echo $row ['apellido_m']?></td>
            <td><?php echo $row ['edad']?></td>

            <td>
                <?php echo $row['matricula']; ?>
                <br>
                <a href="eliminar.php?id=<?php echo $row['matricula']; ?>">ELIMINAR</a>
                <a href="editar.php?id=<?php echo $row['matricula']; ?>">EDITAR</a>

            </td>
        </tr>
    <?php
        }
    ?>

</tbody>
</table>
</div>
<div>
    <h1>FORMULARIO</h1>

    <form action="insertar.php" method="POST">

    <div style="display: flex: gap: 10px">

        <input type="text"
            class="form-control"
            name="matricula"
            placeholder="Matricula">

        <input type="text"
            class="form-control"
            name="nombre"
            placeholder="Nombre">

        <input type="text"
            class="form-control"
            name="apellido_p"
            placeholder="Apellido P">

        <input type="text"
            class="form-control"
            name="apellido_m"
            placeholder="Apellido M">

        <input type="text"
            class="form-control"
            name="edad"
            placeholder="Edad">

            <button type="submit">GUARDAR</button>
    </div>
    </form>
</div>
</html>