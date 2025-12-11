<?php
include("conexion.php");

$usuario = $_POST['usuario'];
$comentario = $_POST['comentario'];

$sql = "INSERT INTO comentarios(usuario, comentario) VALUES('$usuario', '$comentario')";
$conn->query($sql);

header("Location: sistema_pag.php");
?>

