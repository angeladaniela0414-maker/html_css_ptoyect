<?php
session_start();
include("conexion.php");

$usuario = $_POST['usuario'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE usuario='$usuario'";
$res = $conn->query($sql);

if($res->num_rows > 0){
    $row = $res->fetch_assoc();

    if(password_verify($password, $row['password'])){
        $_SESSION['id_usuario'] = $row['id'];
        $_SESSION['usuario'] = $row['usuario'];
        $_SESSION['avatar'] = $row['avatar'];
        header("Location: panel.php");
    } else {
        echo "Contraseña incorrecta";
    }

} else {
    echo "Usuario no encontrado";
}
?>
