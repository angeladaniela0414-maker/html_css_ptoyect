<?php
include("conexion.php");

$usuario = $_POST['usuario'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

$avatar = "avatars/" . $_FILES['avatar']['name'];
move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar);

$sql = "INSERT INTO usuarios(usuario,email,password,avatar)
VALUES('$usuario','$email','$password','$avatar')";

$conn->query($sql);

header("Location: login.html");
?>
