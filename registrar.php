<?php
include_once ("conex.php");

// Validar y sanitizar entradas
$codigo = mysqli_real_escape_string($conn, $_POST["codigo"]);
$dni = mysqli_real_escape_string($conn, $_POST["dni"]);
$nombre = mysqli_real_escape_string($conn, $_POST["nombre"]);
$apellido = mysqli_real_escape_string($conn, $_POST["apellido"]);
$token = mysqli_real_escape_string($conn, $_POST["token"]);

// Usar consultas preparadas
$stmt = $conn->prepare("INSERT INTO usuarios (`code_uni`, `dni`, `nombres`, `apellidos`, `token`, `fecha_registro`) VALUES (?, ?, ?, ?, ?, current_timestamp())");
$stmt->bind_param("sssss", $codigo, $dni, $nombre, $apellido, $token);

if ($stmt->execute()) {
    header('Location: ./ver_alumnos.php');
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

