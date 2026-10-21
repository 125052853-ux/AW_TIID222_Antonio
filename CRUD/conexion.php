<?php

function conectar(){
    /* informacion del srrvidor */
    $host="localhost";
    $user="root";
    $pass="";
 
    /* base de datos */
    $db="aw_crud";

    $con=mysqli_connect($host,$user,$pass);

    mysqli_select_db($con, $db);
    
    return $con;

}

?>