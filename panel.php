<?php
session_start();

if(!isset($_SESSION['id_usuario'])){
    header("Location: login.html");
}

include("conexion.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Panel Gamer</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body class="bg-dark text-light">

<div class="container p-4 mt-4 bg-secondary rounded shadow">

    <div class="text-center">
        <img src="<?=$_SESSION['avatar']?>" width="120" class="rounded-circle border border-light">
        <h2>Bienvenido <?= $_SESSION['usuario'] ?></h2>
    </div>

    <hr>

    <h3>Publicar Comentario</h3>

    <form action="guardar_comentario.php" method="POST">
        <textarea name="comentario" class="form-control" required></textarea>
        <button class="btn btn-warning mt-2">Publicar</button>
    </form>

    <hr>

    <h3>⭐ Puntuar un Juego</h3>

    <form action="rating.php" method="POST">
        <input type="text" name="juego" placeholder="Nombre del juego" class="form-control mt-2">

        <select name="puntuacion" class="form-control mt-2">
            <option>1 ⭐</option>
            <option>2 ⭐⭐</option>
            <option>3 ⭐⭐⭐</option>
            <option>4 ⭐⭐⭐⭐</option>
            <option>5 ⭐⭐⭐⭐⭐</option>
        </select>

        <button class="btn btn-primary mt-2">Guardar puntuación</button>
    </form>

    <hr>

    <h3>Comentarios</h3>

    <table class="table table-dark">
        <tbody>
            <?php
            $query = "SELECT comentarios.id, usuarios.usuario, usuarios.avatar, comentarios.comentario, comentarios.likes
                      FROM comentarios
                      JOIN usuarios ON comentarios.id_usuario = usuarios.id
                      ORDER BY comentarios.fecha DESC";
            $res = $conn->query($query);

            while($row = $res->fetch_assoc()){
            ?>
                <tr>
                    <td width="70">
                        <img src="<?=$row['avatar']?>" width="60" class="rounded-circle">
                    </td>
                    <td><?=$row['usuario']?>:<br> <?=$row['comentario']?></td>
                    <td>👍 <?=$row['likes']?>
                    <br>
                    <a href="like.php?id=<?=$row['id']?>" class="btn btn-success btn-sm">Like</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>
</body>
</html>
