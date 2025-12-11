<?php
session_start();
include("conexion.php");

$id_usuario = $_SESSION['id_usuario'];
$juego = $_POST['juego'];
$puntuacion = intval($_POST['puntuacion']);

$sql = "INSERT INTO puntuaciones(id_usuario, juego, puntuacion)
VALUES($id_usuario,'$juego',$puntuacion)";

$conn->query($sql);

header("Location: panel.php");
?>
