<?php
include_once ("conex.php");
var_dump($_POST);

$codigo = $_POST["codigo"];  
$dni = $_POST["dni"];  
$nombre = $_POST["nombre"];  
$apellido = $_POST["apellido"];  
$token = $_POST["token"];  

$insert_user = "INSERT INTO usuarios (`id`, `code_uni`, `dni`, `nombres`, `apellidos`, `token`, `fecha_registro`) 
VALUES (NULL, '$codigo', '$dni', '$nombre', '$apellido', '$token', current_timestamp())";
print($insert_user);

if(mysqli_query($conn,$insert_user)){
    #echo "New record created successfully";
    header('Location: ./ver_alumnos.php');
}else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


#    $nrows = mysqli_num_rows($result_select_user);
#    print($nrows);
