<?php
include("conexion.php");

$telefono = $_POST['telefono'];
$email = $_POST['email'];
$password = $_POST['password'];
$direccion = $_POST['direccion'];

$sql = "INSERT INTO usuarios(telefono,email,password,direccion)
VALUES('$telefono','$email','$password','$direccion')";

$conn->query($sql);

header("Location: sistema pag.html");
?>
