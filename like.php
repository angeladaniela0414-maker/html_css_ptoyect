<?php
include("conexion.php");
$id = $_GET['id'];

$conn->query("UPDATE comentarios SET likes = likes + 1 WHERE id = $id");

header("Location: panel.php");